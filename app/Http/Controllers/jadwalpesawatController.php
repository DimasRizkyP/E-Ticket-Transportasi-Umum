<?php

namespace App\Http\Controllers;

use App\Models\Datapesawat;
use App\Models\Drutepesawat;
use App\Models\Jadwalpesawat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class jadwalpesawatController extends Controller
{
    public function index(Request $request)
    {
        if(request('search')) {
            $data = Jadwalpesawat::where('id_jadwal_pesawat','LIKE','%'.request('search').'%')
            ->orWhere('id_pesawat','LIKE','%'. request('search').'%')
            ->orWhere('id_rute_pesawat','LIKE','%'. request('search').'%')
            ->orWhere('tanggal_berangkat','LIKE','%'. request('search').'%')
            ->orWhere('tanggal_sampai','LIKE','%'. request('search').'%')
            ->paginate(5);
        }
        else{
            $data = Jadwalpesawat::paginate(5);
        }

        return view('Jadwalpesawat.jadwalpesawat',compact('data'));

    }
    public function tambah()
    {
        $namapesawat = Datapesawat::all();
        $rutepesawat = Drutepesawat::all();
        return view('Jadwalpesawat.formjadwalpesawat',compact('namapesawat','rutepesawat'));
    }
    public function simpan(Request $request)
    {
        $data = [
            'id_jadwal_pesawat'=>$request->id_jadwal_pesawawt,
            'id_pesawat'=>$request->id_pesawat,
            'id_rute_pesawat'=>$request->id_rute_pesawat,
            'tanggal_berangkat'=>$request->tanggal_berangkat,
            'tanggal_sampai'=>$request->tanggal_sampai,

        ];
        Jadwalpesawat::create($request->all());
        return redirect()->route('Datajadwalpesawat')->with('success', 'Data Berhasil Ditambahkan!');
    }
    public function edit($id_jadwal_pesawat){
        $data = Jadwalpesawat::find($id_jadwal_pesawat);
        $namapesawat = Datapesawat::all();
        $rutepesawat = Drutepesawat::all();

        return view('Jadwalpesawat.formjadwalpesawat',compact('data','namapesawat','rutepesawat'));
    }

    public function update($id_jadwal_pesawat, Request $request)
    {
        $data = [
            'id_jadwal_pesawat'=>$request->id_jadwal_pesawat,
            'id_pesawat'=>$request->id_pesawat,
            'id_rute_pesawat'=>$request->id_rute_pesawat,
            'tanggal_berangkat'=>$request->tanggal_berangkat,
            'tanggal_sampai'=>$request->tanggal_sampai,

        ];
        Jadwalpesawat::find($id_jadwal_pesawat)->update($data);

        return redirect()->route('Datajadwalpesawat')->with('success', 'Data Berhasil Di Edit!');
    }
    public function hapus($id_jadwal_pesawat)
    {
        Jadwalpesawat::find($id_jadwal_pesawat)->delete();
        return redirect()->route('Datajadwalpesawat')->with('success', 'Data Berhasil Di Hapus!');
    }
    public function exportpdfjadwalpesawat(){
        $dataJadwalpesawat = Jadwalpesawat::all();

        view()->share('datajadwalpesawat', $dataJadwalpesawat);
        $pdf = Pdf::loadview('Jadwalpesawat.Exportpdf-jadwalpesawat');
        return $pdf->download('Data-Jadwal-Pesawat.pdf');

    }
}
