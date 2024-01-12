<?php

namespace App\Models;

use App\Models\User;
use FontLib\Table\Type\post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rayons extends Model
{
    use HasFactory;
    protected $fillable = [
        'rayon',
        'user_id',
    ];

    public function userId(){
        return $this->hasMany(User::class, 'user_id', 'id');
    }
}
