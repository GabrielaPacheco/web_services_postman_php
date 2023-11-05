<?php

header('Content-Type: application/json'); //Que viene una parte de formato json por eso se agrega

require_once("../config/conexion.php");
require_once("../models/Categoria.php");

$body = json_decode(file_get_contents("php://input"), true); //Que viene un json por eso se agrega.

$categoria = new Categoria();

switch ($_GET["op"]) {
    case "GetAll":
        $datos = $categoria->get_categoria();
        echo json_encode($datos); //Para que la informacion se convierta en json
        break;
    case "GetId":
        $datos = $categoria->get_categoria_id($body["id"]);
        echo json_encode($datos);
        break;
    case "Insert":
        $datos = $categoria->insertar_categoria($body["nombre"], $body["observacion"]);
        echo json_encode("Insert Correcto");
        break;
    case "Update":
        $datos = $categoria->update_categoria($body["id"], $body["nombre"], $body["observacion"]);
        echo json_encode("Update Correcto");
        break;

    case "Delete":
        $datos = $categoria->delete_categoria($body["id"]);
        echo json_encode("Delete Correcto");
        break;
}
