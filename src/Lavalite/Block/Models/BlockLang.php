<?php namespace Lavalite\Block\Models;

use Eloquent;

class BlockLang extends  Eloquent
{
    protected $softDelete	= false;
    protected $fillable		= ['heading', 'content','lang'];
    protected $table		= 'block_langs';
    public $timestamps 		= false;
}
