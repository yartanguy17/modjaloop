<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporting extends Model
{
    use HasFactory;
    protected $guarded = [
        'created_at',
        'updated',
    ];
}
