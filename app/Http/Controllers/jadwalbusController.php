<?php

namespace App\Http\Controllers;

use App\Models\Databus;
use App\Models\Drutebus;
use App\Models\Jadwalbus;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class jadwalbusController extends Controller
{
    public function index(Request $request)
    {
        if(request('search')) {
            $data = Jadwalbus::where('id_jadwal_bus','LIKE','%'.request('search').'%')
            ->orWhere('id_bus','LIKE','%'. request('search').'%')
            ->orWhere('id_rute_bus','LIKE','%'. request('search').'%')
            ->orWhere('tanggal_berangkat','LIKE','%'. request('search').'%')
            ->orWhere('tanggal_sampai','LIKE','%'. request('search').'%')
            ->paginate(5);
        }
        else{
            $data = Jadwalbus::paginate(5);
        }

        return view('Jadwalbus.jadwalbus',compact('data'));

    }
    public function tambah()
    {
        $namabus = Databus::all();
        $rutebus = Drutebus::all();
        return view('Jadwalbus.formjadwalbus',compact('namabus','rutebus'));
    }
    public function simpan(Request $request)
    {
        $data = [
            'id_jadwal_bus'=>$request->id_jadwal_bus,
            'id_bus'=>$request->id_bus,
            'id_rute_bus'=>$request->id_rute_bus,
            'tanggal_berangkat'=>$request->tanggal_berangkat,
            'tanggal_sampai'=>$request->tanggal_sampai,

        ];
        Jadwalbus::create($request->all());
        return redirect()->route('Datajadwalbus')->with('success', 'Data Berhasil Ditambahkan!');
    }
    public function edit($id_jadwal_bus){
        $data = Jadwalbus::find($id_jadwal_bus);
        $namabus = Databus::all();
        $rutebus = Drutebus::all();
        return view('Jadwalbus.formjadwalbus',compact('data','namabus','rutebus'));
    }

    public function update($id_jadwal_bus, Request $request)
    {
        $data = [
            'id_jadwal_bus'=>$request->id_jadwal_bus,
            'id_bus'=>$request->id_bus,
            'id_rute_bus'=>$request->id_rute_bus,
            'tanggal_berangkat'=>$request->tanggal_berangkat,
            'tanggal_sampai'=>$request->tanggal_sampai,

        ];
        Jadwalbus::find($id_jadwal_bus)->update($data);

        return redirect()->route('Datajadwalbus')->with('success', 'Data Berhasil Di Edit!');
    }
    public function hapus($id_jadwal_bus)
    {
        Jadwalbus::find($id_jadwal_bus)->delete();
        return redirect()->route('Datajadwalbus')->with('success', 'Data Berhasil Di Hapus!');
    }
    public function exportpdfjadwalbus(){
        $dataJadwalbus = Jadwalbus::all();

        view()->share('datajadwalbus', $dataJadwalbus);
        $pdf = Pdf::loadview('Jadwalbus.Exportpdf-jadwalbus');
        return $pdf->download('Data-Jadwal-Bus.pdf');

    }
}
