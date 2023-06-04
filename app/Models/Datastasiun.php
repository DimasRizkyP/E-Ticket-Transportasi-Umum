<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Datastasiun extends Model
{
    use HasFactory;
    // use SoftDeletes;
    public $timestamps=false;

    protected $table = 'stasiun';
    protected $fillable = ['id_stasiun','nama_stasiun','kota','negara'];
    protected $guarded=[];
    protected $primaryKey = 'id_stasiun';
    // public function  rute_kereta()
    // {
    //     return $this->hasMany(Drutekereta::class);
    // }
}
