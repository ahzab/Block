<?php namespace Lavalite\Block\Controllers;

use App;
use Lang;
use Input;
use Sentry;
use Config;

class PublicController extends \PublicController
{

    /**
     * block instance.
     *
     * @var \Blocks\block\Blocks
     */
    protected $block;


    public function __construct(\Lavalite\Block\Interfaces\BlockInterface $block)
    {
        $this->block      = $block;
        parent::__construct();
    }

    public function index()
    {

        $data['blocks']   =  $this->block->paginate(10);
        $data['image']    =  $this->imageArray();

        $this->theme->prependTitle(Lang::get('block::block.names') . ' :: ');
        return $this->theme->of('block::block.public.index',$data)->render();
    }


    

    public function show($slug)
    {
        $data['block'] 	= $this->block->findBySlug($slug);

        $this->theme->prependTitle(Lang::get('block::block.names') . ' :: ');

        return $this->theme->of('block::block.public.show', $data)->render();
    }

}
