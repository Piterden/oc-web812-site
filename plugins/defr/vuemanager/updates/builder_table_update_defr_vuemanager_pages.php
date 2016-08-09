<?php namespace DEfr\VueManager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDefrVuemanagerPages extends Migration
{
    public function up()
    {
        Schema::table('defr_vuemanager_pages', function($table)
        {
            $table->string('style_lang', 31)->nullable()->default('css');
            $table->boolean('style_scoped')->default(0);
            $table->string('template_lang', 31)->nullable()->default('html');
        });
    }
    
    public function down()
    {
        Schema::table('defr_vuemanager_pages', function($table)
        {
            $table->dropColumn('style_lang');
            $table->dropColumn('style_scoped');
            $table->dropColumn('template_lang');
        });
    }
}
