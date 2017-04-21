<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features_plans', function (Blueprint $table) {
            $table->unsignedInteger('feature_id')->index();
            $table->foreign('feature_id')->references('id')->on('features')->onDelete('cascade');
            $table->unsignedInteger('plan_id')->index();
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->primary(['plan_id', 'feature_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('features_plans');
    }
}
