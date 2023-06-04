<?php

namespace App\Http\Controllers;

use App\Models\Datapesawat;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class datapesawatController extends Controller
{
    public function index(Request $request)
    {
        if(request('search')) {
            $data = Datapesawat::where('id_pesawat','LIKE','%'.request('search').'%')
            ->orWhere('nama_pesawat','LIKE','%'. request('search').'%')
            ->orWhere('kelas','LIKE','%'. request('search').'%')
            ->orWhere('kuota','LIKE','%'. request('search').'%')
            ->orWhere('perusahaan','LIKE','%'. request('search').'%')
            ->paginate(5);
        }
        else{
            $data = Datapesawat::paginate(5);
        }

        return view('Databus.datapesawat',compact('data'));

    }
    public function tambah()
    {
        return view('Databus.formpesawat');
    }
    public function simpan(Request $request)
    {
        $data = [
            'id_pesawat'=>$request->id_pesawat,
            'nama_pesawat'=>$request->nama_pesawat,
            'kelas'=>$request->kelas,
            'kuota'=>$request->kuota,
            'perusahaan'=>$request->perusahaan,
        ];
        Datapesawat::create($request->all());
        return redirect()->route('Datapesawat')->with('success', 'Data Berhasil Ditambahkan!');
    }
    public function edit($id_pesawat){
        $data = Datapesawat::find($id_pesawat);

        return view('Databus.formpesawat',compact('data'));
    }

    public function update($id_pesawat, Request $request)
    {
        $data = [
            'id_pesawat'=>$request->id_pesawat,
            'nama_pesawat'=>$request->nama_pesawat,
            'kelas'=>$request->kelas,
            'kuota'=>$request->kuota,
            'perusahaan'=>$request->perusahaan,

        ];
        Datapesawat::find($id_pesawat)->update($data);

        return redirect()->route('Datapesawat')->with('success', 'Data Berhasil Di Edit!');
    }
    public function hapus($id_pesawat)
    {
        Datapesawat::find($id_pesawat)->delete();
        return redirect()->route('Datapesawat')->with('success', 'Data Berhasil Di Hapus!');
    }
    public function exportpdfpesawat(){
        $dataPesawat = Datapesawat::all();

        view()->share('datapesawat', $dataPesawat);
        $pdf = Pdf::loadview('Databus.Exportpdf-datapesawat');
        return $pdf->download('Data-pesawa.pdf');

    }
}
