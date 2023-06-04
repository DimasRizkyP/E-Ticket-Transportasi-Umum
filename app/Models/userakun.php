<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userakun extends Model
{
    use HasFactory;
    // use SoftDeletes;
    public $timestamps=false;

    protected $table = 'user_akun';
    protected $fillable = ['id_user','username','password','role'];
    protected $guarded=[];
    protected $primaryKey = 'id_user';
}
