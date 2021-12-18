<?php

use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('full_name');
            $table->string('photo')->nullable();
            $table->string('phone_number')->unique();
            $table->string('email')->unique();
            $table->text('address');
            $table->boolean('is_working')->default(false);
            $table->integer('salary')->default(0);
            $table->foreignId('user_id')->constrained('user');
            $table->timestamps();
        });

        if (Schema::hasTable('users') && Schema::hasTable('employees')) {
            Employee::create([
                'full_name' => "Tên quản trị viên",
                'phone_number' => '0000000000',
                'email' => 'email',
                'address' => 'Địa chỉ',
                'user_id' => User::create([
                    'username' => 'admin',
                    'password' => '123456',
                    'role' => '1',
                ])->id
            ]);
        }
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
