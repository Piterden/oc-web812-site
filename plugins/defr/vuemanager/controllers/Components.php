<?php namespace DEfr\VueManager\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Twig;
use File;
use Storage;

use Clockwork\Support\Laravel\Facade as Clockwork;

class Components extends Controller
{
    public $implement = ['Backend\Behaviors\ListController', 'Backend\Behaviors\FormController'];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    protected $vueRaw;

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('DEfr.VueManager', 'vuemanager', 'vue-components');
    }


    public function formBeforeSave($model)
    {
        $fullPath = dirname(__dir__).'/partials/vue_component';
        $this->vueRaw = $this->compileVueFile($fullPath, $model->toArray());

        if ($this->file instanceof File) {
            $this->file->setDataAttribute($this->vueRaw);
            $this->file->put($this->file->getLocalPath(), $this->file->getDiskPath());
            Clockwork::info($this->file);
            return;
        }

        Clockwork::info($model);


        // $this->file = Storage::disk('local')->put('file.txt', $this->getVueRaw());
        return ;
    }

    public function formAfterSave($model)
    {

    }

    public function compileVueFile($path = 'vue_component', $props)
    {
        $partial = $this->makePartial($path);
        return Twig::parse($partial, $props);
    }

    public function getVueRaw()
    {
        return $this->vueRaw;
    }
}
