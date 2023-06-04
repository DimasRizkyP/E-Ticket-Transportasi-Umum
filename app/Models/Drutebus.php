<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Drutebus extends Model
{
    use HasFactory;
    // use SoftDeletes;

    public $timestamps = false;

    protected $table = 'rute_bus';
    protected $fillable = ['id_rute_bus', 'id_terminal_asal', 'id_terminal_tujuan', 'detail_status'];
    protected $guarded = [];
    protected $primaryKey = 'id_rute_bus';


    // public function id_terminal()
    // {
    //     return $this->belongsTo(Dataterminal::class, 'id_terminal_asal');
    // }
    // public function id_terminal0()
    // {
    //     return $this->belongsTo(Dataterminal::class, 'id_terminal_tujuan');
    // }

    public function terminal_asal()
    {
        // lokasi, foreign(relation table), primary key(main table)
        return $this->belongsTo('App\Models\Dataterminal', 'id_terminal_asal', 'id_terminal');
    }
    public function terminal_tujuan()
    {
        // lokasi, foreign(relation table), primary key(main table)
        return $this->belongsTo('App\Models\Dataterminal', 'id_terminal_tujuan', 'id_terminal');
    }
}
