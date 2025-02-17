<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'nama',
        'email',
        'telpon',
        'start_date',
        'end_date'
    ];
}
