<?php namespace DEfr\VueManager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDefrVuemanagerComponents3 extends Migration
{
    public function up()
    {
        Schema::table('defr_vuemanager_components', function($table)
        {
            $table->text('compiled')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('defr_vuemanager_components', function($table)
        {
            $table->dropColumn('compiled');
        });
    }
}
