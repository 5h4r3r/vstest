<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\FromCollection;


class ZKH extends Model
{
    protected $table = 'zkhdebt';
    public $timestamps = false;
    protected $fillable = [
        'lastname',
        'firstname',
        'secondname',
        'debt',
        'statefee'
    ];

    public static function stateFee($debt)
    {
        $statefee = $debt * 0.04;
        if($statefee < 400){
            return 400;
        }else{
            return $statefee;
        }

    }
}
