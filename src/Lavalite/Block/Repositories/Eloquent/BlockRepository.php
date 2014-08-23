<?php namespace Lavalite\Block\Repositories\Eloquent;

use Lavalite\Block\Interfaces\BlockInterface;

use App;
use Lang;

class BlockRepository extends BaseRepository implements BlockInterface
{
    public function __construct(\Lavalite\Block\Models\Block $block)
    {
        $this->model = $block;
    }

    public function blocklist($category = ''){

    	return $this->model->whereCategory($category)->whereStatus(1)->get(); 
    
    }


}
