<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Traits\Migrations\BaseMigrationTrait;

class CreateDynamicValueStringsTable extends Migration
{
    use BaseMigrationTrait;

    public $table_name = 'dynamic_value_strings';
    public $table_comment = 'dynamic values of type STRING';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id();

            $table->string('thevalue')->comment('the definitive value');

            $table->foreignId('dynamic_attribute_id')->nullable()
                ->comment('dynamic attribute reference')
                ->constrained()->onDelete('set null');

            $table->foreignId('dynamic_attribute_value_row_id')->nullable()
                ->comment('dynamic attribute value row reference')
                ->constrained()->onDelete('set null');

            $table->timestamps();
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
            $table->dropForeign(['dynamic_attribute_id']);
            $table->dropForeign(['dynamic_attribute_value_row_id']);
        });
        Schema::dropIfExists($this->table_name);
    }
}
