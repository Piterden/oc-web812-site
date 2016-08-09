<?php namespace DEfr\VueManager\Models;

use Model;
use System\Classes\SettingsManager;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'defr_vuemanager_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';

    /**
     * [__construct description]
     */
    public function __construct()
    {
        parent::__construct();

        SettingsManager::setContext('DEfr.VueManager', 'settings');
    }
}
