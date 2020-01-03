<?php

namespace Lizhineng\Reviewable;

trait HasReviews
{
    /**
     * The model may has many reviews.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function getAverageRatingAttribute()
    {
        $reviews = $this->reviews()->whereNotNull('rating');

        $count = $reviews->count();

        if ($count === 0) {
            return 0;
        }

        return $reviews->sum('rating') / $count;
    }
}
