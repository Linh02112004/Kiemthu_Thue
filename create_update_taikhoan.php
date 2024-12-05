<?php
// Kết nối đến cơ sở dữ liệu
$servername = "127.0.0.1:3308";
$username = "root";
$password = "";
$dbname = "tinh_thue";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra phương thức yêu cầu
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy thông tin từ form
    $ho_ten = $_POST['ho_ten'];
    $tai_khoan = $_POST['tai_khoan'];
    $mat_khau = $_POST['mat_khau'];
    $ms_thue = $_POST['ms_thue'];
    $chuc_vu = $_POST['chuc_vu'];
    $phong_ban = $_POST['phong_ban'];
    
    // Mã hóa mật khẩu nếu có mật khẩu mới (trong trường hợp sửa tài khoản)
    $hashed_password = password_hash($mat_khau, PASSWORD_DEFAULT);

    // Kiểm tra xem có phải là cập nhật tài khoản hay không (dựa trên id có sẵn hay không)
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Cập nhật tài khoản hiện có
        $id = $_POST['id'];
        
        // Nếu người dùng không muốn cập nhật mật khẩu thì không thay đổi nó
        if (!empty($mat_khau)) {
            $sql = "UPDATE tai_khoan SET ho_ten='$ho_ten', tai_khoan='$tai_khoan', mat_khau='$hashed_password', ms_thue='$ms_thue', chuc_vu='$chuc_vu', phong_ban='$phong_ban' WHERE id='$id'";
        } else {
            // Nếu không cập nhật mật khẩu thì bỏ qua trường mat_khau
            $sql = "UPDATE tai_khoan SET ho_ten='$ho_ten', tai_khoan='$tai_khoan', ms_thue='$ms_thue', chuc_vu='$chuc_vu', phong_ban='$phong_ban' WHERE id='$id'";
        }

        // Chuyển hướng đến tab Quản lý nhân viên sau khi cập nhật
        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href='./ketoan.php?tab=tab-account-management#tab-account-management';</script>";
            exit();
        } else {
            echo "Lỗi cập nhật: " . $conn->error;
        }
    } else {
        // Tạo tài khoản mới
        $sql = "INSERT INTO tai_khoan (ho_ten, tai_khoan, mat_khau, ms_thue, chuc_vu, phong_ban) 
        VALUES ('$ho_ten', '$tai_khoan', '$hashed_password', '$ms_thue', '$chuc_vu', '$phong_ban')";

        // Chuyển hướng đến tab Quản lý nhân viên sau khi thêm mới
        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.href='./ketoan.php?tab=tab-account-management#tab-account-management';</script>";
            exit();
        } else {
            echo "Lỗi khi thêm mới: " . $conn->error;
        }
    }
}

// Đóng kết nối sau khi hoàn tất
$conn->close();
?>
