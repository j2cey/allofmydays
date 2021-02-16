<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Traits\Migrations\BaseMigrationTrait;

class CreateUsersTable extends Migration
{
    use BaseMigrationTrait;

    public $table_name = 'users';
    public $table_comment = 'users list of the system';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->baseFields();

            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique()->comment('account login or first part of the e-mail address');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->rememberToken();
        });
        $this->setTableComment($this->table_name,$this->table_comment);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->table_name, function (Blueprint $table) {
            $table->dropBaseForeigns();
        });
        Schema::dropIfExists($this->table_name);
    }
}
