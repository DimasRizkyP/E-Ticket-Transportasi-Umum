<?php

namespace App\Http\Controllers;

use App\Models\userakun;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class userController extends Controller
{
    public function index(Request $request)
    {
        if(request('search')) {
            $data = userakun::where('id_user','LIKE','%'.request('search').'%')
            ->orWhere('username','LIKE','%'. request('search').'%')
            ->orWhere('password','LIKE','%'. request('search').'%')
            ->orWhere('role','LIKE','%'. request('search').'%')

            ->paginate(5);
        }
        else{
            $data = userakun::paginate(5);
        }

        return view('userakun.user',compact('data'));

    }
    public function tambah()

    {

        return view('userakun.formuser');

    }
    public function simpan(Request $request)
    {

        $data = [
            'id_user' => $request->id_user,
            'username' => $request->nusername,
            'password' => $request->password,
            'role' => $request->role,

        ];
        userakun::create($request->all());
        return redirect()->route('Datauser')->with('success', 'Data Berhasil Ditambahkan!');
    }
    public function edit($id_user)
    {
        $data = userakun::find($id_user);
        return view('userakun.formuser', compact('data'));
    }

    public function update($id_user, Request $request)
    {
        $data = [
            'id_user' => $request->id_user,
            'username' => $request->username,
            'password' => $request->password,
            'role' => $request->role,

        ];
        userakun::find($id_user)->update($data);

        return redirect()->route('Datauser')->with('success', 'Data Berhasil Di Edit!');
    }
    public function hapus($id_user)
    {
        userakun::find($id_user)->delete();
        return redirect()->route('Datauser')->with('success', 'Data Berhasil Di Hapus!');
    }
    public function exportpdfuser(){
        $dataUser = userakun::all();

        view()->share('datauser', $dataUser);
        $pdf = Pdf::loadview('userakun.Exportpdf-user');
        return $pdf->stream('Data-UserAkun.pdf');

    }
}
