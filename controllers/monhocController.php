<?php
require_once 'models/monhoc.php';
class monhocController {
    public function index() {
        
        $monhoc = new monhoc();
        $monhocs = $monhoc->index();
//        print_r($books);
        require_once 'views/monhocs/index.php';
    }

    public function add() {
        $error = '';
        //xử lý submit form
        if (isset($_POST['submit'])) {
            $ten_mh = $_POST['ten_mh'];
            $sotinchi = $_POST['sotinchi'];
            $sotiet_lt = $_POST['sotiet_lt'];
            $sotiet_bt = $_POST['sotiet_bt'];
            $sotiet_thtn = $_POST['sotiet_thtn'];
            $sogio_tuhoc = $_POST['sogio_tuhoc'];
 
            //xử lý validate, nếu mà để trống tên sách
//            thì báo lỗi và không cho submit form
            if (empty($ten_mh) && empty($sotinchi) && empty($sotiet_lt) && empty($sotiet_bt) && empty($sotiet_thtn) && empty($sogio_tuhoc)) {
                $error = "Name không được để trống";
            }
            else {
                //gọi model để insert dữ liệu vào database
                $monhoc = new monhoc();
                //gọi phương thức để insert dữ liệu
                //nên tạo 1 mảng tạm để lưu thông tin của
//                đối tượng dựa theo cấu trúc bảng
                $monhocArr = [
                    'ten_mh' => $ten_mh,
                    'sotinchi' => $sotinchi,
                    'sotiet_lt' => $sotiet_lt,
                    'sotiet_bt' => $sotiet_bt,
                    'sotiet_thtn' => $sotiet_thtn,
                    'sogio_tuhoc' => $sogio_tuhoc
                    

                ];
                $isInsert = $monhoc->insert($monhocArr);
                if ($isInsert) {
                    $_SESSION['success'] = "Thêm mới thành công";
                }
                else {
                    $_SESSION['error'] = "Thêm mới thất bại";
                }
                header("Location: index.php?controller=monhoc&action=index");
                exit();
            }
        }
        //gọi view
        require_once 'views/monhocs/add.php';
    }

    public function edit() {
        //lấy ra thông tin sách dựa theo id đã gắn trên url
        //xử lý validate cho trường hợp id truyền lên không hợp lệ
        if (!isset($_GET['mamh'])) {
            $_SESSION['error'] = "Tham số không hợp lệ";
            header("Location: index.php?controller=monhoc&action=index");
            return;
        }
        if (!is_numeric($_GET['mamh'])) {
            $_SESSION['error'] = "Id phải là số";
            header("Location: index.php?controller=monhoc&action=index");
            return;
        }
        $mamh = $_GET['mamh'];
        //gọi model để lấy ra đối tượng sách theo id
        $monhocModel = new monhoc();
        $monhoc = $monhocModel->getmonhocById($mamh);

        //xử lý submit form, lặp lại thao tác khi submit lúc thêm mới
        $error = '';
        if (isset($_POST['submit'])) {
            $ten_mh = $_POST['ten_mh'];
            $sotinchi = $_POST['sotinchi'];
            $sotiet_lt = $_POST['sotiet_lt'];
            $sotiet_bt = $_POST['sotiet_bt'];
            $sotiet_thtn = $_POST['sotiet_thtn'];
            $sogio_tuhoc = $_POST['sogio_tuhoc'];
            //check validate dữ liệu
            if (empty($ten_mh) && empty($sotinchi) && empty($sotiet_lt) && empty($sotiet_bt) && empty($sotiet_thtn) && empty($sogio_tuhoc)) {
                $error = "Name không được để trống";
            }
            else {
                //xử lý update dữ liệu vào hệ thống
                $monhoc = new monhoc();
                //gọi phương thức để insert dữ liệu
                //nên tạo 1 mảng tạm để lưu thông tin của
//                đối tượng dựa theo cấu trúc bảng
                $monhocArr = [
                    'mamh' => $mamh,
                    'ten_mh' => $ten_mh,
                    'sotinchi' => $sotinchi,
                    'sotiet_lt' => $sotiet_lt,
                    'sotiet_bt' => $sotiet_bt,
                    'sotiet_thtn' => $sotiet_thtn,
                    'sogio_tuhoc' => $sogio_tuhoc

                ];
                $isUpdate = $monhocModel->update($monhocArr);
                if ($isUpdate) {
                    $_SESSION['success'] = "Update bản ghi #$mamh thành công";
                }
                else {
                    $_SESSION['error'] = "Update bản ghi #$mamh thất bại";
                }
                header("Location: index.php?controller=monhoc&action=index");
                exit();
            }
        }
        //truyền ra view
        require_once 'views/monhocs/edit.php';
    }

    public function delete() {
        //url trên trình dueyjet sẽ có dạng
//        ?controller=book&action=delete&id=1
        //bắt id từ trình duyêtj
        $mamh = $_GET['mamh'];
        if (!is_numeric($mamh)) {
            header("Location: index.php?controller=monhoc&action=index");
            exit();
        }

        $monhoc = new monhoc();
        $isDelete = $monhoc->delete($mamh);

        if ($isDelete) {
            //chuyển hướng về trang liệt kê danh sách
            //tạo session thông báo mesage
            $_SESSION['success'] = "Xóa bản ghi #$mamh thành công";
        }
        else {
            //báo lỗi
            $_SESSION['error'] = "Xóa bản ghi #$mamh thất bại";
        }

        header("Location: index.php?controller=monhoc&action=index");
        exit();


    }
}