<?php
// namespace Controller;
include 'model/Service.php';
include 'controller/Controller.php';
use model\Service;

class ServiceController extends Controller{
    public function index()
    {
    
        $return = Service::paginate();
            
    
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
        include_once 'view/service/index.php';
    }
    public function show(){
        $id = $_REQUEST['id'];
        $item = Service::find( $id );
        include_once 'view/service/show.php';
    }
    // hien thi them moi 
    public function create(){
        $item = Service::create();
        include_once 'view/service/create.php';
    }
    public function store(){
        $errors = [];
        
        $ten = isset($_POST['name_service']) ? $_POST['name_service'] : '';
        if (empty($name_service)){
            $errors['name_service'] = 'Bạn chưa nhập tên';
        }
        $cccd = isset($_POST['price']) ? $_POST['price'] : '';
        if (empty($cccd)){
            $errors['price'] = 'Bạn chưa nhập giá';
        }
       
        // Lưu dữ liệu
        if (count($errors) == 0){
            // Goi model
            Service::store($_POST);
                // Chuyen huong ve trang danh sach
                $this->redirect('index.php?controller=service');
            }else{
                require_once 'view/Service/create.php';
            }
    }
    public function edit(){
        $id = $_GET['id'];
        $item = Service::find($id);
        // Truyen xuong view
        require_once 'view/Service/edit.php';
    }
    // Xu ly chinh sua
    public function update(){
        $id = $_GET['id'];
        Service::update( $id, $_POST );
        // Chuyen huong ve trang danh sach
        $this->redirect('index.php?controller=Service');
    }
   
       
    
    public function destroy(){
        $id = $_GET['id'];
        Service::delete($id);
        // Chuyen huong ve trang danh sach
        $this->redirect('index.php?controller=service');
    }
}
