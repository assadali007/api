<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;
    protected $fillable = ['title'];

    protected $hidden = [
        'question',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
