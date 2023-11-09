<?php
// namespace Controller;
include 'model/Room.php';
include 'model/Categorie.php';

include 'controller/Controller.php';

class RoomController extends Controller
{
    public function index()
    {
        
        $items = Room::all();
        include_once 'view/room/index.php';
    }
    public function show()
    {
        $id = $_REQUEST['id'];
        $item = Room::find($id);
        include_once 'view/room/show.php';
    }
    public function create()
    {
        $items = Categorie::all();
        require_once 'view/room/create.php';
    }

    public function store()
    {
        $errors = [];

        $room_number = isset($_POST['room_number']) ? $_POST['room_number'] : '';
        if (empty($room_number)) {
            $errors['room_number'] = 'Bạn chưa nhập số phòng';
        }

        $price = isset($_POST['price']) ? $_POST['price'] : '';
        if (empty($price)) {
            $errors['price'] = 'Bạn chưa nhập giá';
        }

        $is_available = isset($_POST['is_available']) ? $_POST['is_available'] : '';
        if (empty($is_available)) {
            $errors['is_available'] = 'Bạn chưa nhập tình trạng phòng';
        }

        $categories_id = isset($_POST['categories_id']) ? $_POST['categories_id'] : '';
        if (empty($categories_id)) {
            $errors['categories_id'] = 'Bạn chưa chọn loại phòng';
        }

        // Lưu dữ liệu
        if (count($errors) == 0) {
            // Goi model
         
            Room::store($_POST);
            // Chuyen huong ve trang danh sach
            $this->redirect('index.php?controller=room');
        } else {
            require_once 'view/room/create.php';
        }
     
    }
    public function edit()
    {
        $id = $_GET['id'];
        $item = Room::find($id);
        // Truyen xuong view
        require_once 'view/room/edit.php';
    }
    
    // Xu ly chinh sua
    public function update()
    {
        $id = $_GET['id'];
        Room::update($id, $_POST);
        // Chuyen huong ve trang danh sach
        $this->redirect('index.php?controller=room');
    }



    public function destroy()
    {
        $id = $_GET['id'];
        Room::delete($id);
        // Chuyen huong ve trang danh sach
        $this->redirect('index.php?controller=room');
    }
}
