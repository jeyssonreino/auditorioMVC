<?php


class UniversidadesModel
{


    public function __construct()
    {
    }

    public function getAll()
    {
        include 'config/DB.php';
        $sql = "SELECT * FROM universidades";
        $resultado = mysqli_query($con, $sql);
        $con->close();
        return $resultado;
    }

    public function getById($id)
    {
    }

    public function guardar($id, $nombre, $ciudad, $salones)
    {
        include '../config/DB.php';
        $validar = "SELECT * FROM `universidades` WHERE `id` = '$id'";
        $existe = $con->query($validar);
        $cantidad = $existe->num_rows;
        if ($cantidad == 0) {
            $sql = "INSERT INTO `universidades`(`id`, `nombre`, `ciudad`, `salones`) VALUES ('$id','$nombre','$ciudad','$salones')";
            $query = $con->query($sql);
            if ($query) {
                echo "<script>swal('¡Universidad guardada exitosamente!')</script>";
            } else {
                echo "<script>swal('¡Error al guardar la universidad')</script>";
            }
        } else {
            echo "<script>swal('¡La universidad ya se encuentra registrado!')</script>";
        }
        $con->close();
    }


    public function eliminar($id)
    {
        include 'config/DB.php';
        $sql = "DELETE FROM universidades WHERE id = $id";
        mysqli_query($con, $sql);
        $con->close();

    }

    
    public function actualizar($id, $nombre, $ciudad)
    {
    }
}
