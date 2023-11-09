<?php
// namespace Controller;
include 'model/Categorie.php';
include 'controller/Controller.php';

class CategorieController extends Controller{
    public function index(){
        $return = Categorie::paginate();   
        $items = $return['rows'];
        $total_pages = $return['total_pages'];
        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    
        $successMessage = '';
    
        if (isset($_GET['success']) && $_GET['success'] == 1) {
            $successMessage = 'Thêm thành công!';
        }
    
        if (isset($_GET['delete_success']) && $_GET['delete_success'] == 1) {
            $successMessage = 'Xóa thành công!';
        }
        if (isset($_GET['success']) && $_GET['success'] == 2) {
            $successMessage = 'Cập nhật thành công!';
        }
        // Truyen data xuong view
        require_once 'view/categorie/index.php';
       
    }
        // Hien thi form them moi
        public function create(){
            require_once 'view/categorie/create.php';
        }
        public function store() {
            // print_r($_POST);
            // die();
            $error = array();
            // Goi model
            $data = $_POST;
            if (Categorie::store($data, $error)) {
                // Chuyen huong ve trang danh sach
                $this->redirect('index.php?controller=categorie');
            } else {
                // Truyen loi xuong view
                require_once 'view/categorie/create.php';
            }
        }public function edit(){
            $id = $_GET['id'];
            $item = Categorie::find($id);
            // Truyen xuong view
            require_once 'view/categorie/edit.php';
        }
        // Xu ly chinh sua
         public function update(){
            $id = $_GET['id'];
            $data = $_POST;
            $error = array();
            
            if (Categorie::update($id, $data, $error)) {
                // Chuyen huong ve trang danh sach
                $this->redirect('index.php?controller=categorie');
                exit();
            } else {
                // Truyen loi xuong view
                $row = Categorie::find($id);
                require_once 'view/categorie/edit.php';
            }
        }
    
        // Xoa
        public function destroy(){
            $id = $_GET['id'];
            Categorie::delete($id);
            // Chuyen huong ve trang danh sach
            $this->redirect('index.php?controller=categorie');
        }
        // Xem chi tiet
        public function show(){
            $id = $_GET['id'];
            $item = Categorie::find($id);
    
            // Truyen xuong view
            require_once 'view/categorie/show.php';
        }
    }