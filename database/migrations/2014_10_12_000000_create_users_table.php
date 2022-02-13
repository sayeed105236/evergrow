<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          $table->id();
          $table->string('name');
          $table->string('user_name')->unique();
          $table->string('referral_token')->unique();

          $table->string('email');
          $table->string('number')->nullable();

          $table->string('country')->nullable();
          $table->string('gender')->nullable();
          $table->string('sponsor')->nullable();
          $table->string('placement_id')->nullable();
          $table->integer('position')->nullable();

          $table->foreignId('current_team_id')->nullable();
          $table->string('profile_photo_path', 2048)->nullable();
          $table->timestamp('email_verified_at')->nullable();
          $table->string('password');

          $table->rememberToken();
          $table->string('utype')->default('USR')->comment('ADM for Admin USR for normal user');
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
        Schema::dropIfExists('users');
    }
}
