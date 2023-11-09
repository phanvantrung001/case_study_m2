<?php
// namespace Controller;

use model\User;

include 'model/Order.php';
include 'model/User.php';
include 'controller/Controller.php';

class OrderController extends Controller
{
    public function index()
    {
        
        $items = Order::all();
        include_once 'view/order/index.php';
    }
    public function show()
    {
        $id = $_REQUEST['id'];
        $item = Order::find($id);
        include_once 'view/order/show.php';
    }
    public function create()
    {
        $items = User::all();
        require_once 'view/order/create.php';
    }

    public function store()
    {
        $errors = [];

        $ten = isset($_POST['ten']) ? $_POST['ten'] : '';
        if (empty($ten)) {
            $errors['ten'] = 'Bạn chưa nhập tên';
        }

        $order_date = isset($_POST['order_date']) ? $_POST['order_date'] : '';
        if (empty($order_date)) {
            $errors['order_date'] = 'bạn chưa nhập ngày ';
        }

        $total_amount = isset($_POST['total_amount']) ? $_POST['total_amount'] : '';
        if (empty($total_amount)) {
            $errors['total_amount'] = 'Bạn chưa tổng tiền';
        }
        // Lưu dữ liệu
        if (count($errors) == 0) {
            // Goi model
            Order::store($_POST);

            // Chuyen huong ve trang danh sach
            $this->redirect('index.php?controller=order');
        } else {
            require_once 'view/order/create.php';
        }
    }
    public function edit()
    {
        $id = $_GET['id'];
        $item = Order::find($id);
        // Truyen xuong view
        require_once 'view/order/edit.php';
    }
    
    // Xu ly chinh sua
    public function update()
    {
        $id = $_GET['id'];
        Order::update($id, $_POST);
        // Chuyen huong ve trang danh sach
        $this->redirect('index.php?controller=order');
    }



    public function destroy()
    {
        $id = $_GET['id'];
        Order::delete($id);
        // Chuyen huong ve trang danh sach
        $this->redirect('index.php?controller=order');
    }
}
