<?php
namespace DEfr\VueManager\Components;

class Console extends \Cms\Classes\ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Console',
            'description' => 'Displays a console.',
        ];
    }

    public function defineProperties()
    {
        return [
            'command' => [
                'title'       => 'Command',
                'type'        => 'text',
                'default'     => '',
                'placeholder' => 'Enter command',
            ],
        ];
    }

    // This array becomes available on the page as {{ component.posts }}
    public function stdout()
    {
        return shell_exec($this->shPrefix.'npm list');
    }

}
