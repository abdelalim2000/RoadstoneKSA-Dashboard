<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleTranslation extends Model
{
    public $timestamps = false;

    protected $table = 'article_translations';

    protected $fillable = [
        'title',
        'locale',
        'seo_keywords',
        'seo_description',
        'description',
        'article',
        'article_id',
    ];
}
