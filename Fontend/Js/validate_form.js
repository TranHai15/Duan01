// dat lai kieu vien

function delete__error(key, value, error_a) {
  key.style.border = "1px solid grey";
  value.style.display = "none";
  error_a.innerHTML = "";
}
// validate trong va ten phai dai hon 5 ki tu
function is__space(value, key) {
  if (value.length === 0) {
    key.style.border = "1px solid red";
    return false;
  } else if (value.length < 6) {
    key.style.border = "1px solid red";
    return false;
  }
  return true;
}
// validate phone

function is__phone(phone, key) {
  if (phone.length === 0) {
    key.style.border = "1px solid red";
    return false;
  } else if (phone[0] !== "0") {
    key.style.border = "1px solid red";
    return false;
  } else if (phone.length !== 10) {
    key.style.border = "1px solid red";
    return false;
  } else if (Number(phone) % 1 !== 0) {
    key.style.border = "1px solid red";
    return false;
  }
  return true;
}
//  validate email
function is__email(email, key) {
  var check_mail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!check_mail.test(email)) {
    key.style.border = "1px solid red";
    return false;
  }
  return true;
}

var error__cha = document.querySelector(".error_cha");
var error = document.querySelector(".error");

function validate__account() {
  var summit = true;
  //   name
  var tbname = document.querySelector(".name");
  var name = document.getElementById("name").value.trim();
  var name_error = document.getElementById("name");
  if (!is__space(name, name_error)) {
    error__cha.style.display = "block";
    error.innerHTML = "Vui lòng kiểm tra lại";
    tbname.innerHTML = "Tên phải dài hơn 6 kí tự";
    summit = false;
  } else {
    delete__error(name_error, error__cha, tbname);
  }
  //   --------------------------------------------------------
  //   phone
  var tbphone = document.querySelector(".phone");
  var phone = document.getElementById("phone").value.trim();
  var phone_error = document.getElementById("phone");
  if (!is__phone(phone, phone_error)) {
    error__cha.style.display = "block";
    error.innerHTML = "Vui lòng kiểm tra lại";
    tbphone.innerHTML = "Số điện thoại không hợp lệ";
    summit = false;
  } else {
    delete__error(phone_error, error__cha, tbphone);
  }
  //   ----------------------------------------------------------------
  // email
  var tbemail = document.querySelector(".email");
  var email = document.getElementById("email").value.trim();
  var email__error = document.getElementById("email");
  if (!is__email(email, email__error)) {
    error__cha.style.display = "block";
    error.innerHTML = "Vui lòng kiểm tra lại";
    tbemail.innerHTML = "Email không hợp lệ";
    summit = false;
  } else {
    delete__error(email__error, error__cha, tbemail);
  }
  //   --------------------------------------------------------------------
  // password
  var tbpassword = document.querySelector(".password");
  var password = document.getElementById("password").value.trim();
  var password__error = document.getElementById("password");
  if (!is__space(password, password__error)) {
    error__cha.style.display = "block";
    error.innerHTML = "Vui lòng kiểm tra lại";
    tbpassword.innerHTML = "Mật khẩu phải dài hơn  6 kí tự";
    summit = false;
  } else {
    delete__error(password__error, error__cha, tbpassword);
  }
  return summit;
}
function input_err() {
  validate__account();
}
