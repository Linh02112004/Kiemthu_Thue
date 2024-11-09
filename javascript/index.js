function validateCCCD() {
    const cccd = document.getElementById('cccd').value;
    const errorMessage = document.getElementById('cccd-error');
    if (cccd.length !== 12 || !/^\d+$/.test(cccd)) {
        errorMessage.style.display = 'block';
    } else {
        errorMessage.style.display = 'none';
    }
}

function validateRegisterCCCD() {
    const cccd = document.getElementById('register-cccd').value;
    const errorMessage = document.getElementById('register-cccd-error');
    if (cccd.length !== 12 || !/^\d+$/.test(cccd)) {
        errorMessage.style.display = 'block';
    } else {
        errorMessage.style.display = 'none';
    }
}

function validateRegisterSDT() {
    const phone = document.getElementById('phone').value; 
    const errorMessage = document.getElementById('phone-error');
    if (phone.length !== 10 || !/^\d+$/.test(phone)) { 
        errorMessage.style.display = 'block';
    } else {
        errorMessage.style.display = 'none';
    }
}

// Hàm kiểm tra các ô nhập liệu
function checkFormInputs(isRegister) {
    const name = document.getElementById('name').value;
    const cccd = document.getElementById('register-cccd').value;
    const phone = document.getElementById('phone').value;
    const address = document.getElementById('address').value;
    const userType = document.getElementById('user-type') ? document.getElementById('user-type').value : null;
    const department = document.getElementById('department') ? document.getElementById('department').value : null;

    if (isRegister) {
        if (!name) {
            document.getElementById('name').focus();
            return false;
        }
        if (!cccd) {
            document.getElementById('register-cccd').focus();
            return false;
        }
        if (!phone) {
            document.getElementById('phone').focus();
            return false;
        }
        if (!address) {
            document.getElementById('address').focus();
            return false;
        }
        if (document.getElementById('register-user-type').value === "") {
            document.getElementById('register-user-type').focus();
            return false;
        }
        if (department === "") {
            document.getElementById('department').focus();
            return false;
        }
    } else {
        if (!userType) {
            document.getElementById('user-type').focus();
            return false;
        }
        if (!document.getElementById('cccd').value) {
            document.getElementById('cccd').focus();
            return false;
        }
        if (!document.getElementById('password').value) {
            document.getElementById('password').focus();
            return false;
        }
    }
    return true; // Tất cả các ô đã được điền
}

function showLogin() {
    document.getElementById('login-form').style.display = 'block';
    document.getElementById('register-form').style.display = 'none';
    document.querySelector('.welcome-message').style.display = 'none';
}

function showRegister() {
    document.getElementById('login-form').style.display = 'none';
    document.getElementById('register-form').style.display = 'block';
    document.querySelector('.welcome-message').style.display = 'none';
}

function login() {
    if (checkFormInputs(false)) { // Gọi hàm kiểm tra cho đăng nhập
        alert("Đăng Nhập thành công!");
    }
}

function register() {
    if (checkFormInputs(true)) { // Gọi hàm kiểm tra cho đăng ký
        alert("Đăng Ký thành công!");
    }
}