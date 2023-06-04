<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiketkereta extends Model
{
    use HasFactory;
    // use SoftDeletes;
    public $timestamps=false;

    protected $table = 'tiket_kereta';
    protected $fillable = ['id_tiket_kereta','id_jadwal_kereta','harga','tanggal_booking'];
    protected $guarded=[];
    protected $primaryKey = 'id_tiket_kereta';

    public function jadwalkereta()
    {
        // lokasi, foreign(relation table), primary key(main table)
        return $this->belongsTo('App\Models\Jadwalkereta', 'id_jadwal_kereta', 'id_jadwal_kereta');
    }
}
