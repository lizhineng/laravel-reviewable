<?php

namespace Lizhineng\Reviewable\Tests;

use Lizhineng\Reviewable\HasReviews;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasReviews;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        //
    ];
}
