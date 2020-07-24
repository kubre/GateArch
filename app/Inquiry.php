<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = ['name', 'email', 'subject', 'message'];

    public function getDateAttribute()
    {
        return $this->created_at->format('d/M/Y');
    }
}
