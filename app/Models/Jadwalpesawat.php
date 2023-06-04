<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwalpesawat extends Model
{
    use HasFactory;
    // use SoftDeletes;
    public $timestamps=false;

    protected $table = 'jadwal_pesawat';
    protected $fillable = ['id_jadwal_pesawat','id_pesawat','id_rute_pesawat','tanggal_berangkat','tanggal_sampai'];
    protected $guarded=[];
    protected $primaryKey = 'id_jadwal_pesawat';

    public function namapesawat()
    {
        // lokasi, foreign(relation table), primary key(main table)
        return $this->belongsTo('App\Models\Datapesawat', 'id_pesawat', 'id_pesawat');
    }
    public function rutepesawat()
    {
        // lokasi, foreign(relation table), primary key(main table)
        return $this->belongsTo('App\Models\Drutepesawat', 'id_rute_pesawat', 'id_rute_pesawat');
    }
}
