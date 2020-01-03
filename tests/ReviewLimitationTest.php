<?php

namespace Lizhineng\Reviewable\Tests;

use Lizhineng\Reviewable\Reviewable;
use Lizhineng\Reviewable\Tests\Movie;
use Lizhineng\Reviewable\Exceptions\CantReviewTwiceException;

class ReviewLimitationTest extends TestCase
{
    /** @test */
    public function it_cant_be_reviewed_twice()
    {
        $this->expectException(CantReviewTwiceException::class);

        $this->review->replicate()->save();
    }
}
