<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dataterminal extends Model
{
    use HasFactory;
    // use SoftDeletes;

    public $timestamps=false;

    protected $table = 'terminal';
    protected $fillable = ['id_terminal','nama_terminal','kota','negara'];
    protected $guarded=[];
    protected $primaryKey = 'id_terminal';

    // public function  rute_bus()
    // {
    //     return $this->hasMany(Drutebus::class,'id_terminal');
    // }
}
