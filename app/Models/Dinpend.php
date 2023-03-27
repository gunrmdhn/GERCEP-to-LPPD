<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dinpend extends Model
{
    use HasFactory;
    protected $table = 'tabel_dinpend';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'kode';
    }
}
