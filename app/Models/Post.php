<?php

namespace App\Models;

use App\Models\Model as AppModel;

class Post extends AppModel
{
    //
    protected $table = 'posts';
    protected $fillable = [
        'slug',
        'meta_title',
        'meta_keyword',
        'meta_description',
    ];

    public function postTranslations()
    {
        return $this->hasMany(PostTranslation::class, 'post_id', 'id');
    }

}