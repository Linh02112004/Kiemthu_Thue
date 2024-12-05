<?php
// Kết nối tới cơ sở dữ liệu
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

// Lấy dữ liệu từ form
$thang = $_POST['thang'];
$nam = $_POST['nam'];
$giam_tru_ca_nhan = $_POST['giam_tru_ca_nhan'];
$giam_tru_nguoiPT = $_POST['giam_tru_nguoiPT'];

// Kiểm tra xem thiết lập cho tháng và năm này đã tồn tại chưa
$sql_check = "SELECT * FROM thietlap_giamtru WHERE thang = ? AND nam = ?";
$stmt = $conn->prepare($sql_check);
$stmt->bind_param("ii", $thang, $nam);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Nếu đã tồn tại, báo lỗi
    echo "<script>alert('Thiết lập cho tháng $thang năm $nam đã tồn tại. Vui lòng chọn tháng/năm khác.'); window.history.back();</script>";
} else {
    // Nếu chưa tồn tại, thêm thiết lập mới
    $sql_insert = "INSERT INTO thietlap_giamtru (thang, nam, giam_tru_ca_nhan, giam_tru_nguoiPT) VALUES (?, ?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("iiii", $thang, $nam, $giam_tru_ca_nhan, $giam_tru_nguoiPT);

    if ($stmt_insert->execute()) {
        echo "<script>alert('Thiết lập giảm trừ đã được thêm thành công!'); window.location.href = 'ketoan.php#tab-deduction-setup';</script>";
    } else {
        echo "Lỗi: " . $conn->error;
    }
}

// Đóng kết nối
$stmt->close();
$conn->close();
?>
