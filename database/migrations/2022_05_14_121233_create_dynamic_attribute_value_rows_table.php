<?php

use App\Traits\Migrations\BaseMigrationTrait;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDynamicAttributeValueRowsTable extends Migration
{
    use BaseMigrationTrait;

    public $table_name = 'dynamic_attribute_value_rows';
    public $table_comment = 'dynamic attribute values rows.';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id();

            $table->uuid('line_uuid')->comment('uuid of value generation line');
            $table->integer('line_num')->comment('line number');

            $table->timestamp('firstinserted_at')->comment('first value inserted date');
            $table->timestamp('lastinserted_at')->nullable()->comment('last value inserted date');

            $table->string('hasdynamicvaluerow_type')->comment('referenced value row');
            $table->bigInteger('hasdynamicvaluerow_id')->comment('referenced value row id');

            $table->baseFields();
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
