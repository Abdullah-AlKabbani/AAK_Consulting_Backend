<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expertise extends Model
{
    use HasFactory;
    protected $fillable = [
        'user id',
        'type id',
        'details',
        'image_url',
        'name'

    ];


    public function user():BelongsTo
    {

        return $this->belongsTo('users');
    }

    public function type():BelongsTo
    {

        return $this->belongsTo('types');
    }
}
