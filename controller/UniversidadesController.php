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

    public function store($nombre, $ciudad, $salones)
    {

        $data = $this->post->guardar($nombre, $ciudad, $salones);
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

    
    public function listSalones()
    {      
        $data = $this->post->getAllSalones();
        return $data;
    }

    public function listUniversidades()
    {      
        $data = $this->post->getAllUniversidades();
        return $data;
    }

    public function listFormaSalon()
    {      
        $data = $this->post->getAllFormaSalon();
        return $data;
    }

    public function SaveSalon($numero, $facultad, $universidad,$forma,$tipo)
    {      
        $data = $this->post->guardarSalon($numero, $facultad, $universidad,$forma,$tipo);
        return $data;
    }

    public function deleteSalon($id)
    {      
        $data = $this->post->eliminarSalon($id);
        return $data;  
    }

    public function listxIDSalones($id)
    {      
        $data = $this->post->getByIdSalones($id);
        return $data;
    }

    public function updateSalon($id, $numero, $facultad, $universidad,$forma,$tipo)
    {
        $data = $this->post->actualizarSalon($id, $numero, $facultad, $universidad,$forma,$tipo);
        return $data;         
    }

    public function listaCiudades()
    {      
        $data = $this->post->getAllCiudades();
        return $data;
    }
    
}