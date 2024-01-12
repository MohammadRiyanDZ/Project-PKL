<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $fillable = [
        'nis',
        'name',
        'rombel_id',
        'rayon_id',
    ];

    public function rombelid(){
        return $this->belongsTo(Rombels::class, 'rombel_id', 'id');
    }
    public function rayonid(){
        return $this->belongsTo(Rayons::class, 'rayon_id', 'id');
    }
    public function latesid(){
        return $this->hasMany(Lates::class, 'id', 'id');
    }
}

