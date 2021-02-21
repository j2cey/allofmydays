<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Traits\Migrations\BaseMigrationTrait;

class CreateModelHasEvaluationsTable extends Migration
{
    use BaseMigrationTrait;

    public $table_name = 'model_has_evaluations';
    public $table_comment = 'list of evaluations for a given model';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id();

            $table->foreignId('evaluation_id')->nullable()
                ->comment('evaluation reference')
                ->constrained('evaluations')->onDelete('set null');

            $table->string('model_type')->comment('type of referenced model');
            $table->bigInteger('model_id')->comment('model reference');

            $table->integer('posi')->default(0)->comment('evaluation position in evaluations list.');
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
            $table->dropForeign(['evaluation_id']);
        });
        Schema::dropIfExists($this->table_name);
    }
}
