<?php

namespace Lizhineng\Reviewable\Tests;

class HasReviewsTest extends TestCase
{
    /** @test */
    public function it_has_reviews()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->movie->reviews);
    }

    /** @test */
    public function it_has_average_rating()
    {
        $this->assertEquals(5, $this->movie->average_rating);
    }
}
