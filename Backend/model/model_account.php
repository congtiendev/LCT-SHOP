<?php
function user_name($username)
{ //Hàm lấy id của 1 tài khoản
    $sql = "SELECT id FROM accounts WHERE user_name = '$username'";
    $user_name = pdo_query_value($sql);
    return $user_name;
}
//Hiển thị toàn bộ người dùng
function account_list_all()
{
    $sql = "SELECT * FROM accounts ORDER BY id DESC";
    $accountList = pdo_query($sql);
    return $accountList;
}
function account_delete($id)
{
    $sql = "DELETE FROM cart WHERE account_id = $id";
    pdo_execute($sql);
    $sql = "DELETE FROM bill WHERE account_id = $id";
    pdo_execute($sql);
    $sql = "DELETE FROM comments WHERE account_id = $id";
    pdo_execute($sql);
    $sql = "DELETE FROM accounts WHERE id = '$id'";
    pdo_execute($sql);
}
//Hiển thị thông tin người dùng theo id
function account_info($id)
{
    $sql = "SELECT * FROM accounts WHERE id = $id";
    $accountInfo = pdo_query_one($sql);
    return $accountInfo;
}

function account_add($fullname, $user_name, $password, $email, $avatarName)
{
    $sql = "INSERT INTO accounts(fullname, user_name, password, email, avatar) VALUES ('$fullname', '$user_name', '$password', '$email', '$avatarName')";
    pdo_execute($sql);
}
function account_update($fullname, $gender, $birth_year, $email, $phone, $address, $avatar_tmp, $avatarName, $id)
{
    if (empty($avatar_tmp)) {
        $sql = "UPDATE accounts SET fullname = '$fullname',gender = '$gender',birth_year = '$birth_year', email = '$email', phone = '$phone', address = '$address' WHERE id = $id";
    } else {
        $sql = "UPDATE accounts SET fullname = '$fullname',gender = '$gender',birth_year = '$birth_year',email = '$email', phone = '$phone', address = '$address', avatar = '$avatarName' WHERE id = $id";
    }
    pdo_execute($sql);
}
function checkPassword($id, $password)
{
    $sql = "SELECT * FROM accounts WHERE id = $id AND password = '$password'";
    $checkPassword = pdo_query_one($sql);
    return $checkPassword;
}
function account_update_password($new_password, $id)
{
    $sql = "UPDATE accounts SET password = '$new_password' WHERE id = $id";
    pdo_execute($sql);
}
//Sửa vai trò của người dùng
function account_role_set($id, $role)
{
    $sql = "UPDATE accounts SET role = $role WHERE id=$id";
    pdo_execute($sql);
}

function account_total()
{
    $sql = "SELECT count(*) FROM accounts";
    $account_total = pdo_query_value($sql);
    return $account_total;
}
// Hàm kiểm tra tài khoản đã tồn tại chưa
function account_check($user_name, $email)
{
    $sql = "SELECT * FROM accounts WHERE user_name = '$user_name' OR email = '$email'";
    $account_check = pdo_query_one($sql);
    return $account_check;
}

function check_login($user_name, $password)
{
    $sql = "SELECT * FROM accounts WHERE user_name = '$user_name' AND password = '$password'";
    $account_check = pdo_query_one($sql);
    return $account_check;
}

//Hàm check email 
function account_check_email($email)
{
    $sql = "SELECT * FROM accounts WHERE email = '$email'";
    $account_check_email = pdo_query_one($sql);
    return $account_check_email;
}
