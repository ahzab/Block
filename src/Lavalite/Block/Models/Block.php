<?php namespace Lavalite\Block\Models;

use Str;
use Config;
use Lavalite\Filer\FilerTrait;
use Dimsav\Translatable\Translatable;

class Block extends Model
{
    use FilerTrait;
    use Translatable;


    protected $table        = 'blocks';

    protected $module       = 'block';

    protected $package      = 'block';

    public static $rules    = array(
       
    );

    /**
     * Array with the fields translated in the Translation table
     *
     * @var array
     */
    public $translatedAttributes =  array('heading','content');

    /**
     * Set $translationModel if you want to overwrite the convention
     * for the name of the translation Model. Use full namespace if applied.
     */
    public $translationModel = 'Lavalite\Block\Models\BlockLang';

    /**
     * This is the foreign key used to define the translation relationship.
     * Set this if you want to overwrite the laravel default for foreign keys.
     *
     * @var
     */
    public $translationForeignKey   = 'block_id';

    /**
     * Add your translated attributes here if you want
     * fill them with mass assignment
     *
     * @var array
     */

    protected $fillable = ['category', 'name', 'heading', 'content', 'icon', 'status','created_by'];

    /**
     * The database field being used to define the locale parameter in the translation model.
     * Defaults to 'locale'
     *
     * @var string
     */
    public $localeKey           = 'lang';

    protected $uploads          = array(
                                        'single'    => array('image'),
                                       
                                        );

     protected $keepRevisionOf = ['heading','content'];

   /**
     * Listen for save and updating event
     *
     * @return void
     */

   


    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {

            if(!empty($model->id)) $model->upload();
            //$model->slug = !empty($model->slug) ? Str::slug($model->slug) : $model->getUniqueSlug($model->name);
            return $model->validate();
        });

    }

    private function getPackage()
    {
        return $this->package;
    }


}
