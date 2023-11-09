<?php

namespace model;

use PDO;

class Service
{
    public static function paginate()
    {
        global $conn;
        global $record_per_page;
        $record_per_page = 5;
        $current_page = isset($_GET['page'])?$_GET['page']:1;
        $offset = ($current_page - 1) * $record_per_page;
        $sql = "SELECT * FROM services";
        $sql_count = "SELECT COUNT(ID) as total FROM services";
        $stmt_count = $conn->query($sql_count);
        $stmt_count->setFetchMode(PDO::FETCH_ASSOC);
        $row_count = $stmt_count->fetch();
        $total_records = $row_count['total'];
        $total_pages = ceil($total_records / $record_per_page);
        $sql .=" LIMIT $record_per_page OFFSET $offset";
        $mysql = $conn->query($sql);
        $mysql->setFetchMode(PDO :: FETCH_ASSOC);
        $rows = $mysql->fetchAll();
        $return = [
            'rows' => $rows,
            'total_pages' => $total_pages,
        ];
        return $return;
    }
    public static function all()
    {
        global $conn;
        $sql = "SELECT * FROM `services`";
        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $items = $stmt->fetchAll();
        return $items;
    }
    public static function find($id)
    {
        global $conn;
        $sql = "SELECT * FROM `services` WHERE id = $id";
        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $items = $stmt->fetch();
        return $items;
    }
    public static function store($data)
    {
        global $conn;
        $name_services = $data['name_services'];
        $price = $data['price'];
        $sql = "INSERT INTO `services` 
            ( `name_services`, `price`) 
            VALUES 
            ('$name_services','$price')";
        //Thuc hien truy van
        $conn->exec($sql);
        return true;
    }

    public static function create()
    {
        global $conn;
        $sql = "SELECT * FROM `services`";
        $stmt = $conn->query($sql);
        $items = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $items;
    }
    public static function update($id, $data)
    {
        global $conn;
        $name_services = $data['name_services'];
        $price = $data['price'];
        $sql = "UPDATE `services` SET `name_services` = '$name_services', `price` = '$price', WHERE `id` = $id";
        // Thực hiện truy vấn
        $conn->exec($sql);
        print_r($sql);
        return true;
    }


    public static function delete($id)
    {
        global $conn;
        $sql = "DELETE FROM `services` WHERE `id` = $id";
        // Thuc thi SQL
        $conn->exec($sql);
        return true;
    }
}