<?php
/* Verificamos que los datos requeridos no esten indefinidos */
if (
    isset($_POST['id_cuestionario']) && isset($_POST['id_Pregunta'])
    && isset($_POST['respuesta']) && isset($_POST['alumno'])
) {
    /* Incluimos la conexion */
    require_once '../conexion.php';
    /* Variables recibidas */
    $id_Cuestionario = $_POST['id_cuestionario'];
    $id_Pregunta = $_POST['id_Pregunta'];
    $respuesta = $_POST['respuesta'];
    $alumno = $_POST['alumno'];
    $valorPregunta = 0;
    //buscamos el puntaje de la pregunta
    $sql = "SELECT puntos FROM tbl_preguntas WHERE pregunta_id = {$id_Pregunta} LIMIT 1";
    $query = mysqli_query($conexion, $sql);
    if($row = mysqli_fetch_array($query)) {
        $valorPregunta = $row['puntos'];
    }

    //buscamos la respuesta correcta en la tabla tbl_checkbox_docente
    $sql = "SELECT Respuesta FROM tbl_checkbox_docente WHERE Id_Cuestionario = {$id_Cuestionario} AND Id_Pregunta = {$id_Pregunta} LIMIT 1;";
    $query = mysqli_query($conexion, $sql);
    if($row = mysqli_fetch_array($query)) {
        $respuestaCorrecta = $row['Respuesta'];
        /* Obtenemos la fecha actual */
        date_default_timezone_set('America/Mexico_City');
        $fechaActual = date('y/m/d');
        if ($respuesta != "") {
            $puntos = ($respuesta == $respuestaCorrecta) ? $valorPregunta : 0;
            //buscamos si ya existe el puntaje
            $sql = "SELECT * FROM puntajes WHERE Nombre_Alumno = '{$alumno}' AND Id_Cuestionario = {$id_Cuestionario} LIMIT 1;";
            $query = mysqli_query($conexion, $sql);
            if($row = mysqli_fetch_array($query)) {
                $Id_Puntaje = $row['Id_Puntaje'];
                $puntosOld = $row['puntaje_total'];
                $puntosNew = $row['puntaje_total'] + $puntos;
                $sql ="UPDATE puntajes SET puntaje_total ={$puntosNew} WHERE Id_Puntaje = {$Id_Puntaje}";
                $conexion->query($sql);
            }else{
                $sql = "INSERT INTO puntajes (Nombre_Alumno, Id_Cuestionario, puntaje_total)
                VALUES ('$alumno', '$id_Cuestionario', '$puntos');";
                $conexion->query($sql);
            }

            /* Query */
            $sql = "INSERT INTO tbl_checkbox (Id_Cuestionario, Id_Pregunta, Respuesta, alumno, Fecha)
                VALUES ('$id_Cuestionario', '$id_Pregunta', '$respuesta', '$alumno', '$fechaActual');";
            if ($conexion->query($sql) === TRUE) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo "No se ha recibido una respuesta";
        }
    }else{
        echo "No se encontro la pregunta";
    }
    
} else {
    echo "No se han recibido datos";
}
