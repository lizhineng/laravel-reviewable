<?php

namespace Lizhineng\Reviewable;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use OnlyReviewOnce;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_anonymous' => 'bool',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        //
    ];

    public function reviewable()
    {
        return $this->morphTo();
    }

    public function reviewer()
    {
        return $this->morphTo();
    }

    public function scopeAnonymous($query)
    {
        return $query->where('is_anonymous', true);
    }

    public function scopeIdentifiable($query)
    {
        return $query->where('is_anonymous', false);
    }

    public function scopeState($query, $state)
    {
        return $query->where('state', $state);
    }
}
