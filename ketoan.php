
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phần mềm thuế thu nhập</title>

    <!-- Thư viện jsPDF (xuất PDF) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    
    <!-- Thư viện SheetJS (xuất Excel) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>

    <link rel="stylesheet" href="./styles/ketoan.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Thông tin người dùng -->
            <div class="profile">
                <div class="profile-pic-container">
                    <div class="profile-pic" id="profile-pic"></div>
                    <div class="profile-pic-overlay"></div>
                </div>
                <input type="file" id="photo-input" onchange="loadPhoto(event)" accept="image/*" style="display: none;">
                <a class="update-photo" onclick="openPhotoInput()">Cập nhật ảnh</a>
                <p>Kế toán</p>
            </div>
            <!-- Các nút chuyển tab -->
            <button class="btn active" onclick="switchTab('tab-tax-summary')">Xem quyết toán thuế</button>
        <button class="btn" onclick="switchTab('tab-employee-management')">Quản lý nhân viên</button>
<button class="btn" onclick="switchTab('tab-account-management')">Quản lý tài khoản</button>
<button class="btn" onclick="switchTab('tab-salary-entry')">Nhập lương</button>
<button class="btn" onclick="switchTab('tab-deduction-setup')">Thiết lập giảm trừ</button>
<button class="btn" onclick="switchTab('tab-tax-calculation')">Tính thuế</button>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Tab: Xem quyết toán thuế -->
            <div id="tab-tax-summary" class="tab-content">
                <h2>Xem quyết toán thuế</h2>
                <div class="filter-section">
                    <label for="departmentInput">Chọn phòng ban:</label>
                    <select class="filter-input" id="departmentInput">
                        <option value="marketing">Phòng Marketing</option>
                        <option value="sales">Phòng Kinh doanh</option>
                        <option value="hr">Phòng Nhân sự</option>
                        <option value="sales">Phòng Sales</option>
                    </select>
                    <input type="number" id="yearInput" class="filter-input" placeholder="Nhập năm">
                    <button class="search-btn" onclick="search()">Tìm kiếm</button>
                </div>

                <div id="table-container" class="table-container" style="display: none;">
                    <table>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Họ tên</th>
                                <th>MSNV</th>
                                <th>MS thuế</th>
                                <th>Lương</th>
                                <th>Thuế</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            <!-- Nội dung sẽ được hiển thị sau khi nhấn "Tìm kiếm" -->
                        </tbody>
                    </table>
                </div>

                <footer id="footer" style="display: none;">
                    <p id="total-salary">Tổng lương: 0</p>
                    <p id="total-tax">Tổng thuế: 0</p>
                    <a href="#" class="export">Xuất báo cáo</a>
                </footer>
            </div>

            <!-- Tab: Quản lý nhân viên -->
            <div id="tab-employee-management" class="tab-content" style="display: none;">
                <h2>Quản lý nhân viên</h2>
                <div class="filter-section">
                    <label for="department-select">Chọn phòng ban:</label>
                    <select id="department-select">
                        <option value="marketing">Phòng Marketing</option>
                        <option value="sales">Phòng Kinh doanh</option>
                        <option value="hr">Phòng Nhân sự</option>
                        <option value="sales">Phòng Sales</option>
                    </select>
                </div>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Họ tên</th>
                                <th>MSNV</th>
                                <th>Ngày sinh</th>
                                <th>Địa chỉ</th>
                                <th>SDT</th>
                                <th>Người PT</th>
                                <th>Giới tính</th>
                                <th>Ảnh</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody id="employee-table-body">
                            <!-- Hàng dữ liệu sẽ được thêm bằng JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>

           <!-- Tab: Quản lý tài khoản -->
<div id="tab-account-management" class="tab-content" style="display: none;">
    <h2>Quản lý tài khoản</h2>

    <!-- Nút Tạo tài khoản -->
    <button class="search-btn" onclick="openCreateAccountForm()">Tạo tài khoản mới</button>

    <!-- Cửa sổ nhập thông tin tài khoản -->
    <div id="create-account-form" class="popup" style="display: none;">
        <h3>Nhập thông tin tài khoản</h3>

        <form action="./create_update_taikhoan.php" method="POST">
            <label>Họ và tên:</label>
            <input type="text" name="ho_ten" required><br>
            <label>Tài khoản:</label>
            <input type="text" name="tai_khoan" required><br>
            <label>Mật khẩu:</label>
            <input type="password" name="mat_khau" required><br>
            <label>Mã số thuế:</label>
            <input type="text" name="ms_thue"><br>
            <label>Chức vụ:</label>
            <select name="chuc_vu">
                <option value="truong_phong">Trưởng phòng</option>
                <option value="ke_toan">Kế toán</option>
                <option value="nhan_vien">Nhân viên</option>
            </select><br>
            <label>Phòng ban:</label>
            <select name="phong_ban">
                <option value="marketing">Marketing</option>
                <option value="kinh_doanh">Kinh doanh</option>
                <option value="nhan_su">Nhân sự</option>
                <option value="sale">Sales</option>
            </select><br>
            
            <button type="submit">Lưu</button>
        </form>
    </div>

    <hr>

    <!-- Danh sách tài khoản -->
    <?php
    // Kết nối cơ sở dữ liệu
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
    
    // Kiểm tra nếu có thông báo từ URL (khi tạo tài khoản thành công)
    if (isset($_GET['message']) && $_GET['message'] == 'success') {
        echo "<div style='color: green;'>Tài khoản đã được tạo thành công!</div>";
    }
    
    // Truy vấn để lấy tất cả các tài khoản
    $sql = "SELECT id, ho_ten, tai_khoan, ms_thue, chuc_vu, phong_ban FROM tai_khoan";
    $result = $conn->query($sql);
    
    // Hiển thị danh sách tài khoản
    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Tài khoản</th>
                    <th>Mã số thuế</th>
                    <th>Chức vụ</th>
                    <th>Phòng ban</th>
                    <th>Thao tác</th>
                </tr>";
        // Lặp qua từng dòng dữ liệu và hiển thị trong bảng
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["ho_ten"] . "</td>
                    <td>" . $row["tai_khoan"] . "</td>
                    <td>" . $row["ms_thue"] . "</td>
                    <td>" . $row["chuc_vu"] . "</td>
                    <td>" . $row["phong_ban"] . "</td>
                    <td>
                    <a href='sua_taikhoan.php?edit_id=" . $row["id"] . "'>Sửa</a> | 
                    <a href='xoa_taikhoan.php?delete_id=" . $row["id"] . "'>Xóa</a>
                </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Không có tài khoản nào trong hệ thống.";
    }
    
    // Đóng kết nối
    $conn->close();
    ?>    
</div>




            <!-- Tab: Nhập lương -->
            <div id="tab-salary-entry" class="tab-content" style="display: block;">
    <h2>Nhập lương</h2>
    <div class="filter-section">
        <label for="departmentSalaryInput">Chọn phòng ban:</label>
        <select class="filter-input"id="departmentSalaryInput" name="department">
            <option value="marketing">Phòng Marketing</option>
            <option value="sales">kinh_doanh</option>
            <option value="hr">Phòng Nhân sự</option>
            <option value="sales">Phòng Sales</option>
        </select>

        <label for="monthInput">Chọn tháng:</label>
        <select class="filter-input" id="monthInput" name="month">
            <option value="1">Tháng 1</option>
            <option value="2">Tháng 2</option>
            <option value="3">Tháng 3</option>
            <option value="4">Tháng 4</option>
            <option value="5">Tháng 5</option>
            <option value="6">Tháng 6</option>
            <option value="7">Tháng 7</option>
            <option value="8">Tháng 8</option>
            <option value="9">Tháng 9</option>
            <option value="10">Tháng 10</option>
            <option value="11">Tháng 11</option>
            <option value="12">Tháng 12</option>
        </select>

        <input type="number" id="yearSalaryInput" class="filter-input" placeholder="Nhập năm" name="year">
        <button class="search-btn" type="submit" name="searchSalary" onclick="searchSalary()">Tìm kiếm</button>
    </div>

    <div id="salary-table-container" class="table-container" style="display: none;">
        <table>
            <thead>
                <tr>
                    <th>Họ tên</th>
                    <th>MSNV</th>
                    <th>Tháng</th>
                    <th>Năm</th>
                    <th>Nhập lương</th>
                </tr>
            </thead>
            <tbody id="salary-table-body">
                <?php 
                // Nếu có kết quả từ truy vấn, hiển thị danh sách nhân viên
                if (isset($result) && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { 
                ?>
                <tr>
                    <td><?php echo $row['ho_ten']; ?></td>
                    <td><?php echo $row['MSNV']; ?></td>
                    <td><?php echo $_POST['month']; ?></td>
                    <td><?php echo $_POST['year']; ?></td>
                    <td>
                        <input type="number" name="luong_co_ban[<?php echo $row['id']; ?>]" placeholder="Nhập lương cơ bản" required>
                    </td>
                </tr>
                <?php 
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    
    <button class="search-btn" id="save-salary-btn" style="display: none;" onclick="saveSalaries()">Lưu lương</button>
</div>







<!-- Tab: Thiết lập giảm trừ -->
<div id="tab-deduction-setup" class="tab-content" style="display: none;">
    <h2>Thiết lập giảm trừ</h2>
    <form method="POST" action="TLGT_tao.php">
    <div class="filter-section">
        <label for="deduction-month">Chọn tháng:</label>
        <select class="filter-input" id="deduction-month" name="thang">
            <option value="1">Tháng 1</option>
            <option value="2">Tháng 2</option>
            <option value="3">Tháng 3</option>
            <option value="4">Tháng 4</option>
            <option value="5">Tháng 5</option>
            <option value="6">Tháng 6</option>
            <option value="7">Tháng 7</option>
            <option value="8">Tháng 8</option>
            <option value="9">Tháng 9</option>
            <option value="10">Tháng 10</option>
            <option value="11">Tháng 11</option>
            <option value="12">Tháng 12</option>
        </select>

        <label for="deduction-year">Nhập năm:</label>
        <input type="number" id="deduction-year" name="nam" class="filter-input" placeholder="Nhập năm">
    </div>

    <div class="deduction-section">
        <div class="deduction-box">
            <label for="self-deduction">Giảm trừ cho bản thân:</label>
            <input type="number" id="self-deduction" name="giam_tru_ca_nhan" class="filter-input" placeholder="Nhập mức giảm trừ" min="0">
            <br>
            <label for="dependent-deduction">Giảm trừ người phụ thuộc:</label>
            <input type="number" id="dependent-deduction" name="giam_tru_nguoiPT" class="filter-input" placeholder="Nhập mức giảm trừ" min="0">
        </div>
        <div>
            <button class="search-btn" type="submit">Thiết lập</button>
        </div>
    </div>
</form><br>
    <?php
// Hiển thị danh sách các thiết lập đã có
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

// Lấy tối đa 10 thiết lập mới nhất
$sql = "SELECT * FROM thietlap_giamtru ORDER BY nam DESC, thang DESC LIMIT 10";
$result = $conn->query($sql);
?>

<table>
    <tr>
        <th>Tháng</th>
        <th>Năm</th>
        <th>Giảm trừ bản thân</th>
        <th>Giảm trừ người phụ thuộc</th>
        <th>Hành động</th>
    </tr>

    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?php echo $row['thang']; ?></td>
        <td><?php echo $row['nam']; ?></td>
        <td><?php echo $row['giam_tru_ca_nhan']; ?></td>
        <td><?php echo $row['giam_tru_nguoiPT']; ?></td>
        <td>
            <!-- Nút Xóa -->
            <a href="delete_deduction.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa thiết lập này?');">Xóa</a>
        </td>
    </tr>
    <?php endwhile; ?>

</table>

</div>

<!-- Tab: Tính thuế -->
<div id="tab-tax-calculation" class="tab-content" style="display: none;">
    <h2>Tính thuế</h2>
    <div class="filter-section">
        <label for="monthInput">Chọn tháng:</label>
        <select id="monthInput" class="filter-input">
            <option value="01">Tháng 1</option>
            <option value="02">Tháng 2</option>
            <option value="03">Tháng 3</option>
            <option value="04">Tháng 4</option>
            <option value="05">Tháng 5</option>
            <option value="06">Tháng 6</option>
            <option value="07">Tháng 7</option>
            <option value="08">Tháng 8</option>
            <option value="09">Tháng 9</option>
            <option value="10">Tháng 10</option>
            <option value="11">Tháng 11</option>
            <option value="12">Tháng 12</option>
        </select>

        <label for="yearInputs">Nhập năm:</label>
        <input type="number" id="yearInputs" class="filter-input" placeholder="Nhập năm" />

        <label for="departmentSalaryInput">Chọn phòng ban:</label>
        <select id="departmentSalaryInput" class="filter-input">
            <option value="marketing">Phòng Marketing</option>
            <option value="sales">Phòng Sales</option>
            <option value="hr">Phòng Nhân sự</option>
            <option value="business">Phòng Kinh doanh</option>
        </select>

        <button class="search-btn" onclick="searchEmployees()">Tìm kiếm</button>
        <button class="search-btn" onclick="calculateTax()">Tính thuế</button>
    </div>

    <div id="employee-table-container" style="display: none;">
        <table>
            <thead>
                <tr>
                    <th>Họ và tên</th>
                    <th>MSNV</th>
                    <th>MS thuế</th>
                    <th>Lương</th>
                    <th>Thuế cần nộp</th>
                </tr>
            </thead>
            <tbody id="employee-table-body"></tbody>
        </table>
    </div>
</div>
        </div>
    </div>

    <!-- Script -->
    <script src="./js/ketoan.js"></script>
    <script >function loadEditData(id) {
    // Gửi yêu cầu đến server để lấy thông tin của tài khoản cần sửa
    fetch('lay_thong_tin_tai_khoan.php?id=' + id)
    .then(response => response.json())
    .then(data => {
        // Đưa dữ liệu vào các input trong modal
        document.getElementById('edit_id').value = data.id;
        document.getElementById('ho_ten').value = data.ho_ten;
        document.getElementById('tai_khoan').value = data.tai_khoan;
        document.getElementById('ms_thue').value = data.ms_thue;
        document.getElementById('chuc_vu').value = data.chuc_vu;
        document.getElementById('phong_ban').value = data.phong_ban;
    })
    .catch(error => console.error('Lỗi:', error));
}</script>
    
</body>
</html>