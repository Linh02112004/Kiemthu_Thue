let previousData = {
    name: document.getElementById('name').value,
    employeeId: document.getElementById('employee-id').value,
    hometown: document.getElementById('hometown').value,
    address: document.getElementById('address').value,
    phone: document.getElementById('phone').value,
    birthdate: document.getElementById('birthdate').value,
    dependents: document.getElementById('dependents').value,
    gender: document.querySelector('input[name="gender"]:checked') ? document.querySelector('input[name="gender"]:checked').value : ''
  };
  
  function setActiveButton(button) {
    const buttons = document.querySelectorAll('.button');
    buttons.forEach(btn => {
      btn.classList.remove('active');
    });
    button.classList.add('active');
  }
  
  function showNotification() {
    document.getElementById('notification').style.display = 'block';
  }
  
  function updateInfo() {
    previousData = {
      name: document.getElementById('name').value,
      employeeId: document.getElementById('employee-id').value,
      hometown: document.getElementById('hometown').value,
      address: document.getElementById('address').value,
      phone: document.getElementById('phone').value,
      birthdate: document.getElementById('birthdate').value,
      dependents: document.getElementById('dependents').value,
      gender: document.querySelector('input[name="gender"]:checked') ? document.querySelector('input[name="gender"]:checked').value : ''
    };
    document.getElementById('notification').style.display = 'none';
  }
  
  function cancelUpdate() {
    document.getElementById('name').value = previousData.name;
    document.getElementById('employee-id').value = previousData.employeeId;
    document.getElementById('hometown').value = previousData.hometown;
    document.getElementById('address').value = previousData.address;
    document.getElementById('phone').value = previousData.phone;
    document.getElementById('birthdate').value = previousData.birthdate;
    document.getElementById('dependents').value = previousData.dependents;
  
    let genderInputs = document.querySelectorAll('input[name="gender"]');
    genderInputs.forEach(input => {
      input.checked = (input.value === previousData.gender);
    });
  
    document.getElementById('notification').style.display = 'none';
  }
  
  function updatePhoto() {
    document.getElementById('photo-upload').click();
  }
  
  function loadPhoto(event) {
    const profilePic = document.getElementById('profile-pic');
    profilePic.style.backgroundImage = `url(${URL.createObjectURL(event.target.files[0])})`;
  }

  function setActiveButton(button) {
    const buttons = document.querySelectorAll('.button');
    buttons.forEach(btn => {
      btn.classList.remove('active');
    });
    button.classList.add('active');

    // Hiển thị phần tương ứng
    const infoSection = document.getElementById('info-section');
    const salarySection = document.getElementById('salary-section');

    if (button.innerText === "Nhập thông tin") {
      infoSection.style.display = 'block';
      salarySection.style.display = 'none';
    } else if (button.innerText === "Xem lương và thuế cá nhân") {
      infoSection.style.display = 'none';
      salarySection.style.display = 'block';
    } else {
      infoSection.style.display = 'none';
      salarySection.style.display = 'none';
    }
  }

  function searchSalary() {
    const year = parseInt(document.getElementById('search-year').value);
    const currentYear = new Date().getFullYear();
    const currentMonth = new Date().getMonth() + 1; // Tháng bắt đầu từ 0

    const tableBody = document.querySelector('#salary-table tbody');
    tableBody.innerHTML = ''; // Xóa các hàng hiện tại

    if (year < currentYear) {
      // Hiển thị toàn bộ 12 tháng
      for (let month = 1; month <= 12; month++) {
        const row = `<tr>
                      <td>${month}</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><span class="eye-icon" onclick="showDetail(${month})">👁️</span></td>
                    </tr>`;
        tableBody.insertAdjacentHTML('beforeend', row);
      }
    } else if (year === currentYear) {
      // Hiển thị đến tháng hiện tại
      for (let month = 1; month <= currentMonth; month++) {
        const row = `<tr>
                      <td>${month}</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td><span class="eye-icon" onclick="showDetail(${month})">👁️</span></td>
                    </tr>`;
        tableBody.insertAdjacentHTML('beforeend', row);
      }
    }

    document.getElementById('salary-table').style.display = 'table';
  }

  function showDetail(month) {
    // Hiển thị chi tiết lương cho tháng đã chọn
    const detailTableBody = document.getElementById('detail-table-body');
    detailTableBody.innerHTML = ''; 

    // Khởi tạo các biến với giá trị trống
    const employeeName = ""; // Trống
    const salary = ""; // Trống
    const deductions = ""; // Trống
    const taxDue = ""; // Trống

    const row = `<tr>
                  <td>${month}</td>
                  <td>${employeeName}</td>
                  <td>${salary}</td>
                  <td>${deductions}</td>
                  <td>${taxDue}</td>
                </tr>`;
    detailTableBody.insertAdjacentHTML('beforeend', row);

    document.getElementById('detail-modal').classList.add('active');
}

  function closeDetailModal() {
    document.getElementById('detail-modal').classList.remove('active');
  }

  function calculateTax() {
    // Lấy năm từ trường tìm kiếm
    const year = document.getElementById('search-year').value;
    const employeeId = document.getElementById('employee-id').value;

    // Cập nhật thông tin vào modal
    document.getElementById('taxYear').textContent = year; // Hiển thị năm đã tìm kiếm
    document.getElementById('employeeId').textContent = '';
    document.getElementById('taxCode').textContent = ''; 
    document.getElementById('fullName').textContent = ''; 
    document.getElementById('taxDue').textContent = ''; 
    document.getElementById('taxPaid').textContent = ''; 
    document.getElementById('taxRefund').textContent = ''; 

    document.getElementById('modal').classList.add('active');
  }

  function closeModal() {
    document.getElementById('modal').classList.remove('active');
  }