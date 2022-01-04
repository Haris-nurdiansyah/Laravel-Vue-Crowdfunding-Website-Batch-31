<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
}

// App\Role::create(['name' => 'admin']);
// App\User::create([
//     "name" => "Dini Aulia",
//     "username" => "dini15",
//     "email" => "dini@gmail.com",
//     "role_id" => "bff332bd-0a00-4891-b09d-530d4fd2245a"
// ]);
