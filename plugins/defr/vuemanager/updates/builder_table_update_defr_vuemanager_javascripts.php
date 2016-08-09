<?php namespace DEfr\VueManager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDefrVuemanagerJavascripts extends Migration
{
    public function up()
    {
        Schema::table('defr_vuemanager_javascripts', function($table)
        {
            $table->text('content')->nullable();
            $table->string('content_type', 255)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('defr_vuemanager_javascripts', function($table)
        {
            $table->dropColumn('content');
            $table->string('content_type', 255)->default('js')->change();
        });
    }
}
