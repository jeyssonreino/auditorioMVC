<?php


require_once __DIR__ . '/../models/UniversidadesModel.php';



class UniversidadesController
{

    private $post;


    public function __construct()
    {
        $this->post = new UniversidadesModel();
    }


    public function list()
    {      
        $data = $this->post->getAll();
        return $data;
    }

    public function listxID($id)
    {      
        $data = $this->post->getById($id);
        return $data;
    }

    public function store($id, $nombre, $ciudad, $salones)
    {

        $data = $this->post->guardar($id, $nombre, $ciudad, $salones);
        return $data;

    }

    public function delete($id)
    {      
        $data = $this->post->eliminar($id);
        return $data;  
    }


    public function update($id, $nombre, $ciudad, $salones)
    {
        $data = $this->post->actualizar($id, $nombre, $ciudad, $salones);
        return $data;         
    }
    
}