<?php

namespace App\Models;

use App\Models\TennisMatch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TennisPlayer extends Model
{
    use HasFactory;

    public function matches()
    {
        return $this->hasMany(TennisMatch::class);
    }

    protected $fillable = [
        'name',
        'lastname',
        'gender',
        'hability',
        'strength',
        'sprintSpeed',
        'agility'
    ];
}
