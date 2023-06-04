<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Databus extends Model
{
    use HasFactory;
    // use SoftDeletes;
    public $timestamps=false;

   protected $table = 'bus';
    protected $fillable = ['id_bus','nama_bus','kelas','kuota','perusahaan'];
    protected $guarded=[];
    protected $primaryKey = 'id_bus';
}

