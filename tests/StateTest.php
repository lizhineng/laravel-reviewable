<?php

namespace Lizhineng\Reviewable\Tests;

use Lizhineng\Reviewable\Review;

class StateTest extends TestCase
{
    /** @test */
    public function it_has_default_state()
    {
        $this->assertEquals('published', $this->review->state);
    }

    /** @test */
    public function it_has_scope_of_state()
    {
        $this->assertCount(1, Review::state('published')->get());
        $this->assertTrue(Review::state('published')->first()->is($this->review));
    }
}
