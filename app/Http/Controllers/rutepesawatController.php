<?php

namespace App\Http\Controllers;

use App\Models\Databandara;
use App\Models\Drutepesawat;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class rutepesawatController extends Controller
{
    public function index(Request $request)
    {
        if(request('search')) {
            $data = Drutepesawat::where('id_rute_pesawat','LIKE','%'.request('search').'%')
            ->orWhere('id_bandara_asal','LIKE','%'. request('search').'%')
            ->orWhere('id_bandara_tujuan','LIKE','%'. request('search').'%')
            ->orWhere('detail_status','LIKE','%'. request('search').'%')

            ->paginate(5);
        }
        else{
            $data = Drutepesawat::paginate(5);
        }

        return view('Rutepesawat.datarutepesawat',compact('data'));

    }
    public function tambah()
    {
        $rutepesawat = Databandara::all();
        // return view('Rutebus.formrutebus');
        return view('Rutepesawat.formrutepesawat',compact('rutepesawat'));
    }
    public function simpan(Request $request)
    {
        $data = [
            'id_rute_pesawat' => $request->id_rute_pesawat,
            'id_bandara_asal' => $request->id_bandara_asal,
            'id_bandara_tujuan' => $request->id_bandara_tujuan,
            'detail_status' => $request->detail_status,

        ];
        Drutepesawat::create($request->all());
        return redirect()->route('Datarutepesawat')->with('success', 'Data Berhasil Ditambahkan!');
    }
    public function edit($id_rute_pesawat)
    {
        $data = Drutepesawat::find($id_rute_pesawat);
        $rutepesawat = Databandara::all();
        return view('Rutepesawat.formrutepesawat', compact('data','rutepesawat'));
    }

    public function update($id_rute_pesawat, Request $request)
    {
        $data = [
            'id_rute_pesawat' => $request->id_rute_pesawat,
            'id_bandara_asal' => $request->id_bandara_asal,
            'id_bandara_tujuan' => $request->id_bandara_tujuan,
            'detail_status' => $request->detail_status,
        ];
        Drutepesawat::find($id_rute_pesawat)->update($data);

        return redirect()->route('Datarutepesawat')->with('success', 'Data Berhasil Di Edit!');
    }
    public function hapus($id_rute_pesawat)
    {
        Drutepesawat::find($id_rute_pesawat)->delete();
        return redirect()->route('Datarutepesawat')->with('success', 'Data Berhasil Di Hapus!');
    }
    public function exportpdfrutepesawat(){
        $dataRutepesawat = Drutepesawat::all();

        view()->share('datarutepesawat', $dataRutepesawat);
        $pdf = Pdf::loadview('Rutepesawat.Exportpdf-datarutepesawat');
        return $pdf->download('Data-Rute-Pesawat.pdf');

    }
}
