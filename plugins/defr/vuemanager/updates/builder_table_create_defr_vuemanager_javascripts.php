<?php namespace DEfr\VueManager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDefrVuemanagerJavascripts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('defr_vuemanager_javascripts', function($table)
		{
			$table->increments('id');
			$table->string('disk_name');
			$table->string('file_name');
			$table->integer('file_size');
			$table->string('content_type');
			$table->string('title')->nullable();
			$table->text('description', 65535)->nullable();
			$table->string('field')->nullable()->index('system_files_field_index');
			$table->string('attachment_id')->nullable()->index('system_files_attachment_id_index');
			$table->string('attachment_type')->nullable()->index('system_files_attachment_type_index');
			$table->boolean('is_public')->default(1);
			$table->integer('sort_order')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('defr_vuemanager_javascripts');
	}

}
