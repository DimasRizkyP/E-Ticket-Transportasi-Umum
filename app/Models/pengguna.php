<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
    use HasFactory;
    // use SoftDeletes;
    public $timestamps=false;

    protected $table = 'pengguna';
    protected $fillable = ['id_pengguna','nama','no_ktp','email','no_telepon','warga_negara'];
    protected $guarded=[];
    protected $primaryKey = 'id_pengguna';
}
