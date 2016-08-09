<?php
namespace DEfr\VueManager\Models;

use October\Rain\Database\Model;
// use Clockwork\Support\Laravel\Facade as Clockwork;

/**
 * Model
 */
class Javascript extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Validation
     */
    public $rules = [
    ];

    /**
     * [$table description]
     * @var string
     */
    protected $table = 'defr_vuemanager_javascripts';
    protected $fillable = ['file','filecontent'];
    protected $guarded = ['filecontent'];
    public $timestamps = false;
    public $attachOne = ['file' => ['DEfr\VueManager\Models\File']];

    /**
     * Accessor filecontent
     * @return string   Raw content of file
     */
    public function getFilecontentAttribute()
    {
        if ($this->file instanceof DEfr\VueManager\Models\File) {
            return $this->file->getContents();
        }
        return '';
    }

    public function setFilecontentAttribute($value = '')
    {
        if ($value == '') return;

        $this->file->setDataAttribute($value);

        // $this->attributes['filecontent'] = null;
    }

    public function setFileAttribute($value = '')
    {
        $this->attributes['filecontent'] = $this->file->getContents();
    }

}
