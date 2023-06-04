<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Datakereta extends Model
{
    use HasFactory;
    // use SoftDeletes;
    public $timestamps=false;

    protected $table = 'kereta-api';
    protected $fillable = ['id_kereta','nama_kereta','kelas','kuota_kereta','perusahaan'];
    protected $guarded=[];
    protected $primaryKey = 'id_kereta';
}
