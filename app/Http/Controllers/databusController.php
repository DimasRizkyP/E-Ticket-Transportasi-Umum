<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Databus;
use Barryvdh\DomPDF\Facade\Pdf;


class databusController extends Controller
{
    public function index(Request $request)
    {
        if(request('search')) {
            $data = Databus::where('id_bus','LIKE','%'.request('search').'%')
            ->orWhere('nama_bus','LIKE','%'. request('search').'%')
            ->orWhere('kelas','LIKE','%'. request('search').'%')
            ->orWhere('kuota','LIKE','%'. request('search').'%')
            ->orWhere('perusahaan','LIKE','%'. request('search').'%')
            ->paginate(5);
        }
        else{
            $data = Databus::paginate(5);
        }

        return view('Databus.databus',compact('data'));

        // $data = Databus::get();
        // return view('Databus.databus',['data'=> $data]);
    }
    public function tambah()
    {
        return view('Databus.frombus');
    }
    public function simpan(Request $request)
    {
        $data = [
            'id_bus'=>$request->id_bus,
            'nama_bus'=>$request->nama_bus,
            'kelas'=>$request->kelas,
            'kuota'=>$request->kuota,
            'perusahaan'=>$request->perusahaan,

        ];
        Databus::create($request->all());
        return redirect()->route('Databus')->with('success', 'Data Berhasil Ditambahkan!');
    }

    // public function edit(Request $request, $id_bus)
    // {
    //         $data = Databus::find($id_bus);
    //         $data->update($request->all());
    //         return redirect()->route('Databus');
    // }

    // public function edit($id_bus)
    // {

    //     $data = Databus::find($id_bus)->first();
    //     return view ('Databus.frombus',['data'=>$data]);
    // }

    public function edit($id_bus){
        $data = Databus::find($id_bus);

        return view('Databus.frombus',compact('data'));
    }

    public function update($id_bus, Request $request)
    {
        $data = [
            'id_bus'=>$request->id_bus,
            'nama_bus'=>$request->nama_bus,
            'kelas'=>$request->kelas,
            'kuota'=>$request->kuota,
            'perusahaan'=>$request->perusahaan,

        ];
        Databus::find($id_bus)->update($data);

        return redirect()->route('Databus')->with('success', 'Data Berhasil Di Edit!');
    }

    // public function tampilkandata($id_bus)
    // {

    //     $data_bus = Databus::find($id_bus);
    //     dd($data_bus);
    // }
    public function hapus($id_bus)
    {
        Databus::find($id_bus)->delete();
        return redirect()->route('Databus')->with('success', 'Data Berhasil Di Hapus!');
    }

    public function exportpdfbus(){
        $data = Databus::all();

        view()->share('data', $data);
        $pdf = Pdf::loadview('Databus.Exportpdf-databus');
        return $pdf->download('Data-bus.pdf');

    }
}
