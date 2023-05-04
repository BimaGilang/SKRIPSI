<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rop extends Model
{
    use HasFactory;

    protected $table = 'rop';
    protected $primaryKey = 'id_rop';
    protected $guarded = [];
}
