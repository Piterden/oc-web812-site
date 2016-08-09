<?php namespace DEfr\VueManager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDefrVuemanagerPages extends Migration
{
    public function up()
    {
        Schema::create('defr_vuemanager_pages', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name', 255);
            $table->string('filename', 255);
            $table->text('template')->nullable();
            $table->text('style')->nullable();
            $table->text('script')->nullable();
            $table->string('path', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('defr_vuemanager_pages');
    }
}
