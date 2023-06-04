<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Drutekereta extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $table = 'rute_kereta';
    protected $fillable = ['id_rute_kereta','id_stasiun_asal','id_stasiun_tujuan','detail_status'];
    protected $guarded=[];
    protected $primaryKey = 'id_rute_kereta';

    // public function id_kereta_asal()
    // {
    //     return $this->belongsTo(Datastasiun::class, 'id_stasiun_asal');
    // }
    // public function id_kereta_tujuan()
    // {
    //     return $this->belongsTo(Datastasiun::class, 'id_stasiun_tujuan');
    // }

    public function stasiun_asal()
    {
        // lokasi, foreign(relation table), primary key(main table)
        return $this->belongsTo('App\Models\Datastasiun', 'id_stasiun_asal', 'id_stasiun');
    }
    public function stasiun_tujuan()
    {
        // lokasi, foreign(relation table), primary key(main table)
        return $this->belongsTo('App\Models\Datastasiun', 'id_stasiun_tujuan', 'id_stasiun');
    }



}
