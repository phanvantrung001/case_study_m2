<?php

namespace model;

use PDO;

class User
{
    public static function paginate()
    {
        global $conn;
        $sql = "SELECT * FROM `customers`";

        // Xử lí tìm kiếm
        if (isset($_GET["s"])) {
            $s1 = $_GET["s"];
            $sql .= " WHERE customers.ten LIKE '%$s1%' OR customers.cccd LIKE '%$s1%' OR customers.so_dien_thoai LIKE '%$s1%' OR customers.dia_chi LIKE '%$s1%'";
        }

        $sql .= " ORDER BY customers.id DESC";

        // Thực hiện truy vấn để lấy tổng số bản ghi
        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $total_records = $stmt->fetchAll();
        $total_records = count($total_records);

        // Định nghĩa số bản ghi hiển thị trên mỗi trang
        $limit = 5;

        // Tính tổng số trang dựa trên tổng số bản ghi và số lượng bản ghi trên mỗi trang
        $total_pages = ceil($total_records / $limit);

        // Xác định trang hiện tại
        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        // Xác định vị trí bắt đầu của bản ghi trên trang hiện tại
        $start = ($current_page - 1) * $limit;

        // Thêm LIMIT vào câu truy vấn để chỉ lấy các bản ghi trên trang hiện tại
        $sql .= " LIMIT $start, $limit";

        // Thực hiện truy vấn để lấy các bản ghi trên trang hiện tại
        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $stmt->fetchAll();

        // Trả về dữ liệu phân trang
        return [
            'rows' => $rows,
            'total_pages' => $total_pages
        ];
    }
    public static function all()
    {
        global $conn;
        $sql = "SELECT * FROM `customers`";
        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $items = $stmt->fetchAll();
        return $items;
    }
    public static function find($id)
    {
        global $conn;
        $sql = "SELECT * FROM `customers` WHERE id = $id";
        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $items = $stmt->fetch();
        return $items;
    }
    public static function store($data)
    {
        global $conn;
        $ten = $data['ten'];
        $cccd = $data['cccd'];
        $so_dien_thoai = $data['so_dien_thoai'];
        $dia_chi = $data['dia_chi'];
        $sql = "INSERT INTO `customers` 
            ( `ten`, `cccd`, `so_dien_thoai`,`dia_chi`) 
            VALUES 
            ('$ten','$cccd','$so_dien_thoai','$dia_chi')";
        //Thuc hien truy van
        $conn->exec($sql);
        return true;
    }

    public static function create()
    {
        global $conn;
        $sql = "SELECT * FROM `customers`";
        $stmt = $conn->query($sql);
        $items = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $items;
    }
    public static function update($id, $data)
    {
        global $conn;
        $ten = $data['ten'];
        $cccd = $data['cccd'];
        $so_dien_thoai = $data['so_dien_thoai'];
        $dia_chi = $data['dia_chi'];
        $sql = "UPDATE `customers` SET `ten` = '$ten', `cccd` = '$cccd', `so_dien_thoai` = '$so_dien_thoai', `dia_chi` = '$dia_chi' WHERE `id` = $id";
        // Thực hiện truy vấn
        $conn->exec($sql);
        return true;
    }


    public static function delete($id)
    {
        global $conn;
        $sql = "DELETE FROM `customers` WHERE `id` = $id";
        // Thuc thi SQL
        $conn->exec($sql);
        return true;
    }
    static function search()
    {
        global $conn;
        global $record_per_page;
        $record_per_page = 5;
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $search = isset($_REQUEST['search']) ? $_REQUEST['search'] : '';
        $offset = ($current_page - 1) * $record_per_page;
        $controller = $_REQUEST['controller'];
        $sql = "SELECT * FROM $controller WHERE id LIKE '%$search%' OR name LIKE '%$search%' OR id LIKE '%$search%' OR ten LIKE '%$search%' OR dia_chi LIKE '%$search%'";
        $sql_count = "SELECT COUNT(ID) as total FROM $controller WHERE ID LIKE '%$search%' OR name LIKE '%$search%' OR id LIKE '%$search%' OR ten LIKE '%$search%' OR dia_chi LIKE '%$search%'";
        $stmt_count = $conn->query($sql_count);
        $stmt_count->setFetchMode(PDO::FETCH_ASSOC);
        $row_count = $stmt_count->fetch();
        $total_records = $row_count['total'];
        $total_pages = ceil($total_records / $record_per_page);
        $sql .= "LIMIT $record_per_page OFFSET $offset";
        $mysql = $conn->query($sql);
        $mysql->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $mysql->fetchAll();
        $result = [
            'rows' => $rows,
            'total_pages' => $total_pages,
        ];
        return $result;
    }
}
