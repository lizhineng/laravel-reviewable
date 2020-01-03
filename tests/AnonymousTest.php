<?php

namespace Lizhineng\Reviewable\Tests;

use Lizhineng\Reviewable\Review;

class AnonymousTest extends TestCase
{
    /** @test */
    public function it_has_scope_of_anonymous()
    {
        $this->assertEquals(0, Review::anonymous()->count());
    }

    /** @test */
    public function it_has_scope_of_identifiable()
    {
        $this->assertEquals(1, Review::identifiable()->count());
        $this->assertTrue(Review::identifiable()->first()->is($this->review));
    }
}
