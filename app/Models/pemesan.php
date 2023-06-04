<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemesan extends Model
{
    use HasFactory;
    // use SoftDeletes;
    public $timestamps=false;

    protected $table = 'pemesan';
    protected $fillable = ['id_pemesan','id_pengguna_nama','tanggal','id_tiket_kereta','id_tiket_bus','id_tiket_pesawat'];
    protected $guarded=[];
    protected $primaryKey = 'id_pemesan';

    public function tiketkereta()
    {
        // lokasi, foreign(relation table), primary key(main table)
        return $this->belongsTo('App\Models\Tiketkereta', 'id_tiket_kereta', 'id_tiket_kereta');
    }
    public function tiketbus()
    {
        // lokasi, foreign(relation table), primary key(main table)
        return $this->belongsTo('App\Models\Tiketbus', 'id_tiket_bus', 'id_tiket_bus');
    }
    public function tiketpesawat()
    {
        // lokasi, foreign(relation table), primary key(main table)
        return $this->belongsTo('App\Models\Tiketpesawat', 'id_tiket_pesawat', 'id_tiket_pesawat');
    }
    public function nama()
    {
        // lokasi, foreign(relation table), primary key(main table)
        return $this->belongsTo('App\Models\pengguna', 'id_pengguna_nama', 'id_pengguna');
    }
}

