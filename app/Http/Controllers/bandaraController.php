<?php

namespace App\Http\Controllers;

use App\Models\Databandara;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class bandaraController extends Controller
{
    public function index(Request $request)
    {
        if(request('search')) {
            $data = Databandara::where('id_bandara','LIKE','%'.request('search').'%')
            ->orWhere('nama_bandara','LIKE','%'. request('search').'%')
            ->orWhere('kota','LIKE','%'. request('search').'%')
            ->orWhere('negara','LIKE','%'. request('search').'%')
            ->paginate(5);
        }
        else{
            $data = Databandara::paginate(5);
        }

        return view('DataBandara.databandara',compact('data'));
    }
    public function tambah()
    {
        return view('DataBandara.formbandara');
    }
    public function simpan(Request $request)
    {
        $data = [
            'id_bandara' => $request->id_bandara,
            'nama_bandara' => $request->nama_bandara,
            'kota' => $request->kota,
            'negara' => $request->negara,
        ];
        Databandara::create($request->all());
        return redirect()->route('Databandara')->with('success', 'Data Berhasil Ditambahkan!');
    }
    public function edit($id_bandara)
    {
        $data = Databandara::find($id_bandara);

        return view('DataBandara.formbandara', compact('data'));
    }

    public function update($id_bandara, Request $request)
    {
        $data = [
            'id_bandara' => $request->id_bandara,
            'nama_bandara' => $request->nama_bandara,
            'kota' => $request->kota,
            'negara' => $request->negara,

        ];
        Databandara::find($id_bandara)->update($data);

        return redirect()->route('Databandara')->with('success', 'Data Berhasil Di Edit!');
    }
    public function hapus($id_bandara)
    {
        Databandara::find($id_bandara)->delete();
        return redirect()->route('Databandara')->with('success', 'Data Berhasil Di Hapus!');
    }
    public function exportpdfbandara(){
        $dataBandara = Databandara::all();

        view()->share('databandara', $dataBandara);
        $pdf = Pdf::loadview('DataBandara.Exportpdf-databandara');
        return $pdf->download('Data-bandara.pdf');

    }

}
