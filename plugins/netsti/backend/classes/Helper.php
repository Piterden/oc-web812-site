<?php namespace NetSTI\Backend\Classes;

class Helper{
	static function copy($source, $target) {
		if (!is_dir($source)) {//it is a file, do a normal copy
			copy($source, $target);
			return;
		}

		//it is a folder, copy its files & sub-folders
		@mkdir($target);
		$d = dir($source);
		$navFolders = array('.', '..');
		while (false !== ($fileEntry=$d->read() )) {
			//copy one by one
			//skip if it is navigation folder . or ..
			if (in_array($fileEntry, $navFolders) ) {
				continue;
			}

			//do copy
			$s = "$source/$fileEntry";
			$t = "$target/$fileEntry";
			self::copy($s, $t);
		}
		$d->close();
	}

	static function checkTheme($theme_path){
		if (!file_exists($theme_path.'/Simple.php'))
			return;
		if (!file_exists($theme_path.'/simple'))
			return;
		return true;
	}

	static function patchFile($file_path){
		copy($file_path, $file_path.'.bak');

		$lookfor = 'Backend\Skins\Standard';
		$newtext = 'Backend\Skins\Simple';

		$file_contents = file_get_contents($file_path);
		$file_contents = str_replace($lookfor, $newtext, $file_contents);
		file_put_contents($file_path,$file_contents);
	}
}

?>