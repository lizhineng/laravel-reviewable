<?php

namespace Lizhineng\Reviewable;

use Lizhineng\Reviewable\Exceptions\CantReviewTwiceException;

trait OnlyReviewOnce
{
    public static function bootOnlyReviewOnce()
    {
        static::creating(function (Review $review) {
            $review->assureCantReviewTwice();
        });
    }

    private function assureCantReviewTwice()
    {
        $count = Review::whereHasMorph('reviewable', [$this->reviewable_type], function ($query) {
            $query->where('reviewable_id', $this->reviewable_id);
        })->whereHasMorph('reviewer', [$this->reviewer_type], function ($query) {
            $query->where('reviewer_id', $this->reviewer_id);
        })->count();

        throw_if($count > 0, CantReviewTwiceException::class);
    }
}
