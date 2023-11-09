<?php

use PDO;

class Order
{
    public static function all()
    {
        global $conn;
        $sql = "SELECT customers.ten, orders.order_date, orders.total_amount
        FROM `orders`
        JOIN `order_details` ON `order_details`.`orders_id` = `orders`.`id`
        JOIN `customers` ON `orders`.`customers_id` = `customers`.`id`";
        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $items = $stmt->fetchAll();
        return $items;
    }


    public static function find($id)
    {
        global $conn;
        $sql = "SELECT services.name_services,services.price,rooms.room_number,rooms.price,rooms.is_available 
        FROM `order_details` JOIN services ON order_details.service_id = services.id 
        JOIN rooms ON order_details.room_id = rooms.id  
        ORDER BY `services`.`name_services` ASC; WHERE id = $id";
        $stmt = $conn->query($sql); 
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $items = $stmt->fetch();
        print_r($items);
        return $items;
    }
    public static function store($data)
    {
        global $conn;
        $order_date = $data['order_date'];
        $total_amount = $data['total_amount'];
        $customers_id = $data['customers_id'];
        $sql = "INSERT INTO orders (order_date,total_amount, customers_id) 
            VALUES ('$total_amount','$order_date','$customers_id')";
        // Thực hiện truy vấn
        $conn->exec($sql);
        return true;
    }

    public static function create()
    {
        global $conn;

        $sql = "SELECT customers.ten, orders.order_date, orders.total_amount
        FROM `orders`
        JOIN `order_details` ON `order_details`.`orders_id` = `orders`.`id`
        JOIN `customers` ON `orders`.`customers_id` = `customers`.`id`";

        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $items = $stmt->fetchAll();

        return $items;
    }
    public static function update($id, $data)
    {
        global $conn;
        $order_date = $data['order_date'];
        $total_amount = $data['order_date'];
        $customers_id = $data['customers_id'];
        $sql = "UPDATE `orders` SET `order_date` = '$order_date', `total_amount` = '$total_amount', `customers_id` = '$customers_id' WHERE `id` = $id";
        // Thực hiện truy vấn
        $conn->exec($sql);
        return true;
    }


    public static function delete($id)
    {
        global $conn;
        $sql = "DELETE FROM `orders` WHERE `id` = $id";
        // Thuc thi SQL
        $conn->exec($sql);
        return true;
    }
}
