<?php

namespace Lizhineng\Reviewable\Tests;

use Lizhineng\Reviewable\Review;

class ReviewTest extends TestCase
{
    /** @test */
    public function it_has_rating()
    {
        $this->assertEquals(5, $this->review->rating);
    }

    /** @test */
    public function it_has_comment()
    {
        $this->assertEquals('test', $this->review->comment);
    }

    /** @test */
    public function it_can_be_anonymous()
    {
        $this->assertIsBool($this->review->is_anonymous);
        $this->assertEquals(false, $this->review->is_anonymous);
    }

    /** @test */
    public function it_has_a_reviewable()
    {
        $this->assertInstanceOf(Movie::class, $this->review->reviewable);
    }

    /** @test */
    public function it_has_reviewer()
    {
        $this->assertInstanceOf(User::class, $this->review->reviewer);
    }

    /** @test */
    public function it_has_state()
    {
        $this->assertEquals('published', $this->review->state);
    }
}
