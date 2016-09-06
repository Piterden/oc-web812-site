<?php namespace Backend\Skins;

use File;
use Backend\Classes\Skin;
use October\Rain\Router\Helper as RouterHelper;

/**
 * Standard skin information file.
 *
 * This skin uses the default paths always, there is no lookup required.
 *
 * @package october\backend
 * @author Alexey Bobkov, Samuel Georges
 */

class Simple extends Skin{

	public function __construct(){
		$this->skinPath = $this->defaultSkinPath = base_path() . '/modules/backend/skins/simple';
		$this->publicSkinPath = $this->defaultPublicSkinPath = File::localToPublic($this->skinPath);
	}

	public function skinDetails(){
		return [
		'name' => 'Default Skin'
		];
	}

	public function getPath($path = null, $isPublic = false){
		$path = RouterHelper::normalizeUrl($path);

		return $isPublic
		? $this->defaultPublicSkinPath . $path
		: $this->defaultSkinPath . $path;
	}

	public function getLayoutPaths(){
		return [$this->skinPath.'/layouts'];
	}
}
