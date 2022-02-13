<?php

namespace App\Models;

use App\Models\Model as AppModel;

class PostTranslation extends AppModel
{
    //
    protected $table = 'post_translations';
    protected $fillable = [
        'post_id',
        'lang',
        'name',
        'description',
        'content'
    ];
}