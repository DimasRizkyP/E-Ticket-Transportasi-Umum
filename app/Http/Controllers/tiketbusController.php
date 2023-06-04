<?php

namespace App\Http\Controllers;

use App\Models\Jadwalbus;
use App\Models\Tiketbus;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class tiketbusController extends Controller
{
    public function index()
    {
        if(request('search')) {
            $data = Tiketbus::where('id_tiket_bus','LIKE','%'.request('search').'%')
            ->orWhere('id_jadwal_bus','LIKE','%'. request('search').'%')
            ->orWhere('harga','LIKE','%'. request('search').'%')
            ->orWhere('tanggal_booking','LIKE','%'. request('search').'%')
            ->paginate(5);
        }
        else{
            $data = Tiketbus::paginate(5);
        }

        return view('tiketbus.tiketbus',compact('data'));

    }
    public function tambah()
    {
        $jadwalbus = Jadwalbus::all();
        return view('tiketbus.formtiketbus',compact('jadwalbus'));
    }
    public function simpan(Request $request)
    {
        $data = [
            'id_tiket_bus'=>$request->id_tiket_bus,
            'id_jadwal_bus'=>$request->id_jadwal_bus,
            'harga'=>$request->harga,
            'tanggal_booking'=>$request->tanggal_booking,


        ];
        Tiketbus::create($request->all());
        return redirect()->route('Datatiketbus')->with('success', 'Data Berhasil Ditambahkan!');
    }
    public function edit($id_tiket_bus){
        $data = Tiketbus::find($id_tiket_bus);
        $jadwalbus = Jadwalbus::all();

        return view('tiketbus.formtiketbus',compact('data','jadwalbus'));
    }

    public function update($id_tiket_bus, Request $request)
    {
        $data = [
            'id_tiket_bus'=>$request->id_tiket_bus,
            'id_jadwal_bus'=>$request->id_jadwal_bus,
            'harga'=>$request->harga,
            'tanggal_booking'=>$request->tanggal_booking,
        ];
        Tiketbus::find($id_tiket_bus)->update($data);

        return redirect()->route('Datatiketbus')->with('success', 'Data Berhasil Di Edit!');
    }
    public function hapus($id_tiket_bus)
    {
        Tiketbus::find($id_tiket_bus)->delete();
        return redirect()->route('Datatiketbus')->with('success', 'Data Berhasil Di Hapus!');
    }
    public function exportpdftiketbus(){
        $dataTiketbus = Tiketbus::all();

        view()->share('datatiketbus', $dataTiketbus);
        $pdf = Pdf::loadview('tiketbus.Exportpdf-tiketbus');
        return $pdf->download('Data-Tiket-bus.pdf');

    }
}
