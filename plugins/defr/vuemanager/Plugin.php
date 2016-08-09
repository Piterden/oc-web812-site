<?php
namespace DEfr\VueManager;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    /**
     * [pluginDetails description]
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Vue Manager',
            'description' => 'adds vue support',
            'author'      => 'Denis Efremov',
            'icon'        => 'icon-rebel',
        ];
    }

    // public function register()
    // {
    // }

    // public function boot()
    // {
    //     Event::listen('vuemanager.*', 'Classes\VueManagerHandler');
    // }

    public function registerSettings()
    {
        return ['settings' => [
            'label'       => 'Vue Settings',
            'description' => 'Manage VueJS settings.',
            'category'    => 'system::lang.system.categories.misc',
            'icon'        => 'icon-ra',
            'class'       => 'DEfr\VueManager\Models\Settings',
            'order'       => 500,
            'keywords'    => 'vuejs manager opa',
        ]];
    }

    public function registerComponents()
    {
        return [
            'DEfr\VueManager\Components\Console' => 'console',
        ];
    }
}
