<?php namespace Lavalite\Block\Controllers;

use App;
use Lang;
use Input;
use Former;
use Sentry;
use Config;
use Session;
use Redirect;

class BlockAdminController extends \AdminController
{

    /**
     * Model instance.
     *
     * @var \Blocks\Model\Blocks
     */
    protected $model;

    protected $package      = 'block' ;

    protected $module       = 'block';

    public function __construct(\Lavalite\Block\Interfaces\BlockInterface $block)
    {
        $this->model 	= $block;
        parent::__construct();
    }

    protected function hasAccess($permission = 'view')
    {
        if(!Sentry::getUser()->hasAccess('block::block.permissions.admin.'.$permission))
            App::abort(401, Lang::get('messages.error.auth'));

        return true;
    }

    protected function permissions()
    {
        $p				= array();
        $permissions 	= Config::get('block::block.permissions.admin');
        foreach ($permissions as $key => $value) {
            $p[$value]	= Sentry::getUser()->hasAnyAccess(array('block.block.'.$value));
        }

        return $p;
    }

    public function index()
    {

        $data['q']					= Input::get('q');
        $this->hasAccess('view');
        $data['blocks']			    = $this->model->paginate(15);
        $data['permissions']		= $this->permissions();
        $this->theme->prependTitle(Lang::get('block::block.names') . ' :: ');

        return $this->theme->of('block::block.admin.index', $data)->render();
    }

    public function show($id)
    {
        $this->hasAccess('view');
        $data['block']		= $this->model->find($id);
        $data['permissions']	= $this->permissions();

        $this->theme->prependTitle(Lang::get('app.view') . ' ' . Lang::get('block::block.names') . ' :: ');

        return $this->theme->of('block::block.admin.show', $data)->render();
    }

    public function create()
    {
        $this->hasAccess('create');
        $data['block']		= $this->model->instance();
        $data['user_id']    = Sentry::getUser()->id;
        $this->theme->prependTitle(Lang::get('app.new') . ' ' . Lang::get('block::block.names') . ' :: ');

        return $this->theme->of('block::block.admin.create', $data)->render();
    }

    public function store()
    {

        $this->hasAccess('create');
        $row = $this->model->instance();
        if ($this->model->create(Input::all())) {
            Session::flash('success',  Lang::get('messages.success.create', array('Module' => Lang::get('block::block.names'))));

            return Redirect::to('/admin/block/block');

        } else {
            Former::withErrors($this->model->getErrors());
            Former::populate(Input::all());
            $data['block']	    = $this->model->instance();
            $this->theme->prependTitle(Lang::get('app.new') . ' ' . Lang::get('block::block.names') . ' :: ');

            return $this->theme->of('block::block.admin.create', $data)->render();
        }

    }

    public function edit($id)
    {

        $this->hasAccess('edit');
        Session::put('block_id',$id);
        $data['block']		= $this->model->find($id);

        Former::populate($data['block']);
        $this->theme->prependTitle(Lang::get('app.edit') . ' ' . Lang::get('block::block.names') . ' :: ');

        return $this->theme->of('block::block.admin.edit', $data)->render();
    }

    public function update($id)
    {
        $this->hasAccess('edit');
        if ($this->model->update($id, Input::all())) {
            Session::flash('success',  Lang::get('messages.success.update', array('Module' => Lang::get('block::block.names'))));

            return Redirect::to('/admin/block/block');

        } else {

            Former::withErrors($this->model->getErrors());
            Former::populate(Input::all());
            $data['block']		= $this->model->find($id);
            $data['image']          = $this->imageArray(array('id' => $id));

            return $this->theme->of('block::block.admin.edit', $data)->render();
        }

    }

    public function destroy($id)
    {
        $this->hasAccess('delete');
        $this->model->delete($id);
        Session::flash('success', Lang::get('messages.success.delete', array('Module' => Lang::get('block::block.names'))));

        return Redirect::to('/admin/block/block');

    }


    

}
