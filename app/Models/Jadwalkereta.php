<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwalkereta extends Model
{
    use HasFactory;
    // use SoftDeletes;
    public $timestamps=false;

    protected $table = 'jadwal_kereta';
    protected $fillable = ['id_jadwal_kereta','id_kereta','id_rute_kereta','tanggal_berangkat','tanggal_sampai'];
    protected $guarded=[];
    protected $primaryKey = 'id_jadwal_kereta';

    public function namakereta()
    {
        // lokasi, foreign(relation table), primary key(main table)
        return $this->belongsTo('App\Models\Datakereta', 'id_kereta', 'id_kereta');
    }
    public function rutekereta()
    {
        // lokasi, foreign(relation table), primary key(main table)
        return $this->belongsTo('App\Models\Drutekereta', 'id_rute_kereta', 'id_rute_kereta');
    }
}
