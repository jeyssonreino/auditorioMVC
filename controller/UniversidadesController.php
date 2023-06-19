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

    public function store($id, $nombre, $ciudad, $salones)
    {

        $data = $this->post->guardar($id, $nombre, $ciudad, $salones);
        return $data;

    }

    public function delete($id)
    {      
        $data = $this->post->eliminar($id);
        return $data;  

        if ($data) {
            header('Location:../index.php');
            exit;
        } else {
            echo "No se pudo eliminar registro";
        }
    }


    public function update()
    {

        echo "Esta es la acción update()";
    }
    
}