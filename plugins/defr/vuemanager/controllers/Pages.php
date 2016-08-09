<?php namespace DEfr\VueManager\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Pages extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController'];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('DEfr.VueManager', 'vuemanager', 'vue-pages');
    }

    // public function registerFormWidgets()
    // {

    // }
}
