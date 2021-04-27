<?php

namespace bachphuc\LaravelArticle\Models;

use Illuminate\Database\Eloquent\Model;

use bachphuc\PhpLaravelHelpers\WithModelBase;
use bachphuc\PhpLaravelHelpers\WithImage;

class ArticleBase extends Model
{
    use WithModelBase, WithImage;

    protected $thumbnailSizes = [120, 300, 500, 720];
}