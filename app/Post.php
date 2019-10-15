<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    public function path()
    {
        return url("/post/{$this->id}-" . Str::slug($this->title));
    }
}
