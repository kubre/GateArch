<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function getPublishDateAttribute()
    {
        return $this->created_at->format('d/m/Y');
    }

    public function getEditDateAttribute()
    {
        return $this->updated_at->format('d/m/Y');
    }

    public function getSlugAttribute()
    {
        return str_slug($this->title);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getWriterNameAttribute()
    {
        return $this->user->name;
    }
}
