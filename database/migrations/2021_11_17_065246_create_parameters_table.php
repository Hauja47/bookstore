<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('value');
            $table->timestamps();
        });

        if (Schema::hasTable('parameters')) {
            DB::insert(
                'insert into parameters(name, value, created_at, updated_at) values (?, ?, ?, ?)',
                [
                    'min_imported_number',
                    50,
                    now("Asia/Ho_Chi_Minh"),
                    now("Asia/Ho_Chi_Minh")
                ]
            );
            DB::insert(
                'insert into parameters(name, value, created_at, updated_at) values (?, ?, ?, ?)',
                [
                    'max_in_stock_number_before_import',
                    150,
                    now("Asia/Ho_Chi_Minh"),
                    now("Asia/Ho_Chi_Minh")
                ]
            );
            DB::insert(
                'insert into parameters(name, value, created_at, updated_at) values (?, ?, ?, ?)',
                [
                    'max_debt',
                    0,
                    now("Asia/Ho_Chi_Minh"),
                    now("Asia/Ho_Chi_Minh")
                ]
            );
            DB::insert(
                'insert into parameters(name, value, created_at, updated_at) values (?, ?, ?, ?)',
                [
                    'min_in_stock_number_after_sale',
                    0,
                    now("Asia/Ho_Chi_Minh"),
                    now("Asia/Ho_Chi_Minh")
                ]
            );
            DB::insert(
                'insert into parameters(name, value, created_at, updated_at) values (?, ?, ?, ?)',
                [
                    'rate_price',
                    50,
                    now("Asia/Ho_Chi_Minh"),
                    now("Asia/Ho_Chi_Minh")
                ]
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parameters');
    }
}
