<?php

namespace App\Http\Controllers;

use App\Models\Datakereta;
use App\Models\Drutekereta;
use App\Models\Jadwalkereta;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class jadwalkeretaController extends Controller
{
    public function index(Request $request)
    {
        if(request('search')) {
            $data = Jadwalkereta::where('id_jadwal_kereta','LIKE','%'.request('search').'%')
            ->orWhere('id_kereta','LIKE','%'. request('search').'%')
            ->orWhere('id_rute_kereta','LIKE','%'. request('search').'%')
            ->orWhere('tanggal_berangkat','LIKE','%'. request('search').'%')
            ->orWhere('tanggal_sampai','LIKE','%'. request('search').'%')
            ->paginate(5);
        }
        else{
            $data = Jadwalkereta::paginate(5);
        }

        return view('Jadwalkereta.jadwalkereta',compact('data'));

    }
    public function tambah()
    {
        $namakereta = Datakereta::all();
        $rutekereta = Drutekereta::all();
        return view('Jadwalkereta.formjadwalkereta',compact('namakereta','rutekereta'));
    }
    public function simpan(Request $request)
    {
        $data = [
            'id_jadwal_kereta'=>$request->id_jadwal_kereta,
            'id_kereta'=>$request->id_kereta,
            'id_rute_kereta'=>$request->id_rute_kereta,
            'tanggal_berangkat'=>$request->tanggal_berangkat,
            'tanggal_sampai'=>$request->tanggal_sampai,

        ];
        Jadwalkereta::create($request->all());
        return redirect()->route('Datajadwalkereta')->with('success', 'Data Berhasil Ditambahkan!');
    }
    public function edit($id_jadwal_kereta){
        $data = Jadwalkereta::find($id_jadwal_kereta);
        $namakereta = Datakereta::all();
        $rutekereta = Drutekereta::all();
        return view('jadwalkereta.formjadwalkereta',compact('data','namakereta','rutekereta'));
    }

    public function update($id_jadwal_kereta, Request $request)
    {
        $data = [
            'id_jadwal_kereta'=>$request->id_jadwal_kereta,
            'id_kereta'=>$request->id_kereta,
            'id_rute_kereta'=>$request->id_rute_kereta,
            'tanggal_berangkat'=>$request->tanggal_berangkat,
            'tanggal_sampai'=>$request->tanggal_sampai,

        ];
        Jadwalkereta::find($id_jadwal_kereta)->update($data);

        return redirect()->route('Datajadwalkereta')->with('success', 'Data Berhasil Di Edit!');
    }
    public function hapus($id_jadwal_kereta)
    {
        Jadwalkereta::find($id_jadwal_kereta)->delete();
        return redirect()->route('Datajadwalkereta')->with('success', 'Data Berhasil Di Hapus!');
    }
    public function exportpdfjadwalkereta(){
        $dataJadwalkereta = Jadwalkereta::all();

        view()->share('datakereta', $dataJadwalkereta);
        $pdf = Pdf::loadview('Jadwalkereta.Exportpdf-jadwalkereta');
        return $pdf->download('Data-Jadwal-Kereta.pdf');

    }
}
