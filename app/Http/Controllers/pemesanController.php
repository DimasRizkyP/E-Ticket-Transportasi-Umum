<?php

namespace App\Http\Controllers;

use App\Models\pemesan;
use App\Models\pengguna;
use App\Models\Tiketbus;
use App\Models\Tiketkereta;
use App\Models\Tiketpesawat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class pemesanController extends Controller
{
    public function index()
    {
        if(request('search')) {
            $data = pemesan::where('id_pemesan','LIKE','%'.request('search').'%')
            ->orWhere('id_pengguna_nama','LIKE','%'. request('search').'%')
            ->orWhere('tanggal','LIKE','%'. request('search').'%')
            ->orWhere('id_tiket_kereta','LIKE','%'. request('search').'%')
            ->orWhere('id_tiket_bus','LIKE','%'. request('search').'%')
            ->orWhere('id_tiket_pesawat','LIKE','%'. request('search').'%')

            ->paginate(5);
        }
        else{
            $data = pemesan::paginate(5);
        }

        return view('pemesan.Pemesan',compact('data'));

    }
    public function tambah()
    {
        $pemesan = pemesan::all();
        $tiketbus = Tiketbus::all();
        $tiketkereta = Tiketkereta::all();
        $tiketpesawat = Tiketpesawat::all();
        $nama = pengguna::all();
        return view('pemesan.formpemesan',compact('pemesan','tiketbus','tiketkereta','tiketpesawat','nama'));
    }
    public function simpan(Request $request)
    {
        $data = [
            'id_pemesan'=>$request->id_pemesan,
            'id_pengguna_nama'=>$request->id_pengguna_nama,
            'tanggal'=>$request->tanggal,
            'id_tiket_kereta'=>$request->id_tiket_kereta,
            'id_tiket_bus'=>$request->id_tiket_bus,
            'id_tiket_pesawat'=>$request->id_tiket_pesawat,


        ];
        pemesan::create($request->all());
        return redirect()->route('Datapemesan')->with('success', 'Data Berhasil Ditambahkan!');
    }
    public function edit($id_pemesan){
        $data = pemesan::find($id_pemesan);
        $pemesan = pemesan::all();
        $tiketbus = Tiketbus::all();
        $tiketkereta = Tiketkereta::all();
        $tiketpesawat = Tiketpesawat::all();
        $nama = pengguna::all();

        return view('pemesan.formpemesan',compact('data','pemesan','tiketbus','tiketbus','tiketkereta','tiketpesawat','nama'));
    }

    public function update($id_pemesan, Request $request)
    {
        $data = [
            'id_pemesan'=>$request->id_pemesan,
            'id_pengguna_nama'=>$request->id_pengguna_nama,
            'tanggal'=>$request->tanggal,
            'id_tiket_kereta'=>$request->id_tiket_kereta,
            'id_tiket_bus'=>$request->id_tiket_bus,
            'id_tiket_pesawat'=>$request->id_tiket_pesawat,
        ];
        pemesan::find($id_pemesan)->update($data);

        return redirect()->route('Datapemesan')->with('success', 'Data Berhasil Di Edit!');
    }
    public function hapus($id_pemesan)
    {
        pemesan::find($id_pemesan)->delete();
        return redirect()->route('Datapemesan')->with('success', 'Data Berhasil Di Hapus!');
    }
    public function exportpdfpemesan(){
        $dataPemesan = pemesan::all();

        view()->share('datapemesan', $dataPemesan);
        $pdf = Pdf::loadview('pemesan.Exportpdf-pemesan');
        return $pdf->download('Data-Pemesan.pdf');

    }
}
