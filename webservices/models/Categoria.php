<?php
class Categoria extends Conectar
{

    public function get_categoria()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM categoria WHERE estado = 1";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_categoria_id($id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM categoria WHERE estado=1 AND id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar_categoria($nombre, $observacion)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO categoria(id,nombre,observacion,estado) VALUES (NULL,?,?,'1');";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $observacion);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_categoria($id, $nombre, $observacion)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE categoria set
            nombre = ?,
            observacion = ?
            WHERE
            id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $observacion);
        $sql->bindValue(3, $id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_categoria($id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE categoria set
            estado = '0'
            WHERE
            id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
