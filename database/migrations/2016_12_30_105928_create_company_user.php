<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_user', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('company_id');
            $table->string('role', 30);
            $table->timestamps();
            
            $table->primary(['user_id', 'company_id']);
        });
        
        Schema::table('users', function($table){
            $table->dropColumn(['company_id', 'role']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_user');
        
        Schema::table('users', function($table){
            $table->integer('company_id')->index();
            $table->string('role', 30);
        });
    }
}
