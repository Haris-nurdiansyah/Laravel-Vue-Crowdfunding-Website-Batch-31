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
//     "name" => "Haris Nurdiansyah",
//     "username" => "haris15",
//     "email" => "haris00santos@@gmail.com",
//     "role_id" => "132e9235-8e35-437f-9f50-474ac0086d96"
// ]);
// 137fa50a-bb72-4c9a-8beb-a92729a593da
