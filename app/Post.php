<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'summary', 'description', 'image_path', 'admin_id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
