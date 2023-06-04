<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\bandaraController;
use App\Http\Controllers\databusController;
use App\Http\Controllers\pemesanController;
use App\Http\Controllers\rutebusController;
use App\Http\Controllers\stasiunController;
use App\Http\Controllers\penggunaController;
use App\Http\Controllers\terminalController;
use App\Http\Controllers\tiketbusController;
use App\Http\Controllers\jadwalbusController;
use App\Http\Controllers\datakeretaController;
use App\Http\Controllers\rutekeretaController;
use App\Http\Controllers\datapesawatController;
use App\Http\Controllers\rutepesawatController;
use App\Http\Controllers\tiketkeretaController;
use App\Http\Controllers\jadwalkeretaController;
use App\Http\Controllers\tiketpesawatController;
use App\Http\Controllers\jadwalpesawatController;



Route::get('/', function () {
    return view('dasbord.pages.dasboard');
});

// Route::get('/', [App\Http\Controllers\Logincontroller::class, 'index'])->name('login');

Route::get('/dasboard', function () {
    return view('dasbord.pages.dasboard');
})->name('dasboard');

Route::controller(databusController::class)->prefix('Databus')->group(function () {
    Route::get('', 'index')->name('Databus');
    Route::get('edit/{id_bus}', 'edit')->name('Databus.edit');
    Route::get('hapus/{id_bus}', 'hapus')->name('Databus.hapus');
    Route::get('tambah', 'tambah')->name('Databus.tambah');
    Route::post('tambah', 'simpan')->name('Databus.tambah.simpan');
    Route::post('edit/{id_bus}', 'update')->name('Databus.tambah.update');
});
//cetakpdf
Route::get('/exportpdfbus', [databusController::class, 'exportpdfbus'])->name('exportpdfbus');


Route::controller(datapesawatController::class)->prefix('Datapesawat')->group(function () {
    Route::get('', 'index')->name('Datapesawat');
    Route::get('edit/{id_pesawat}', 'edit')->name('Datapesawat.edit');
    Route::get('hapus/{id_pesawat}', 'hapus')->name('Datapesawat.hapus');
    Route::get('tambah', 'tambah')->name('Datapesawat.tambah');
    Route::post('tambah', 'simpan')->name('Datapesawat.tambah.simpan');
    Route::post('edit/{id_pesawat}', 'update')->name('Datapesawat.tambah.update');
});
//cetak pdf data pesawat
Route::get('/exportpdfpesawat', [datapesawatController::class, 'exportpdfpesawat'])->name('exportpdfpesawat');

Route::controller(datakeretaController::class)->prefix('Datakereta')->group(function () {
    Route::get('', 'index')->name('Datakereta');
    Route::get('edit/{id_kereta}', 'edit')->name('Datakereta.edit');
    Route::get('hapus/{id_kereta}', 'hapus')->name('Datakereta.hapus');
    Route::get('tambah', 'tambah')->name('Datakereta.tambah');
    Route::post('tambah', 'simpan')->name('Datakereta.tambah.simpan');
    Route::post('edit/{id_kereta}', 'update')->name('Datakereta.tambah.update');
});
//cetak pdf data kereta
Route::get('/exportpdfkereta', [datakeretaController::class, 'exportpdfkereta'])->name('exportpdfkereta');

//data-bandara
Route::controller(bandaraController::class)->prefix('Databandara')->group(function () {
    Route::get('', 'index')->name('Databandara');
    Route::get('edit/{id_bandara}', 'edit')->name('Databandara.edit');
    Route::get('hapus/{id_bandara}', 'hapus')->name('Databandara.hapus');
    Route::get('tambah', 'tambah')->name('Databandara.tambah');
    Route::post('tambah', 'simpan')->name('Databandara.tambah.simpan');
    Route::post('edit/{id_bandara}', 'update')->name('Databandara.tambah.update');
});
//cetak pdf data bandara
Route::get('/exportpdfbandara', [bandaraController::class, 'exportpdfbandara'])->name('exportpdfbandara');

//data terminal
Route::controller(terminalController::class)->prefix('Dataterminal')->group(function () {
    Route::get('', 'index')->name('Dataterminal');
    Route::get('edit/{id_terminal}', 'edit')->name('Dataterminal.edit');
    Route::get('hapus/{id_terminal}', 'hapus')->name('Dataterminal.hapus');
    Route::get('tambah', 'tambah')->name('Dataterminal.tambah');
    Route::post('tambah', 'simpan')->name('Dataterminal.tambah.simpan');
    Route::post('edit/{id_terminal}', 'update')->name('Dataterminal.tambah.update');
});
//cetak pdf data terminal
Route::get('/exportpdfterminal', [terminalController::class, 'exportpdfterminal'])->name('exportpdfterminal');

//data stasiun
Route::controller(stasiunController::class)->prefix('Datastasiun')->group(function () {
    Route::get('', 'index')->name('Datastasiun');
    Route::get('edit/{id_stasiun}', 'edit')->name('Datastasiun.edit');
    Route::get('hapus/{id_stasiun}', 'hapus')->name('Datastasiun.hapus');
    Route::get('tambah', 'tambah')->name('Datastasiun.tambah');
    Route::post('tambah', 'simpan')->name('Datastasiun.tambah.simpan');
    Route::post('edit/{id_stasiun}', 'update')->name('Datastasiun.tambah.update');
});
//cetak pdf data stasiun
Route::get('/exportpdfstasiun', [stasiunController::class, 'exportpdfstasiun'])->name('exportpdfstasiun');

Route::controller(rutebusController::class)->prefix('Datarutebus')->group(function () {
    Route::get('', 'index')->name('Datarutebus');
    Route::get('edit/{id_rute_bus}', 'edit')->name('Datarutebus.edit');
    Route::get('hapus/{id_rute_bus}', 'hapus')->name('Datarutebus.hapus');
    Route::get('tambah', 'tambah')->name('Datarutebus.tambah');
    Route::post('tambah', 'simpan')->name('Datarutebus.tambah.simpan');
    Route::post('edit/{id_rute_bus}', 'update')->name('Datarutebus.tambah.update');
});
//cetak pdf data rute
Route::get('/exportpdfrutebus', [rutebusController::class, 'exportpdfrutebus'])->name('exportpdfrutebus');

//datarutepesawat
Route::controller(rutepesawatController::class)->prefix('Datarutepesawat')->group(function () {
    Route::get('', 'index')->name('Datarutepesawat');
    Route::get('edit/{id_rute_pesawat}', 'edit')->name('Datarutepesawat.edit');
    Route::get('hapus/{id_rute_pesawat}', 'hapus')->name('Datarutepesawat.hapus');
    Route::get('tambah', 'tambah')->name('Datarutepesawat.tambah');
    Route::post('tambah', 'simpan')->name('Datarutepesawat.tambah.simpan');
    Route::post('edit/{id_rute_pesawat}', 'update')->name('Datarutepesawat.tambah.update');
});
//cetak pdf data rute
Route::get('/exportpdfrutepesawat', [rutepesawatController::class, 'exportpdfrutepesawat'])->name('exportpdfrutepesawat');

//datarutekereta
Route::controller(rutekeretaController::class)->prefix('Datarutekereta')->group(function () {
    Route::get('', 'index')->name('Datarutekereta');
    Route::get('edit/{id_rute_kereta}', 'edit')->name('Datarutekereta.edit');
    Route::get('hapus/{id_rute_pesawat}', 'hapus')->name('Datarutekereta.hapus');
    Route::get('tambah', 'tambah')->name('Datarutekereta.tambah');
    Route::post('tambah', 'simpan')->name('Datarutekereta.tambah.simpan');
    Route::post('edit/{id_rute_kereta}', 'update')->name('Datarutekereta.tambah.update');
});
//cetak pdf data rute kereta
Route::get('/exportpdfrutekereta', [rutekeretaController::class, 'exportpdfrutekereta'])->name('exportpdfrutekereta');


//datajadwalbus
Route::controller(jadwalbusController::class)->prefix('Datajadwalbus')->group(function () {
    Route::get('', 'index')->name('Datajadwalbus');
    Route::get('edit/{id_jadwal_bus}', 'edit')->name('Datajadwalbus.edit');
    Route::get('hapus/{id_jadwal_bus}', 'hapus')->name('Datajadwalbus.hapus');
    Route::get('tambah', 'tambah')->name('Datajadwalbus.tambah');
    Route::post('tambah', 'simpan')->name('Datajadwalbus.tambah.simpan');
    Route::post('edit/{id_jadwal_bus}', 'update')->name('Datajadwalbus.tambah.update');
});
//cetak pdf data jadwalbus
Route::get('/exportpdfjadwalbus', [jadwalbusController::class, 'exportpdfjadwalbus'])->name('exportpdfjadwalbus');

Route::controller(jadwalkeretaController::class)->prefix('Datajadwalkereta')->group(function () {
    Route::get('', 'index')->name('Datajadwalkereta');
    Route::get('edit/{id_jadwal_kereta}', 'edit')->name('Datajadwalkereta.edit');
    Route::get('hapus/{id_jadwal_kereta}', 'hapus')->name('Datajadwalkereta.hapus');
    Route::get('tambah', 'tambah')->name('Datajadwalkereta.tambah');
    Route::post('tambah', 'simpan')->name('Datajadwalkereta.tambah.simpan');
    Route::post('edit/{id_jadwal_kereta}', 'update')->name('Datajadwalkereta.tambah.update');
});
//cetak pdf data jadwalkereta
Route::get('/exportpdfjadwalkereta', [jadwalkeretaController::class, 'exportpdfjadwalkereta'])->name('exportpdfjadwalkereta');


Route::controller(jadwalpesawatController::class)->prefix('Datajadwalpesawat')->group(function () {
    Route::get('', 'index')->name('Datajadwalpesawat');
    Route::get('edit/{id_jadwal_pesawat}', 'edit')->name('Datajadwalpesawat.edit');
    Route::get('hapus/{id_jadwal_pesawat}', 'hapus')->name('Datajadwalpesawat.hapus');
    Route::get('tambah', 'tambah')->name('Datajadwalpesawat.tambah');
    Route::post('tambah', 'simpan')->name('Datajadwalpesawat.tambah.simpan');
    Route::post('edit/{id_jadwal_pesawat}', 'update')->name('Datajadwalpesawat.tambah.update');
});
//cetak pdf data jadwalpesawat
Route::get('/exportpdfjadwalpesawat', [jadwalpesawatController::class, 'exportpdfjadwalpesawat'])->name('exportpdfjadwalpesawat');


Route::controller(tiketpesawatController::class)->prefix('Datatiketpesawat')->group(function () {
    Route::get('', 'index')->name('Datatiketpesawat');
    Route::get('edit/{id_tiket_pesawat}', 'edit')->name('Datatiketpesawat.edit');
    Route::get('hapus/{id_tiket_pesawat}', 'hapus')->name('Datatiketpesawat.hapus');
    Route::get('tambah', 'tambah')->name('Datatiketpesawat.tambah');
    Route::post('tambah', 'simpan')->name('Datatiketpesawat.tambah.simpan');
    Route::post('edit/{id_tiket_pesawat}', 'update')->name('Datatiketpesawat.tambah.update');
});
//cetak pdf data tiketpesawat
Route::get('/exportpdftiketpesawat', [tiketpesawatController::class, 'exportpdftiketpesawat'])->name('exportpdftiketpesawat');


//tiketbus
Route::controller(tiketbusController::class)->prefix('Datatiketbus')->group(function () {
    Route::get('', 'index')->name('Datatiketbus');
    Route::get('edit/{id_tiket_bus}', 'edit')->name('Datatiketbus.edit');
    Route::get('hapus/{id_tiket_bus}', 'hapus')->name('Datatiketbus.hapus');
    Route::get('tambah', 'tambah')->name('Datatiketbus.tambah');
    Route::post('tambah', 'simpan')->name('Datatiketbus.tambah.simpan');
    Route::post('edit/{id_tiket_bus}', 'update')->name('Datatiketbus.tambah.update');
});
//cetak pdf data tiketbus
Route::get('/exportpdftiketbus', [tiketbusController::class, 'exportpdftiketbus'])->name('exportpdftiketbus');

//tiketkereta
Route::controller(tiketkeretaController::class)->prefix('Datatiketkereta')->group(function () {
    Route::get('', 'index')->name('Datatiketkereta');
    Route::get('edit/{id_tiket_kereta}', 'edit')->name('Datatiketkereta.edit');
    Route::get('hapus/{id_tiket_kereta}', 'hapus')->name('Datatiketkereta.hapus');
    Route::get('tambah', 'tambah')->name('Datatiketkereta.tambah');
    Route::post('tambah', 'simpan')->name('Datatiketkereta.tambah.simpan');
    Route::post('edit/{id_tiket_kereta}', 'update')->name('Datatiketkereta.tambah.update');
});
//cetak pdf data tiketkereta
Route::get('/exportpdftiketkereta', [tiketkeretaController::class, 'exportpdftiketkereta'])->name('exportpdftiketkereta');


Route::controller(penggunaController::class)->prefix('Datapengguna')->group(function () {
    Route::get('', 'index')->name('Datapengguna');
    Route::get('edit/{id_pengguna}', 'edit')->name('Datapengguna.edit');
    Route::get('hapus/{id_pengguna}', 'hapus')->name('Datapengguna.hapus');
    Route::get('tambah', 'tambah')->name('Datapengguna.tambah');
    Route::post('tambah', 'simpan')->name('Datapengguna.tambah.simpan');
    Route::post('edit/{id_pengguna}', 'update')->name('Datapengguna.tambah.update');
});
//cetak pdf data pengguna
Route::get('/exportpdfpengguna', [penggunaController::class, 'exportpdfpengguna'])->name('exportpdfpengguna');

Route::controller(userController::class)->prefix('Datauser')->group(function () {
    Route::get('', 'index')->name('Datauser');
    Route::get('edit/{id_user}', 'edit')->name('Datauser.edit');
    Route::get('hapus/{id_user}', 'hapus')->name('Datauser.hapus');
    Route::get('tambah', 'tambah')->name('Datauser.tambah');
    Route::post('tambah', 'simpan')->name('Datauser.tambah.simpan');
    Route::post('edit/{id_user}', 'update')->name('Datauser.tambah.update');
});
//cetak pdf data user
Route::get('/exportpdfuser', [penggunaController::class, 'exportpdfuser'])->name('exportpdfuser');


Route::controller(pemesanController::class)->prefix('Datapemesan')->group(function () {
    Route::get('', 'index')->name('Datapemesan');
    Route::get('edit/{id_pemesan}', 'edit')->name('Datapemesan.edit');
    Route::get('hapus/{id_pemesan}', 'hapus')->name('Datapemesan.hapus');
    Route::get('tambah', 'tambah')->name('Datapemesan.tambah');
    Route::post('tambah', 'simpan')->name('Datapemesan.tambah.simpan');
    Route::post('edit/{id_pemesan}', 'update')->name('Datapemesan.tambah.update');
});
//cetak pdf data user
Route::get('/exportpdfpemesan', [pemesanController::class, 'exportpdfpemesan'])->name('exportpdfpemesan');
