<?php namespace DEfr\VueManager\Models;

// use Model;
use October\Rain\Database\Attach\File as FileBase;

/**
 * Model
 */
class File extends FileBase
{
    /**
     * @var string The database table used by the model.
     */
    protected $table = 'defr_vuemanager_files';
    public $contentType = 'text/javascript';

    /**
     * @var array Mime types
     */
    protected $autoMimeTypes = [
        'js'  => 'text/javascript',
        'vue' => 'text/vue',
    ];

    /**
     * Define the public address for the storage path.
     */
    public function getPublicPath()
    {
        if ($this->isPublic()) {
            return '/';
        }
        else {
            return '/';
        }
    }

    /**
     * Returns the path to the file, relative to the storage disk.
     * @reutrn string
     */
    public function getDiskPath()
    {
        return $this->getStorageDirectory() . $this->disk_name;
    }

    public function getStoragePath()
    {
        return dirname(__dir__);
    }
}
