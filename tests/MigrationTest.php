<?php

namespace Lizhineng\Reviewable\Tests;

use Illuminate\Support\Facades\DB;
use Lizhineng\Reviewable\Tests\TestCase;

class MigrationTest extends TestCase
{
    /** @test */
    public function it_runs_the_migrations()
    {
        $tableName = config('reviewable.table_name');

        DB::table($tableName)->insert([
            'rating' => 5,
            'reviewable_type' => Movie::class,
            'reviewable_id' => 1,
            'reviewer_type' => User::class,
            'reviewer_id' => 1,
            'state' => 'published',
        ]);

        $review = DB::table($tableName)->where('id', 1)->first();

        $this->assertEquals(5, $review->rating);
    }
}
