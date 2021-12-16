<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('receipt_type_id')->constrained('receipt_types');
            $table->morphs('giver');
            // $table->foreignId('payment_method_id')->constrained('payment_methods');
            $table->foreignId('employee_id')->constrained('employees');
            $table->integer('money');
            $table->boolean('can_edit_note')->default(1);
            $table->boolean('can_delete')->default(1);
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
        Schema::dropIfExists('receipts');
    }
}
