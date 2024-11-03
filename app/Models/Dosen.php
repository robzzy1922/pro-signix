<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Dosen extends Model
{
    use HasFactory;
    protected $fillable = [
        'nip',
        'nama',
        'email',
        'jurusan',
        'password'
];

    protected function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
