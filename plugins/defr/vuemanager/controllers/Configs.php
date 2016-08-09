<?php
namespace DEfr\VueManager\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Symfony\Component\HttpFoundation\StreamedResponse;

class Configs extends Controller
{
    protected $shPrefix = '';

    public $implement = [];

    public function __construct()
    {
        parent::__construct();
        $this->shPrefix = 'cd '.__dir__.' && ';
        BackendMenu::setContext('DEfr.VueManager', 'vuemanager', 'vue-configs');
    }

    public function index()
    {
        $this->vars['webpack']     = file_get_contents(dirname(__dir__).'/webpack.config.js');
        $this->vars['gulpfile']    = file_get_contents(dirname(__dir__).'/gulpfile.js');
        $this->vars['packageJson'] = file_get_contents(dirname(__dir__).'/package.json');
    }

    public function onNpmList()
    {
        $this->vars['prefix'] = $this->shPrefix;
        $this->vars['str'] = new StreamedResponse(function() {
          $cmd = $prefix . 'pwd';
          $proc = popen($cmd, 'r');
          echo '<pre>';
          while (!feof($proc))
          {
              echo fread($proc, 4096);
              @ flush();
          }
          echo '</pre>';
          return $proc;
        }, 200);
    }

    public function onNpmInstall()
    {
        $this->vars['stdout'] = shell_exec($this->shPrefix.'npm install');
    }

    public function onNpmRunDev()
    {
        $this->vars['stdout'] = shell_exec($this->shPrefix.'npm run dev');
    }

    public function onWebpackSave()
    {
        }

    public function onGulpfileSave()
    {
        }

    public function onPackageJsonSave()
    {
        }

}
