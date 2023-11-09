<?php

use PDO;

class Room
{
    public static function all()
    {
        global $conn;
        $sql = "SELECT rooms.*, categories.name AS tendm FROM rooms
        JOIN categories ON rooms.categories_id = categories.id";
        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $items = $stmt->fetchAll();
        return $items;
    }


    public static function find($id)
    {
        global $conn;
        $sql = "SELECT * FROM `rooms` WHERE id = $id";
        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $items = $stmt->fetch();
        return $items;
    }
    public static function store($data)
    {
        global $conn;
        $room_number = $data['room_number'];
        $price = $data['price'];
        $categories_id = $data['categories_id'];
        $is_available = $data['is_available'];
        $sql = "INSERT INTO rooms (room_number, price, categories_id, is_available) 
            VALUES ('$room_number', '$price', '$categories_id', '$is_available')";
        // Thực hiện truy vấn
        $conn->exec($sql);
        return true;
    }

    public static function create()
    {
        global $conn;

        $sql = "SELECT rooms.*, categories.name AS tendm FROM rooms
            JOIN categories ON rooms.categories_id = categories.id";

        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $items = $stmt->fetchAll();

        return $items;
        
    }
    public static function update($id, $data)
    {
        global $conn;
        $room_number = $data['room_number'];
        $price = $data['price'];
        $categories_id = $data['categories_id'];
        $is_available = $data['is_available'];
        $sql = "UPDATE `rooms` SET `room_number` = '$room_number', `price` = '$price', `categories_id` = '$categories_id', `is_available` = '$is_available' WHERE `id` = $id";
        // Thực hiện truy vấn
        $conn->exec($sql);
        return true;
    }


    public static function delete($id)
    {
        global $conn;
        $sql = "DELETE FROM `rooms` WHERE `id` = $id";
        // Thuc thi SQL
        $conn->exec($sql);
        return true;
    }
}
