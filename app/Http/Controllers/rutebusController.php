<?php

namespace App\Http\Controllers;

use App\Models\Drutebus;
use App\Models\Dataterminal;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class rutebusController extends Controller
{
    public function index(Request $request)
    {
        if(request('search')) {
            $data = Drutebus::where('id_rute_bus','LIKE','%'.request('search').'%')
            ->orWhere('id_terminal_asal','LIKE','%'. request('search').'%')
            ->orWhere('id_terminal_tujuan','LIKE','%'. request('search').'%')
            ->orWhere('detail_status','LIKE','%'. request('search').'%')

            ->paginate(5);
        }
        else{
            $data = Drutebus::paginate(5);
        }

        return view('Rutebus.datarutebus',compact('data'));

    }
    public function tambah()

    {
        $bus1 = Dataterminal::all();
        // return view('Rutebus.formrutebus');
        return view('Rutebus.formrutebus',compact('bus1'));
    }
    public function simpan(Request $request)
    {
        // dd($request->all());
        $data = [
            'id_rute_bus' => $request->id_rute_bus,
            'id_terminal_asal' => $request->id_terminal_asal,
            'id_terminal_tujuan' => $request->id_terminal_tujuan,
            'detail_status' => $request->detail_status,

        ];
        Drutebus::create($request->all());
        // Drutebus::create($data);
        return redirect()->route('Datarutebus')->with('success', 'Data Berhasil Ditambahkan!');
    }
    public function edit($id_rute_bus)
    {
        $data = Drutebus::find($id_rute_bus);
        $bus1 = Dataterminal::all();
        return view('Rutebus.formrutebus', compact('data', 'bus1'));
    }

    public function update($id_rute_bus, Request $request)
    {
        $data = [
            'id_rute_bus' => $request->id_rute_bus,
            'id_terminal_asal' => $request->id_terminal_asal,
            'id_terminal_tujuan' => $request->id_terminal_tujuan,
            'detail_status' => $request->detail_status,
        ];
        Drutebus::find($id_rute_bus)->update($data);

        return redirect()->route('Datarutebus')->with('success', 'Data Berhasil Di Edit!');
    }
    public function hapus($id_rute_bus)
    {
        Drutebus::find($id_rute_bus)->delete();
        return redirect()->route('Datarutebus')->with('success', 'Data Berhasil Di Hapus!');
    }
    public function exportpdfrutebus(){
        $dataRutebus = Drutebus::all();

        view()->share('datarutebus', $dataRutebus);
        $pdf = Pdf::loadview('Rutebus.Exportpdf-datarutebus');
        return $pdf->stream('Data-Rute-Bus.pdf');

    }
}
