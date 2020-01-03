<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    public function up()
    {
        $tableName = config('reviewable.table_name');

        Schema::create($tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->morphs('reviewable');
            $table->morphs('reviewer');
            $table->text('comment')->nullable();
            $table->unsignedInteger('rating')->nullable();
            $table->boolean('is_anonymous')->default(false);
            $table->string('state');
            $table->timestamps();

            $table->index('is_anonymous');
            $table->index('state');
        });
    }

    public function down()
    {
        $tableName = config('reviewable.table_name');

        Schema::dropIfExists($tableName);
    }
}
