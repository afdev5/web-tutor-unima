<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Link;
use App\Materi;
use App\Peserta;
use Alert;
use Exception;
use Validator;
use DB;

class UtamaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kelas = Kelas::where('tanggal', '>=', date('Y-m-d'))->get();
        $exp = Kelas::where('tanggal', '<', date('Y-m-d'))->get();
        $data['total'] = Kelas::count();
        $data['kelas'] = Kelas::where('tanggal', '>=', date('Y-m-d'))->count();
        $data['exp'] = Kelas::where('tanggal', '<', date('Y-m-d'))->count();
        
        return view('welcome', compact('kelas', 'exp', 'data'));
    }

    //Post Data Pendaftaran
    public function daftar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required',
            'nidn' => 'required',
            'nama' => 'required',
            'fakultas' => 'required',
            'prodi' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'id_kelas' => 'required',
        ]);
        if ($validator->fails()) {
            alert()->error('Harap Periksa Kembali Data Pendaftaran.', 'Gagal Mendaftar !')->autoclose(5500);
            return redirect()->back();
        }
        $data = $request->all();
        if($request->no_wa == null)
        {
            $data['no_wa'] = $request->no_hp;
        }
        $i = Peserta::create($data);
        alert()->success('Pendaftaran Kelas Tutor Daring Berhasil.', 'Berhasil Mendaftar !')->autoclose(5500);
        return redirect()->route('daftar.hasil', ['id'=>$i->id,'tipe'=>0]);
    }

    // Hasil Pendaftaran
    public function hasil($id, $tipe)
    {
        $data = Peserta::findOrFail($id);
        $link = Link::where('id_kelas', $data->id_kelas)->first();
        // if($tipe == 0)
        // {
        //     $link = Link::where('id_kelas', $data->id_kelas)->first();
        // } else {
        //     $link = Link::where('id_kelas', $tipe)->first();
        // }
        
        return view('daftar', compact('data', 'link'));
    }

    // Hasil Pencarian
    public function cari(Request $request)
    {
        $data = Peserta::where('email', $request->email)->get();
        if($data->count() <= 0){
            return view('no_list');
        } else {
            // $ids = Peserta::where('email', $request->email)->get();
            // $id = array();
            // foreach ($data as $key) { 
            //     $id[] = $key->id_kelas;
            // }
            // // $kelas = Kelas::where('tanggal', '>=', date('Y-m-d'))->whereIn('id', $id)->get();
            // // $exp = Kelas::where('tanggal', '<', date('Y-m-d'))->whereIn('id', $id)->get();
            $kelas = DB::table('kelas')
                    ->join('pesertas', 'kelas.id', '=', 'pesertas.id_kelas')
                    ->leftJoin('materis', 'kelas.id', '=', 'materis.id_kelas')
                    ->where([['tanggal', '>=', date('Y-m-d')], ['email', $request->email]])
                    ->select('kelas.*', 'pesertas.*', 'kelas.id as kelas_id', 'pesertas.id as peserta_id', 'materis.materi')
                    ->get();

            $exp = DB::table('kelas')
                    ->join('pesertas', 'kelas.id', '=', 'pesertas.id_kelas')
                    ->leftJoin('materis', 'kelas.id', '=', 'materis.id_kelas')
                    ->where([['tanggal', '<', date('Y-m-d')], ['email', $request->email]])
                    ->select('kelas.*', 'pesertas.*', 'kelas.id as kelas_id', 'pesertas.id as peserta_id', 'materis.materi')
                    ->get();
            // return $exp;
            return view('list', compact('kelas', 'exp'));
        }
        
    }

    public function sertifikat($id)
    {
        $template = new \PhpOffice\PhpWord\TemplateProcessor(url('assets/sertifikat2.docx'));
        $data = Peserta::findOrFail($id);
        $template->setValue('nama', $data->nama);
        $template->setValue('kelas', $data->kelas['nama_kelas']);
        $template->setValue('tgl', $data->kelas['tanggal']);
        $template->saveAs(storage_path('tes.docx'));
        $word = \PhpOffice\PhpWord\IOFactory::load(storage_path('tes.docx'));
        $config = \Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Apikey', 'd7812c7d-df56-46a7-9936-c972843f0dbf');
        $apiInstance = new \Swagger\Client\Api\ConvertDocumentApi(
            new \GuzzleHttp\Client(),
            $config
        );
        try {
            $result = $apiInstance->convertDocumentDocxToPdf($word);
            return $result;
        } catch (Exception $e) {
            return 'gagal';
            // echo 'Exception when calling ConvertDocumentApi->convertDocumentDocxToPdf: ', $e->getMessage(), PHP_EOL;
        }
    }
}
