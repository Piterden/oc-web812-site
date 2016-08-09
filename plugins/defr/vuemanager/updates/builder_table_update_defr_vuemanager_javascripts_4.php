<?php namespace DEfr\VueManager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDefrVuemanagerJavascripts4 extends Migration
{
    public function up()
    {
        Schema::table('defr_vuemanager_javascripts', function($table)
        {
            $table->renameColumn('vuefile_id', 'file_id');
        });
    }
    
    public function down()
    {
        Schema::table('defr_vuemanager_javascripts', function($table)
        {
            $table->renameColumn('file_id', 'vuefile_id');
        });
    }
}
