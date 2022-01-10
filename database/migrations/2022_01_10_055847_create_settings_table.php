<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->float('min_deposit')->nullable();
            $table->float('min_transfer')->nullable();
            $table->float('min_withdraw')->nullable();
            $table->float('sponsor_bonus')->nullable();
            $table->float('pair_bonus')->nullable();
            $table->float('profit_bonus')->nullable();
            $table->float('club_bonus')->nullable();
            $table->float('unit_bonus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
