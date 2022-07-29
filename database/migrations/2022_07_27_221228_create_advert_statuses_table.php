<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advert_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('platform_id')->nullable(false)->constrained();
            $table->integer('advert_id')->nullable(false);
            $table->enum('status', ['success', 'rejected'])->nullable(false);
            $table->timestamps();

            $table->unique(['advert_id', 'platform_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advert_statuses');
    }
};
