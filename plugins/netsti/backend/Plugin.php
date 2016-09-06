<?php namespace NetSTI\Backend;

use DB;
use Flash;
use Event;
use Backend;
use Redirect;
use System\Classes\PluginBase;
use NetSTI\Backend\Classes\Helper;
use Backend\Classes\Controller as BackendController;

class Plugin extends PluginBase{

	// SETTINGS
	public function registerSettings(){
		return [
			'security'           => [
				'label'       => 'Security',
				'description' => 'Ban IPs, manage backend and frontend https routing',
				'icon'        => 'icon-shield',
				'class'       => 'NetSTI\Backend\Models\Security',
				'order'       => 103,
				'keywords'    => 'security https backend frontend'
			]
		];
	}
	public function boot(){
		Event::listen('backend.menu.extendItems', function($manager) {

			$manager->addMainMenuItems('October.Backend', [
				'dashboard' => [
					'icon'        => 'icon-rocket',
				]
			]);

			$manager->addSideMenuItems('RainLab.User', 'user', [
                'adduser' => [
                    'label' => 'rainlab.user::lang.users.new_user',
                    'icon' => 'icon-user-plus',
                    'url' => Backend::url('rainlab/user/users/create')
                ],
                'users' => [
                    'label' => 'rainlab.user::lang.users.menu_label',
                    'icon' => 'icon-user',
                    'url' => Backend::url('rainlab/user/users')
                ],
                'usersgroup' => [
                    'label' => 'rainlab.user::lang.groups.menu_label',
                    'icon' => 'icon-users',
                    'url' => Backend::url('rainlab/user/usergroups')
                ],
            ]);
		});

		$theme_path = base_path() . '/modules/backend/skins';
		$this_path  = plugins_path() . '/netsti/backend/skin';
		$cms_config = base_path() . '/config/cms.php';
		$coreBuild  = json_decode(DB::table('system_parameters')
			->where('namespace', 'system')
			->where('group', 'core')
			->where('item', 'build')
			->first()->value);

		if(!Helper::checkTheme($theme_path)){
			Helper::copy($this_path, $theme_path);

			if($coreBuild >= 346){
				Helper::patchFile($cms_config);
				Flash::success('The theme was installed!');
				Redirect::refresh();
			}else{
				BackendController::extend(function($controller){
					$controller->addCss('/plugins/netsti/backend/assets/css/font.css');
					$controller->addCss('/plugins/netsti/backend/assets/css/theme.css');
					$controller->addJs('/plugins/netsti/backend/assets/js/theme.js');
				});
			}
		}
	}
}
