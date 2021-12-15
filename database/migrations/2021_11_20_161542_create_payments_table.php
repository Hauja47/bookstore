<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('payment_type_id')->constrained('payment_types');
            $table->morphs('receiver');
            $table->nullableMorphs('payable');
            // $table->foreignId('payment_method_id')->constrained('payment_methods');
            $table->foreignId('employee_id')->constrained('employees');
            $table->integer('money');
            $table->boolean('can_edit_note')->default(1);
            $table->text('note')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
