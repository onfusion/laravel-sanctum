<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name', 120);
            $table->string('email', 50) -> unique();
            $table->string('mobile', 50) -> nullable();
            $table->enum('gender', ['male', 'female', 'others']);
            $table->integer("age");
            $table->string('city');
            $table->string('state');
            $table->text('address');
            $table->timestamp('created_at') -> useCurrent();
            $table->timestamp('updated_at') -> useCurrent();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
