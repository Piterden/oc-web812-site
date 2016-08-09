<?php namespace DEfr\VueManager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDefrVuemanagerFiles2 extends Migration
{
    public function up()
    {
        Schema::create('defr_vuemanager_files', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('disk_name', 255);
            $table->string('file_name', 255);
            $table->integer('file_size');
            $table->string('content_type', 255);
            $table->string('title', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('field', 255)->nullable();
            $table->string('attachment_id', 255)->nullable();
            $table->string('attachment_type', 255)->nullable();
            $table->boolean('is_public')->default(1);
            $table->integer('sort_order')->nullable();
            $table->timestamp('created_at');
            $table->dateTime('edited_at');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('defr_vuemanager_files');
    }
}
