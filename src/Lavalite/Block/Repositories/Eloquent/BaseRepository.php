<?php namespace Lavalite\Block\Repositories\Eloquent;

use Lavalite\Block\Interfaces\BaseInterface;

abstract class BaseRepository implements BaseInterface
{
    /**
     * @var Model
     */
    protected $model;

    public function all()
    {
        return $this->model->all();
    }

    public function create($create_array)
    {
        return $this->model->create($create_array);
    }

    public function update($id, $data)
    {
        $row = $this->model->find($id);

        return $row->update($data);
    }


    public function save()
    {
        return ($this->model->save());
    }

    public function find($id)
    {
        return $this->model
                    ->find($id);
    }

    public function first($field, $value)
    {
        return $this->model
                    ->where($field, $value)
                    ->first();
    }

    public function orderBy($field, $order)
    {
        return $this->model
                    ->orderBy($field, $order)
                    ->get();
    }

    public function orderByAndPaginate($field, $order, $per_page)
    {
        return $this->model
                    ->orderBy($field, $order)
                    ->paginate($per_page);
    }

    public function paginate($per_page)
    {
        return $this->model->paginate($per_page);
    }

    public function updateField($id, $field, $value)
    {
        $row    = $this->model
                    ->whereId($id)
                    ->first();
        $row -> $field     = $value;

        return $row -> save();
    }

    public function delete($id)
    {
        $this->model->find($id)->delete();
    }

    public function instance($data = array())
    {
        return new $this->model($data);
    }

    /**
     * returns the current Model to Manager
     *
     * @return object
     */
    private function getModel()
    {
        return $this->model;
    }

    public function getErrors()
    {
        return $this -> model -> getErrors();

    }
}
