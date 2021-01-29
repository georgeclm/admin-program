<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lead_id');
            $table->unsignedBigInteger('package_id');
            $table->timestamp('renewal_date');
            $table->float('amount',10,2);
            $table->timestamps();
            $table->index(['lead_id','package_id','renewal_date']);
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->integer('age');
            $table->date('dob');
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('added_by');
            $table->string('interested_package');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscribers');
    }
}
