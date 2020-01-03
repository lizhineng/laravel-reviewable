<?php

namespace Lizhineng\Reviewable\Tests;

use Lizhineng\Reviewable\Review;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /**
     * A movie instance for testing.
     *
     * @var \Lizhineng\Reviewable\Tests\Movie
     */
    protected $movie;

    /**
     * An user instance for testing.
     *
     * @var \Lizhineng\Reviewable\Tests\User
     */
    protected $user;

    /**
     * A review instance for testing.
     *
     * @var \Lizhineng\Reviewable\Review
     */
    protected $review;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->setUpDatabase();
    }

    protected function setUpDatabase()
    {
        $this->loadMigrationsFrom(__DIR__.'/migrations');

        $this->artisan('migrate')->run();

        $this->movie = app(Movie::class)->create([
            'title' => 'Test Movie',
        ]);

        $this->user = app(User::class)->create([
            'email' => 'test@test-domain.test',
        ]);

        $this->review = app(Review::class)->create([
            'rating' => 5,
            'comment' => 'test',
            'is_anonymous' => false,
            'reviewable_type' => Movie::class,
            'reviewable_id' => 1,
            'reviewer_type' => User::class,
            'reviewer_id' => 1,
            'state' => 'published',
        ]);
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application   $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return ['Lizhineng\Reviewable\ReviewableServiceProvider'];
    }
}
