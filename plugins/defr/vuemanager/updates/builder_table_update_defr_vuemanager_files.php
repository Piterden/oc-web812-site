<?php namespace DEfr\VueManager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDefrVuemanagerFiles extends Migration
{
    public function up()
    {
        Schema::table('defr_vuemanager_files', function($table)
        {
            $table->renameColumn('edited_at', 'updated_at');
        });
    }
    
    public function down()
    {
        Schema::table('defr_vuemanager_files', function($table)
        {
            $table->renameColumn('updated_at', 'edited_at');
        });
    }
}
