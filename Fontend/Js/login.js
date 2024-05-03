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

//  validate email
function is__email(email, key) {
  var check_mail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!check_mail.test(email)) {
    key.style.border = "1px solid red";
    return false;
  }
  return true;
}

function validate__login() {
  var summit = true;
  var error__cha = document.querySelector(".error_cha");
  var error = document.querySelector(".error");
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

function btn() {
  function inp() {
    validate__account();
  }
}
