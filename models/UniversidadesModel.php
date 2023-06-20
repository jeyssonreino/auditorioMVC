<?php


class UniversidadesModel
{


    public function __construct()
    {
    }

    public function getAll()
    {
        include 'config/DB.php';
        $sql = "SELECT u.id, u.nombre AS universidadNombre, c.nombre AS ciudadNombre, u.salones FROM universidades u INNER JOIN ciudad c ON u.id = c.id;";
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

    }

    public function guardar($nombre, $ciudad, $salones)
    {
        include '../config/DB.php';
        $validar = "SELECT * FROM `universidades` WHERE `nombre` = '$nombre'";
        $existe = $con->query($validar);
        $cantidad = $existe->num_rows;
        if ($cantidad == 0) {
            $sql = "INSERT INTO `universidades`(`nombre`, `ciudad`, `salones`) VALUES ('$nombre','$ciudad','$salones')";
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

    public function getAllSalones()
    {
        include '../config/DB.php';
        $sql = "SELECT s.id AS id , s.numero AS numero ,s.facultad AS facultad,u.nombre AS universidad, f.nombre AS forma ,t.nombre AS tipo FROM salones s INNER JOIN universidades u ON s.id_universidad = u.id INNER JOIN tipo_salon t ON s.id_tipo_salon = t.id INNER JOIN forma_salon f ON s.id_forma_salon = f.id ORDER BY s.id;";
        $resultado = mysqli_query($con, $sql);
        $con->close();
        return $resultado;

    }

    public function getAllUniversidades()
    {
        include '../config/DB.php';
        $sql = "SELECT * FROM universidades";
        $resultado = mysqli_query($con, $sql);
        $con->close();
        return $resultado;

    }

    public function getAllFormaSalon()
    {
        include '../config/DB.php';
        $sql = "SELECT * FROM forma_salon";
        $resultado = mysqli_query($con, $sql);
        $con->close();
        return $resultado;

    }

    public function guardarSalon($numero, $facultad, $universidad,$forma,$tipo)
    {
        include '../config/DB.php';
        $validar = "SELECT * FROM `salones` WHERE `facultad` = '$facultad' AND `id_universidad` = '$universidad' AND `id_forma_salon` = '$forma' AND `id_tipo_salon`= '$tipo' ";
        $existe = $con->query($validar);
        $cantidad = $existe->num_rows;
        if ($cantidad == 0) {
            $sql = "INSERT INTO `salones`(`numero`, `facultad`, `id_forma_salon`,`id_tipo_salon`, `id_universidad`) VALUES ('$numero','$facultad','$forma','$tipo', '$universidad')";
            $query = $con->query($sql);
            if ($query) {
                echo "<script>swal('¡Salon registrado exitosamente!')</script>";
            } else {
                echo "<script>swal('¡Error al guardar el salon')</script>";
            }   
        } else {
            echo "<script>swal('¡El salon ya se encuentra registrado!')</script>";
        }
        $con->close();
    }

    public function eliminarSalon($id)
    {
        include '../config/DB.php';
        $sql = "DELETE FROM salones WHERE id = $id";
        mysqli_query($con, $sql);
        $con->close();
    }

    public function getByIdSalones($id)
    {
        include '../config/DB.php';
        $sql = "SELECT s.id AS id , s.numero AS numero ,s.facultad AS facultad,u.id AS id_Universidad ,u.nombre AS universidad,f.id AS id_forma , f.nombre AS forma ,t.id AS id_tipo,t.nombre AS tipo FROM salones s INNER JOIN universidades u ON s.id_universidad = u.id INNER JOIN tipo_salon t ON s.id_tipo_salon = t.id INNER JOIN forma_salon f ON s.id_forma_salon = f.id WHERE s.id = '$id'";
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

    }

    public function actualizarSalon($id, $numero, $facultad, $universidad,$forma,$tipo)
    {
        include '../config/DB.php';
        $sql = "UPDATE `salones` SET `id`='$id',`numero`='$numero',`facultad`='$facultad',`id_forma_salon`='$forma',`id_tipo_salon`='$tipo',`id_universidad`='$universidad' WHERE `id` = '$id'";
        $con->query($sql);
        if ($con) {
            echo "<script>swal('¡Universidad actualizada exitosamente!')</script>";
        } else {
            echo "<script>swal('¡Error al actualizar la universidad')</script>";
            $con->close();
        }
    }

    public function getAllCiudades()
    {
        include '../config/DB.php';
        $sql = "SELECT * FROM ciudad";
        $resultado = mysqli_query($con, $sql);
        $con->close();
        return $resultado;

    }
}
