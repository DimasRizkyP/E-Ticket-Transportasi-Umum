<?php

namespace App\Http\Controllers;

use App\Models\Datakereta;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class datakeretaController extends Controller
{
    public function index(Request $request)
    {
        if(request('search')) {
            $data = Datakereta::where('id_kereta','LIKE','%'.request('search').'%')
            ->orWhere('nama_kereta','LIKE','%'. request('search').'%')
            ->orWhere('kelas','LIKE','%'. request('search').'%')
            ->orWhere('kuota_kereta','LIKE','%'. request('search').'%')
            ->orWhere('perusahaan','LIKE','%'. request('search').'%')
            ->paginate(5);
        }
        else{
            $data = Datakereta::paginate(5);
        }

        return view('Databus.datakereta',compact('data'));

    }
    public function tambah()
    {
        return view('Databus.formkereta');
    }
    public function simpan(Request $request)
    {
        $data = [
            'id_kereta'=>$request->id_kereta,
            'nama_kereta'=>$request->nama_kereta,
            'kelas'=>$request->kelas,
            'kuota_kereta'=>$request->kuota_kereta,
            'perusahaan'=>$request->perusahaan,

        ];
        Datakereta::create($request->all());
        return redirect()->route('Datakereta')->with('success', 'Data Berhasil Ditambahkan!');
    }
    public function edit($id_kereta){
        $data = Datakereta::find($id_kereta);

        return view('Databus.formkereta',compact('data'));
    }

    public function update($id_kereta, Request $request)
    {
        $data = [
            'id_kereta'=>$request->id_kereta,
            'nama_kereta'=>$request->nama_kereta,
            'kelas'=>$request->kelas,
            'kuota_kereta'=>$request->kuota_kereta,
            'perusahaan'=>$request->perusahaan,

        ];
        Datakereta::find($id_kereta)->update($data);

        return redirect()->route('Datakereta')->with('success', 'Data Berhasil Di Edit!');
    }
    public function hapus($id_kereta)
    {
        Datakereta::find($id_kereta)->delete();
        return redirect()->route('Datakereta')->with('success', 'Data Berhasil Di Hapus!');
    }
    public function exportpdfkereta(){
        $dataKereta = Datakereta::all();

        view()->share('datapesawat', $dataKereta);
        $pdf = Pdf::loadview('Databus.Exportpdf-datakereta');
        return $pdf->download('Data-pesawat.pdf');

    }
}
