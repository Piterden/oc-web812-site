<?php namespace DEfr\VueManager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDefrVuemanagerComponents2 extends Migration
{
    public function up()
    {
        Schema::table('defr_vuemanager_components', function($table)
        {
            $table->text('file')->nullable();
            $table->dropColumn('filename');
        });
    }
    
    public function down()
    {
        Schema::table('defr_vuemanager_components', function($table)
        {
            $table->dropColumn('file');
            $table->string('filename', 255);
        });
    }
}
