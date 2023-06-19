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
        include '../config/DB.php';
        $sql = "SELECT * FROM universidades WHERE `id`= '$id' ";
        $resultado = mysqli_query($con, $sql);
        $can = $resultado->num_rows;
        if ($can == 1) {
            return $resultado;
        } else {
            echo "<div class='col-12' style='margin: 20px 0px 0px 20px;'>";
            echo "No registro con ID: " . $id . " No existe";
            echo "</div>";
            $con->close();
        }
        $con->close();
        $con->close();
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


    public function actualizar($id, $nombre, $ciudad, $salones)
    {
        include '../config/DB.php';
        $sql = "UPDATE `universidades` SET `id`='$id',`nombre`='$nombre',`ciudad`='$ciudad',`salones`='$salones' WHERE `id` = '$id'";
        $con->query($sql);
        if ($con) {
            echo "<script>swal('¡Universidad actualizada exitosamente!')</script>";
        } else {
            echo "<script>swal('¡Error al actualizar la universidad')</script>";
            $con->close();
        }
    }
}
