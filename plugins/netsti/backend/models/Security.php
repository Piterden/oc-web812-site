<?php namespace NetSTI\Backend\Models;

use Cms\Classes\Page;
use October\Rain\Database\Model as BaseModel;

class Security extends BaseModel{

	public $implement = ['System.Behaviors.SettingsModel'];
	public $settingsCode = 'netsti_system_security';
	public $settingsFields = 'fields.yaml';

	public function getBannedPageOptions(){
		return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
	} 
}