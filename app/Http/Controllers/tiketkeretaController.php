<?php

namespace App\Http\Controllers;

use App\Models\Jadwalkereta;
use App\Models\Tiketkereta;
use App\Models\Tiketpesawat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class tiketkeretaController extends Controller
{
    public function index()
    {
        if(request('search')) {
            $data = Tiketpesawat::where('id_tiket_kereta','LIKE','%'.request('search').'%')
            ->orWhere('id_jadwal_kereta','LIKE','%'. request('search').'%')
            ->orWhere('harga','LIKE','%'. request('search').'%')
            ->orWhere('tanggal_booking','LIKE','%'. request('search').'%')
            ->paginate(5);
        }
        else{
            $data = Tiketkereta::paginate(5);
        }

        return view('tiketkereta.tiketkereta',compact('data'));

    }
    public function tambah()
    {
        $jadwalkereta = Jadwalkereta::all();
        return view('tiketkereta.formtiketkereta',compact('jadwalkereta'));
    }
    public function simpan(Request $request)
    {
        $data = [
            'id_tiket_kereta'=>$request->id_tiket_kereta,
            'id_jadwal_kereta'=>$request->id_jadwal_kereta,
            'harga'=>$request->harga,
            'tanggal_booking'=>$request->tanggal_booking,


        ];
        Tiketkereta::create($request->all());
        return redirect()->route('Datatiketkereta')->with('success', 'Data Berhasil Ditambahkan!');
    }
    public function edit($id_tiket_kereta){
        $data = Tiketkereta::find($id_tiket_kereta);
        $jadwalkereta = Jadwalkereta::all();

        return view('tiketkereta.formtiketkereta',compact('data','jadwalkereta'));
    }

    public function update($id_tiket_kereta, Request $request)
    {
        $data = [
            'id_tiket_kereta'=>$request->id_tiket_kereta,
            'id_jadwal_kereta'=>$request->id_jadwal_kereta,
            'harga'=>$request->harga,
            'tanggal_booking'=>$request->tanggal_booking,
        ];
        Tiketkereta::find($id_tiket_kereta)->update($data);

        return redirect()->route('Datatiketkereta')->with('success', 'Data Berhasil Di Edit!');
    }
    public function hapus($id_tiket_kereta)
    {
        Tiketkereta::find($id_tiket_kereta)->delete();
        return redirect()->route('Datatiketkereta')->with('success', 'Data Berhasil Di Hapus!');
    }
    public function exportpdftiketkereta(){
        $dataTiketkereta = Tiketkereta::all();

        view()->share('datatiketkereta', $dataTiketkereta);
        $pdf = Pdf::loadview('tiketkereta.Exportpdf-tiketkereta');
        return $pdf->download('Data-Tiket-kereta.pdf');

    }
}
