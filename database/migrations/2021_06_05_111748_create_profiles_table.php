<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('present_location');
            $table->string('prefered_location');
            $table->string('sslc');
            $table->string('puc');
            $table->string('degree');
            $table->string('stream');
            $table->integer('passed_out_year');
            $table->string('college_name');
            $table->integer('city_id');
            $table->string('company_details')->default('');
            $table->string('company_name')->default('');
            $table->string('role')->default('');
            $table->datetime('joining_date')->default(null);
            $table->string('skills')->default('');
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
        Schema::dropIfExists('profiles');
    }
}
