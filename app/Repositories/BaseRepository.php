<?php
<<<<<<< HEAD

namespace App\Repositories;
=======
namespace App\Repositories; 
>>>>>>> 8748870e1619eb3e24cc4624312f0439068a5ded

use App\Repositories\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

<<<<<<< HEAD
    public function setModel()
    {
=======
    public function setModel(){
>>>>>>> 8748870e1619eb3e24cc4624312f0439068a5ded
        $this->model = app()->make($this->getModel());
    }

    abstract public function getModel();

<<<<<<< HEAD
    public function getAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function update($id, $attributes = [])
    {
        $result = $this->model->find($id);
        if ($result) {
            return $result->update($attributes);
=======
    public function getAll(){
        return $this->model->all();
    }

    public function find($id){
        return $this->model->find($id);
    }

    public function create($attributes=[]){
        return $this->model->create($attributes);
    }

    public function update($id, $attributes = []){
        $result = $this->model->find($id);
        if ($result){
            return $result->update($id, $attributes);
>>>>>>> 8748870e1619eb3e24cc4624312f0439068a5ded
        }

        return false;
    }

<<<<<<< HEAD
    public function delete($id)
    {
        $result = $this->model->find($id);
        if ($result) {
=======
    public function delete($id){
        $result = $this->model->find($id);
        if ($result){
>>>>>>> 8748870e1619eb3e24cc4624312f0439068a5ded
            return $result->delete();
        }

        return false;
    }
<<<<<<< HEAD
}
=======

}
>>>>>>> 8748870e1619eb3e24cc4624312f0439068a5ded
