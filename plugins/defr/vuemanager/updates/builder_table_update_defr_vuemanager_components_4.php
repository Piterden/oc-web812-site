<?php namespace DEfr\VueManager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDefrVuemanagerComponents4 extends Migration
{
    public function up()
    {
        Schema::table('defr_vuemanager_components', function($table)
        {
            $table->integer('file_id')->nullable()->unsigned();
            $table->dropColumn('file');
        });
    }
    
    public function down()
    {
        Schema::table('defr_vuemanager_components', function($table)
        {
            $table->dropColumn('file_id');
            $table->text('file')->nullable();
        });
    }
}
