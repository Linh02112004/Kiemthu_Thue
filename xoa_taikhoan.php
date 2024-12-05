<?php
if (isset($_GET['delete_id'])) {
    // Lấy ID tài khoản từ URL
    $id = $_GET['delete_id'];

    // Kết nối đến cơ sở dữ liệu
    $servername = "127.0.0.1:3308";  
    $username = "root";
    $password = "";
    $dbname = "tinh_thue";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Câu truy vấn xóa tài khoản theo ID
    $sql = "DELETE FROM tai_khoan WHERE id = $id";

    // Thực hiện truy vấn
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Xóa tài khoản thành công!'); window.location.href = 'ketoan.php#tab-account-management';</script>";
        exit();
    } else {
        echo "Lỗi khi xóa tài khoản: " . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
}
?>
