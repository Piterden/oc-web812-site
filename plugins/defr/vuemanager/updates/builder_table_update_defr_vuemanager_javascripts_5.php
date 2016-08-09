<?php namespace DEfr\VueManager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDefrVuemanagerJavascripts5 extends Migration
{
    public function up()
    {
        Schema::table('defr_vuemanager_javascripts', function($table)
        {
            $table->string('content_type', 255)->default('text/plain')->change();
        });
    }
    
    public function down()
    {
        Schema::table('defr_vuemanager_javascripts', function($table)
        {
            $table->string('content_type', 255)->default('js')->change();
        });
    }
}
