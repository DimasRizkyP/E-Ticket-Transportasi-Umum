<?php

namespace App\Http\Controllers;

use App\Models\Dataterminal;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class terminalController extends Controller
{
    public function index(Request $request)
    {
        if(request('search')) {
            $data = Dataterminal::where('id_terminal','LIKE','%'.request('search').'%')
            ->orWhere('nama_terminal','LIKE','%'. request('search').'%')
            ->orWhere('kota','LIKE','%'. request('search').'%')
            ->orWhere('negara','LIKE','%'. request('search').'%')
            ->paginate(5);
        }
        else{
            $data = Dataterminal::paginate(5);
        }

        return view('Dataterminal.dataterminal',compact('data'));

    }
    public function tambah()
    {
        return view('Dataterminal.formterminal');
    }
    public function simpan(Request $request)
    {
        $data = [
            'id_terminal' => $request->id_terminal,
            'nama_terminal' => $request->nama_terminal,
            'kota' => $request->kota,
            'negara' => $request->negara,
        ];
        Dataterminal::create($request->all());
        return redirect()->route('Dataterminal')->with('success', 'Data Berhasil Ditambahkan!');
    }
    public function edit($id_terminal)
    {
        $data = Dataterminal::find($id_terminal);

        return view('Dataterminal.formterminal', compact('data'));
    }

    public function update($id_terminal, Request $request)
    {
        $data = [
            'id_terminal' => $request->id_terminal,
            'nama_terminal' => $request->nama_terminal,
            'kota' => $request->kota,
            'negara' => $request->negara,

        ];
        Dataterminal::find($id_terminal)->update($data);

        return redirect()->route('Dataterminal')->with('success', 'Data Berhasil Di Edit!');
    }
    public function hapus($id_terminal)
    {
        Dataterminal::find($id_terminal)->delete();
        return redirect()->route('Dataterminal')->with('success', 'Data Berhasil Di Hapus!');
    }
    public function exportpdfterminal(){
        $dataTerminal = Dataterminal::all();

        view()->share('dataterminal', $dataTerminal);
        $pdf = Pdf::loadview('Dataterminal.Exportpdf-dataterminal');
        return $pdf->download('Data-Terminal.pdf');

    }

}
