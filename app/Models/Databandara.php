<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Databandara extends Model
{
    use HasFactory;
    // use SoftDeletes;


    public $timestamps=false;

    protected $table = 'bandara';
    protected $fillable = ['id_bandara','nama_bandara','kota','negara'];
    protected $guarded=[];
    protected $primaryKey = 'id_bandara';

    // public function  rute_pesawat()
    // {
    //     return $this->hasMany(Drutebandara::class);
    // }
}
