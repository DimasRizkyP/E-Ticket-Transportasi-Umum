<?php

namespace App\Http\Controllers;

use App\Models\Datastasiun;
use App\Models\Drutekereta;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class rutekeretaController extends Controller
{
    public function index(Request $request)
    {
        if(request('search')) {
            $data = Drutekereta::where('id_rute_kereta','LIKE','%'.request('search').'%')
            ->orWhere('id_stasiun_asal','LIKE','%'. request('search').'%')
            ->orWhere('id_stasiun_tujuan','LIKE','%'. request('search').'%')
            ->orWhere('detail_status','LIKE','%'. request('search').'%')

            ->paginate(5);
        }
        else{
            $data = Drutekereta::paginate(5);
        }

        return view('Rutekereta.datarutekereta',compact('data'));

    }
    public function tambah()
    {
        $rutekereta = Datastasiun::all();
        return view('Rutekereta.formrutekereta',compact('rutekereta'));
    }
    public function simpan(Request $request)
    {
        $data = [
            'id_rute_kereta' => $request->id_rute_kereta,
            'id_stasiun_asal' => $request->id_stasiun_asal,
            'id_stasiun_tujuan' => $request->id_stasiun_tujuan,
            'detail_status' => $request->detail_status,
        ];
        Drutekereta::create($request->all());
        return redirect()->route('Datarutekereta')->with('success', 'Data Berhasil Ditambahkan!');
    }
    public function edit($id_rute_kereta)
    {
        $data = Drutekereta::find($id_rute_kereta);
        $rutekereta = Datastasiun::all();
        return view('Rutekereta.formrutekereta', compact('data','rutekereta'));
    }

    public function update($id_rute_kereta, Request $request)
    {
        $data = [
            'id_rute_kereta' => $request->id_rute_kereta,
            'id_stasiun_asal' => $request->id_stasiun_asal,
            'id_stasiun_tujuan' => $request->id_stasiun_tujuan,
            'detail_status' => $request->detail_status,
        ];
        Drutekereta::find($id_rute_kereta)->update($data);

        return redirect()->route('Datarutekereta')->with('success', 'Data Berhasil Di Edit!');
    }
    public function hapus($id_rute_kereta)
    {
        Drutekereta::find($id_rute_kereta)->delete();
        return redirect()->route('Datarutekereta')->with('success', 'Data Berhasil Di Hapus!');
    }
    public function exportpdfrutekereta(){
        $dataRutekereta = Drutekereta::all();

        view()->share('datarutekereta', $dataRutekereta);
        $pdf = Pdf::loadview('Rutekereta.Exportpdf-datarutekereta');
        return $pdf->download('Data-Rute-Kereta.pdf');

    }
}
