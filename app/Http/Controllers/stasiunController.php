<?php

namespace App\Http\Controllers;

use App\Models\Datastasiun;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class stasiunController extends Controller
{
    public function index(Request $request)
    {
        if(request('search')) {
            $data = Datastasiun::where('id_stasiun','LIKE','%'.request('search').'%')
            ->orWhere('nama_stasiun','LIKE','%'. request('search').'%')
            ->orWhere('kota','LIKE','%'. request('search').'%')
            ->orWhere('negara','LIKE','%'. request('search').'%')
            ->paginate(5);
        }
        else{
            $data = Datastasiun::paginate(5);
        }

        return view('Datastasiun.datastasiun',compact('data'));

    }
    public function tambah()
    {
        return view('Datastasiun.formstasiun');
    }
    public function simpan(Request $request)
    {
        $data = [
            'id_stasiun' => $request->id_stasiun,
            'nama_stasiun' => $request->nama_stasiun,
            'kota' => $request->kota,
            'negara' => $request->negara,
        ];
        Datastasiun::create($request->all());
        return redirect()->route('Datastasiun')->with('success', 'Data Berhasil Ditambahkan!');
    }
    public function edit($id_stasiun)
    {
        $data = Datastasiun::find($id_stasiun);

        return view('Datastasiun.formstasiun', compact('data'));
    }

    public function update($id_stasiun, Request $request)
    {
        $data = [
            'id_stasiun' => $request->id_stasiun,
            'nama_stasiun' => $request->nama_stasiun,
            'kota' => $request->kota,
            'negara' => $request->negara,

        ];
        Datastasiun::find($id_stasiun)->update($data);

        return redirect()->route('Datastasiun')->with('success', 'Data Berhasil Di Edit!');
    }
    public function hapus($id_stasiun)
    {
        Datastasiun::find($id_stasiun)->delete();
        return redirect()->route('Datastasiun')->with('success', 'Data Berhasil Di Hapus!');
    }
    public function exportpdfstasiun(){
        $dataStasiun = Datastasiun::all();

        view()->share('datastasiun', $dataStasiun);
        $pdf = Pdf::loadview('Datastasiun.Exportpdf-datastasiun');
        return $pdf->download('Data-Stasiun.pdf');

    }

}
