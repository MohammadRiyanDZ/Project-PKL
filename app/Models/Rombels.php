<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rombels extends Model
{
    use HasFactory;
    protected $fillable = [
        'rombel'
    ];
    public function student(){
        return $this->belongsTo(Students::class, 'id', 'id');
    }
}
