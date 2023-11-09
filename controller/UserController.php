<?php
// namespace Controller;
include 'model/User.php';
include 'controller/Controller.php';
use model\User;

class UserController extends Controller{
    public function index()
    {
        $return = User::paginate();
    


        
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
        include_once 'view/khachhang/index.php';
    }
    public function show(){
        $id = $_REQUEST['id'];
        $item = User::find( $id );
        include_once 'view/khachhang/show.php';
    }
    // hien thi them moi 
    public function create(){
        $item = User::create();
        include_once 'view/khachhang/create.php';
    }
    public function store(){
        $errors = [];
        
        $ten = isset($_POST['ten']) ? $_POST['ten'] : '';
        if (empty($ten)){
            $errors['ten'] = 'Bạn chưa nhập tên';
        }
        $cccd = isset($_POST['cccd']) ? $_POST['cccd'] : '';
        if (empty($cccd)){
            $errors['cccd'] = 'Bạn chưa nhập số cccd';
        }
        $so_dien_thoai = isset($_POST['so_dien_thoai']) ? $_POST['so_dien_thoai'] : '';
        if (empty($so_dien_thoai)){
            $errors['so_dien_thoai'] = 'Bạn chưa nhập số điện thoại';
        }
        $dia_chi = isset($_POST['dia_chi']) ? $_POST['dia_chi'] : '';
        if (empty($dia_chi)){
            $errors['dia_chi'] = 'Bạn chưa nhập số điện thoại';
        }
        // Lưu dữ liệu
        if (count($errors) == 0){
            // Goi model
               User::store($_POST);
                // Chuyen huong ve trang danh sach
                $this->redirect('index.php?controller=user');
            }else{
                require_once 'view/khachhang/create.php';
            }
    }
    public function edit(){
        $id = $_GET['id'];
        $item = User::find($id);
        // Truyen xuong view
        require_once 'view/khachhang/edit.php';
    }
    // Xu ly chinh sua
    public function update(){
        $id = $_GET['id'];
        User::update( $id, $_POST );
        // Chuyen huong ve trang danh sach
        $this->redirect('index.php?controller=user');
    }
   
       
    
    public function destroy(){
        $id = $_GET['id'];
        User::delete($id);
        // Chuyen huong ve trang danh sach
        $this->redirect('index.php?controller=user');
    }
    function search(){
        $result = User::search();
        include_once 'view/khachhang/getSearch.php';
    }
}
