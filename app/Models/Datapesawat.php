<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Datapesawat extends Model
{
    use HasFactory;
    // use SoftDeletes;
    public $timestamps=false;

    protected $table = 'pesawat';
    protected $fillable = ['id_pesawat','nama_pesawat','kelas','kuota','perusahaan'];
    protected $guarded=[];
    protected $primaryKey = 'id_pesawat';
}

