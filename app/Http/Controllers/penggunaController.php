<?php

namespace App\Http\Controllers;


use App\Models\pengguna;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class penggunaController extends Controller
{
    public function index()
    {
        if(request('search')) {
            $data = pengguna::where('id_pengguna','LIKE','%'.request('search').'%')
            ->orWhere('nama','LIKE','%'. request('search').'%')
            ->orWhere('no_ktp','LIKE','%'. request('search').'%')
            ->orWhere('warga_negara','LIKE','%'. request('search').'%')

            ->paginate(5);
        }
        else{
            $data = pengguna::paginate(5);
        }

        return view('pengguna.Pengguna',compact('data'));

    }
    public function tambah()

    {

        return view('pengguna.formpengguna');

    }
    public function simpan(Request $request)
    {

        $data = [
            'id_pengguna' => $request->id_pengguna,
            'nama' => $request->nama,
            'no_ktp' => $request->no_ktp,
            'warga_negara' => $request->warga_negara,

        ];
        pengguna::create($request->all());
        return redirect()->route('Datapengguna')->with('success', 'Data Berhasil Ditambahkan!');
    }
    public function edit($id_pengguna)
    {
        $data = pengguna::find($id_pengguna);
        return view('pengguna.formpengguna', compact('data'));
    }

    public function update($id_pengguna, Request $request)
    {
        $data = [
            'id_pengguna' => $request->id_pengguna,
            'nama' => $request->nama,
            'no_ktp' => $request->no_ktp,
            'warga_negara' => $request->warga_negara,
        ];
        pengguna::find($id_pengguna)->update($data);

        return redirect()->route('Datapengguna')->with('success', 'Data Berhasil Di Edit!');
    }
    public function hapus($id_pengguna)
    {
        pengguna::find($id_pengguna)->delete();
        return redirect()->route('Datapengguna')->with('success', 'Data Berhasil Di Hapus!');
    }
    public function exportpdfpengguna(){
        $dataPengguna = pengguna::all();

        view()->share('datapengguna', $dataPengguna);
        $pdf = Pdf::loadview('pengguna.Exportpdf-pengguna');
        return $pdf->stream('Data-Pengguna.pdf');

    }
}
