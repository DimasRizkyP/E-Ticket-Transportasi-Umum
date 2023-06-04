<?php

namespace App\Http\Controllers;

use App\Models\Jadwalpesawat;
use App\Models\Tiketpesawat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class tiketpesawatController extends Controller
{
    public function index()
    {
        if(request('search')) {
            $data = Tiketpesawat::where('id_tiket_pesawat','LIKE','%'.request('search').'%')
            ->orWhere('id_jadwal_pesawat','LIKE','%'. request('search').'%')
            ->orWhere('harga','LIKE','%'. request('search').'%')
            ->orWhere('tanggal_booking','LIKE','%'. request('search').'%')
            ->paginate(5);
        }
        else{
            $data = Tiketpesawat::paginate(5);
        }

        return view('tiketpesawat.tiketpesawat',compact('data'));

    }
    public function tambah()
    {
        $jadwalpesawat = Jadwalpesawat::all();
        return view('tiketpesawat.formtiketpesawat',compact('jadwalpesawat'));
    }
    public function simpan(Request $request)
    {
        $data = [
            'id_tiket_pesawat'=>$request->id_tiket_pesawat,
            'id_jadwal_pesawat'=>$request->id_jadwal_pesawat,
            'harga'=>$request->harga,
            'tanggal_booking'=>$request->tanggal_booking,


        ];
        Tiketpesawat::create($request->all());
        return redirect()->route('Datatiketpesawat')->with('success', 'Data Berhasil Ditambahkan!');
    }
    public function edit($id_tiket_pesawat){
        $data = Tiketpesawat::find($id_tiket_pesawat);
        $jadwalpesawat = Jadwalpesawat::all();

        return view('tiketpesawat.formtiketpesawat',compact('data','jadwalpesawat'));
    }

    public function update($id_tiket_pesawat, Request $request)
    {
        $data = [
            'id_tiket_pesawat'=>$request->id_tiket_pesawat,
            'id_jadwal_pesawat'=>$request->id_jadwal_pesawat,
            'harga'=>$request->harga,
            'tanggal_booking'=>$request->tanggal_booking,

        ];
        Tiketpesawat::find($id_tiket_pesawat)->update($data);

        return redirect()->route('Datatiketpesawat')->with('success', 'Data Berhasil Di Edit!');
    }
    public function hapus($id_tiket_pesawat)
    {
        Tiketpesawat::find($id_tiket_pesawat)->delete();
        return redirect()->route('Datatiketpesawat')->with('success', 'Data Berhasil Di Hapus!');
    }
    public function exportpdftiketpesawat(){
        $dataTiketpesawat = Tiketpesawat::all();

        view()->share('datatiketpesawat', $dataTiketpesawat);
        $pdf = Pdf::loadview('tiketpesawat.Exportpdf-tiketpesawat');
        return $pdf->download('Data-Tiket-Pesawat.pdf');

    }
}
