<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'active', 'faculty_id'];

    //function pertenece a una facultad o a varias?

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
