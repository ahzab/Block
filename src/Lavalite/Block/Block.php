<?php namespace Lavalite\Block;
use View;
use Config;
class Block
{

    protected $block;

    public function __construct(\Lavalite\Block\Interfaces\BlockInterface $block)
    {
        $this->block     = $block;
        
    }

    public function block($category){

    	$data['blocklist'] = $this->block->blocklist($category);
    	return View::make('block::block.public.blocklist.'.Config::get('block::block.view'), $data);
    }

}
