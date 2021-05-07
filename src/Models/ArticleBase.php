<?php

namespace bachphuc\LaravelArticle\Models;

use Illuminate\Database\Eloquent\Model;

use bachphuc\PhpLaravelHelpers\WithModelBase;
use bachphuc\PhpLaravelHelpers\WithImage;
use bachphuc\PhpLaravelHelpers\WithModelRule;

class ArticleBase extends Model
{
    use WithModelBase, WithImage, WithModelRule;

    protected $thumbnailSizes = [120, 300, 500, 720];
}