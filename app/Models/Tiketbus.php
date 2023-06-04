<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiketbus extends Model
{
    use HasFactory;
    // use SoftDeletes;
    public $timestamps=false;

    protected $table = 'tiket_bus';
    protected $fillable = ['id_tiket_bus','id_jadwal_bus','harga','tanggal_booking'];
    protected $guarded=[];
    protected $primaryKey = 'id_tiket_bus';

    public function jadwalbus()
    {
        // lokasi, foreign(relation table), primary key(main table)
        return $this->belongsTo('App\Models\Jadwalbus', 'id_jadwal_bus', 'id_jadwal_bus');
    }
}
