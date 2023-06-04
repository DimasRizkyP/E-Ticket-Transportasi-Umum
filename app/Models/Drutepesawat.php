<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Drutepesawat extends Model
{
    use HasFactory;
    // use SoftDeletes;
    public $timestamps=false;

    protected $table = 'rute_pesawat';
    protected $fillable = ['id_rute_pesawat','id_bandara_asal','id_bandara_tujuan','detail_status'];
    protected $guarded=[];
    protected $primaryKey = 'id_rute_pesawat';

    // public function id_bandara_asal()
    // {
    //     return $this->belongsTo(Dataterminal::class, 'id_bandara_asal');
    // }
    // public function id_bandara_tujuan()
    // {
    //     return $this->belongsTo(Dataterminal::class, 'id_bandara_tujuan');
    // }

    public function bandara_asal()
    {
        // lokasi, foreign(relation table), primary key(main table)
        return $this->belongsTo('App\Models\Databandara', 'id_bandara_asal', 'id_bandara');
    }
    public function bandara_tujuan()
    {
        // lokasi, foreign(relation table), primary key(main table)
        return $this->belongsTo('App\Models\Databandara', 'id_bandara_tujuan', 'id_bandara');
    }

}
