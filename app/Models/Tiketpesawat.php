<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiketpesawat extends Model
{
    use HasFactory;
    // use SoftDeletes;
    public $timestamps=false;

    protected $table = 'tiket_pesawat';
    protected $fillable = ['id_tiket_pesawat','id_jadwal_pesawat','harga','tanggal_booking'];
    protected $guarded=[];
    protected $primaryKey = 'id_tiket_pesawat';

    public function jadwalpesawat()
    {
        // lokasi, foreign(relation table), primary key(main table)
        return $this->belongsTo('App\Models\Jadwalpesawat', 'id_jadwal_pesawat', 'id_jadwal_pesawat');
    }

}
