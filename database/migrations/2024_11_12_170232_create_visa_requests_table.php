<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisaRequestsTable extends Migration
{
    public function up()
    {

        Schema::create('visa_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name');
            $table->string('surname');
            $table->date('birthdate');
            $table->string('nationality');
            $table->string('passport_number')->unique();
            $table->date('passport_expiry');
            $table->string('passport_image');
            $table->string('card_number');
            $table->string('card_expiry');
            $table->string('card_cvc');
            $table->enum('validation', ['oui', 'non'])->nullable(); // Initially empty, admin updates later
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('visa_requests');
    }
}

