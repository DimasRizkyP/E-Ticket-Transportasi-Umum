<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwalbus extends Model
{
    use HasFactory;
    // use SoftDeletes;
    public $timestamps=false;

    protected $table = 'jadwal_bus';
    protected $fillable = ['id_jadwal_bus','id_bus','id_rute_bus','tanggal_berangkat','tanggal_sampai'];
    protected $guarded=[];
    protected $primaryKey = 'id_jadwal_bus';

    public function nama_bus()
    {
        // lokasi, foreign(relation table), primary key(main table)
        return $this->belongsTo('App\Models\Databus', 'id_bus', 'id_bus');
    }
    public function rute_bus()
    {
        // lokasi, foreign(relation table), primary key(main table)
        return $this->belongsTo('App\Models\Drutebus', 'id_rute_bus', 'id_rute_bus');
    }
}
