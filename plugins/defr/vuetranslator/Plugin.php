<?php
namespace DEfr\VueTranslator;

use Event;
use Backend;
use Cms\Classes\Page;
use Cms\Classes\Partial;
use System\Classes\PluginBase;

/**
 * VueTranslator Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'VueTranslator',
            'description' => 'Vue SPA Helper',
            'author'      => 'Denis Efremov',
            'icon'        => 'icon-leaf',
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {
        }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        Event::listen('cms.template.save', function ($ctrl, $template, $type)
        {
            if ($template instanceOf Page || $template instanceOf Partial) {
                $dirName   = $template->getObjectTypeDirName();
                $themePath = $template->theme->getPath().'/';
                $baseName  = $template->getBaseFileName();
                $fileName = $this->toCamelCase($baseName);

                if ($dirName == 'pages')
                {
                    $fileName .= 'Page.vue';
                }
                elseif ($dirName == 'partials')
                {
                    $fileName .= '.vue';
                }

                $vuePath = $themePath.'assets/'.$dirName.'/'.$fileName;
                file_put_contents($vuePath, $template->markup);
            }
        });
    }

    public function toCamelCase($baseName)
    {
        $camelCased = '';
        foreach (explode('_', $baseName) as $part)
        {
            $camelCased .= ucfirst($part);
        }
        return $camelCased;
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'DEfr\VueTranslator\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'defr.vuetranslator.some_permission' => [
                'tab'   => 'VueTranslator',
                'label' => 'Some permission',
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'vuetranslator' => [
                'label'       => 'VueTranslator',
                'url'         => Backend::url('defr/vuetranslator/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['defr.vuetranslator.*'],
                'order'       => 500,
            ],
        ];
    }

}
