<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Link;
use App\Materi;
use App\Peserta;
use Validator;
use Alert;
use Storage;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kelas::where('tanggal', '>=', date('Y-m-d'))->paginate(6);
        $exp = Kelas::where('tanggal', '<', date('Y-m-d'))->paginate(6);
        
        return view('kelas.index', compact('data', 'exp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelas.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kelas' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'narasumber' => 'required',
            'host' => 'required',
            'moderator' => 'required',
            'link_zoom' => 'required',
            'meeting_id' => 'required',
            'password' => 'required',
            'sertifikat' => 'required'
        ]);
        if ($validator->fails()) {
            alert()->error('Harap Periksa Kembali Data Kelas.', 'Gagal !')->autoclose(5500);
            return redirect()->back();
        }

        $kelas = $request->except('link_zoom', 'meeting_id', 'password');
        $link = $request->only('link_zoom', 'meeting_id', 'password');

        $input = Kelas::create($kelas);
        $link['id_kelas'] = $input->id;
        Link::create($link);
        alert()->success('Kelas Telah Ditambahkan.', 'Berhasil !')->autoclose(5500);
        return redirect()->route('kelas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Link::where('id_kelas', $id)->first();
        $materi = Materi::where('id_kelas', $id)->first();
        $peserta = Peserta::where('id_kelas', $id)->count();
        $data['nama'] = $data->kelas['nama_kelas'];
        $data['materi'] = $materi['materi'];
        $data['peserta'] = $peserta;
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kelas::findOrFail($id);
        return view('kelas.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->tipe == null){
            $validator = Validator::make($request->all(), [
                'nama_kelas' => 'required',
                'tanggal' => 'required',
                'jam' => 'required',
                'narasumber' => 'required',
                'host' => 'required',
                'moderator' => 'required',
                'link_zoom' => 'required',
                'meeting_id' => 'required',
                'password' => 'required',
            ]);
            if ($validator->fails()) {
                alert()->error('Gagal !')->autoclose(5500);
                return redirect()->back();
            }
            $data = Kelas::findOrFail($id);
            $link = Link::where('id_kelas', $id)->first();
            $data->update($request->all());
            $link->update($request->all());
            alert()->success('Berhasil !')->autoclose(5500);
            return redirect()->route('kelas.index');
        } else {
            $validator = Validator::make($request->all(), [
                'link_yt' => 'required',
                'materi' => 'required',
            ]);
            if ($validator->fails()) {
                alert()->error('Gagal !')->autoclose(5500);
                return redirect()->back();
            }
            $link = Link::where('id_kelas', $id)->first();
            $data['link_yt'] = $request->link_yt;
            $link->update($data);
            // Cek Data Materi
            $input['id_kelas'] = $id;
            $cek = Materi::where('id_kelas', $id)->first();
            if($cek)
            {
                Storage::delete($cek->materi);
                //Upload Materi
                $upload = $request->file('materi');
                $input['materi'] = $upload->store('Materi');
                $cek->update($input);
            } else {
                //Upload Materi
                $upload = $request->file('materi');
                $input['materi'] = $upload->store('Materi');
                Materi::create($input);
            }
            //
            alert()->success('Berhasil !')->autoclose(5500);
            return redirect()->route('kelas.index');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kelas::findOrFail($id);
        $cek = Materi::where('id_kelas', $id)->first();
        if($cek)
        {
            Storage::delete($cek->materi);
        }
        $data->delete();
        alert()->info('Berhasil Menghapus Kelas')->autoclose(5500);
        return redirect()->route('kelas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function peserta($id)
    {
        $data = Peserta::where('id_kelas', $id)->get();
        $kelas = Kelas::findOrFail($id);
        return view('kelas.absen', compact('data', 'kelas'));
        // return $kelas;
    }
    public function absen($id, $val)
    {
        $data = Peserta::findOrFail($id);
        $absen['status'] = $val;
        $data->update($absen);
        return 'berhasil update';
        // return $kelas;
    }

    //Upload Sertifikat
    public function serti(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sertifikat' => 'required'
        ]);
        if ($validator->fails()) {
            alert()->error('Harap Periksa Kembali File Sertifikat.', 'Gagal !')->autoclose(5500);
            return redirect()->back();
        }
        $upload = $request->file('sertifikat');
        $input['sertifikat'] = $upload->store('sertifikat');
        $data = Kelas::findOrFail($request->id);
        $data->update($input);
        alert()->success('Sertifikat Telah Ditambahkan.', 'Berhasil !')->autoclose(5500);
        return redirect()->back();
    }
}
