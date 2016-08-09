<?php namespace DEfr\VueManager\Models;

use Model;
use DEfr\VueManager\Models\File;

/**
 * Model
 */
class Component extends Model
{
    use \October\Rain\Database\Traits\Purgeable;
    /*
     * Validation
     */
    use \October\Rain\Database\Traits\Validation;
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table       = 'defr_vuemanager_components';
    protected $fillable = ['name', 'file', 'template', 'template_lang', 'style', 'style_lang', 'style_scoped'];
    // protected $guarded  = ['id'];
    // protected $jsonable = ['file'];
    public $timestamps  = false;
    public $attachOne   = ['file_id' => [ 'DEfr\VueManager\Models\File', true ]];
    protected $purgeable = ['compiled'];

    /**
     * Accessor
     * @return string Raw content of file
     */
    public function getCompiledAttribute()
    {
        // $this
    }

    // public function setCompiledAttribute($value = '')
    // {
    //     if ($value == '' || !$this->file instanceof File)
    //     {
    //         return;
    //     }

    //     $this->file->setDataAttribute($value);
    // }

    // public function setFileAttribute($value = '')
    // {
    //     // $this->attributes['filecontent'] = $this->file->getContents();
    // }

}
