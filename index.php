<?php
ob_start(); //  Dùng để bắt đầu lưu nội dung vào bộ nhớ đệm (tránh lỗi header)
session_start();
if (!isset($_SESSION['my_cart'])) { 
    $_SESSION['my_cart'] = [];
}
include './Backend/model/connect.php';
include './global.php';
include './Backend/model/model_category.php';
include './Backend/model/model_product.php';
include './Backend/model/model_account.php';
include './Backend/model/model_cart.php';
include './Backend/model/model_comment.php';
include './Backend/model/model_notification.php';

$categoryList = category_list_all(); //Lấy danh sách loại sản phẩm *Phải để ở trước header để lấy danh sách loại sản phẩm
$products_new = product_new(); //Lấy sản phẩm mới
$products_top = product_top10(); //Lấy sản phẩm bán chạy
include './Backend/view/header.php';

if (isset($_GET['action'])) { 
    $action = $_GET['action'];
    switch ($action) {
        case 'products':
            if (isset($_POST['search']) && !empty($_POST['search'])) {
                $search = $_POST['search'];
            } else {
                $search = "";
            }
            if (isset($_GET['category_id'])) {
                $category_id = $_GET['category_id']; //Lấy id loại sản phẩm từ url
            } else {
                $category_id = 0;
            }
            $productList = product_list_all($search, $category_id);
            $categoryList = category_name($category_id);
            if ($search != "" && count($productList) >= 1) {
                $result_search = "Có " . count($productList) . " kết quả tìm kiếm cho từ khóa: " . $search;
            } else if ($search != "" && count($productList) == 0) {
                $result_search = "Không có kết quả tìm kiếm cho từ khóa: " . $search;
            } else {
                $result_search = "";
            }

            include './Backend/controller/product/products.php';
            break;
        case 'productDetail':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $productDetail = product_detail($id);
                extract($productDetail);
                $productSameCategory = product_same_category($id, $category_id);
                product_view($id);
                $commentList = list_comments($id);
                include './Backend/controller/Product/productDetail.php';
            }
            break;
        case 'allProducts':
            $productList = all_products();
            include './Backend/controller/Product/productsAll.php';
            break;
        case 'addComment':
            if (isset($_POST['send'])) {
                if (!isset($_SESSION['account_info'])) {
                    echo "<script>Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Bạn phải đăng nhập để bình luận!',
                        confirmButtonText: 'Đăng nhập',
                        confirmButtonColor: '#ff0000'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'index.php?action=login';
                        }
                    })</script>";
                } else {
                    $product_id = $_GET['id'];
                    $account_id = $_SESSION['account_info']['id'];
                    if (isset($_POST['content'])) {
                        $content = $_POST['content'];
                    } else {
                        $content = "Người dùng chưa nhập nội dung";
                    }
                    if (isset($_POST['rating'])) {
                        $rating = $_POST['rating'];
                    } else {
                        $rating = 5;
                    }
                    $comment_img = $_FILES['comment_img'];
                    $comment_imgName = uniqid() . '-' . $comment_img['name'];
                    $comment_img_tmp = $comment_img['tmp_name'];
                    move_uploaded_file($comment_img_tmp, './Backend/uploads/comment/' . $comment_imgName);
                    $date_comment = date('H:i:s d-m-Y');
                    add_comment($content, $rating, $comment_imgName, $date_comment, $product_id, $account_id);
                    echo "<script>location.href='index.php?action=productDetail&id=$product_id';</script>";
                }
            }
            break;
        case 'about':
            include './Backend/view/about.php';
            break;
        case 'createAccount':
            if (isset($_POST['create_account'])) {
                $fullname = $_POST['fullname'];
                $user_name = $_POST['user_name'];
                $password = $_POST['password'];
                $confirm_password = $_POST['confirm_password'];
                $email = $_POST['email'];
                $avatar = $_FILES['avatar'];
                $avatarName = uniqid() . '-' . $avatar['name'];
                $avatar_tmp = $avatar['tmp_name'];
                $fullname = trim($fullname);
                $user_name = trim($user_name);
                $password = trim($password);
                $confirm_password = trim($confirm_password);
                $email = trim($email);
                $error = [];
                if (empty($fullname)) {
                    $error['fullname'] = "Bạn chưa nhập họ tên";
                }
                if (empty($user_name)) {
                    $error['user_name'] = "Bạn chưa nhập tên đăng nhập";
                } else if (strlen($user_name) < 6) {
                    $error['user_name'] = "Tên đăng nhập phải có ít nhất 6 ký tự";
                } else if (strlen($user_name) > 20) {
                    $error['user_name'] = "Tên đăng nhập không được quá 20 ký tự";
                } else if (account_check($user_name, "")) {
                    $error['user_name'] = "Tên đăng nhập đã tồn tại";
                }
                if (empty($password)) {
                    $error['password'] = "Bạn chưa nhập mật khẩu";
                } else if (strlen($password) < 6) {
                    $error['password'] = "Mật khẩu phải có ít nhất 6 ký tự";
                } else if (strlen($password) > 20) {
                    $error['password'] = "Mật khẩu không được quá 20 ký tự";
                }
                if (empty($confirm_password)) {
                    $error['confirm_password'] = "Bạn chưa nhập lại mật khẩu";
                } else if ($password != $confirm_password) {
                    $error['confirm_password'] = "Mật khẩu không khớp";
                }
                if (empty($email)) {
                    $error['email'] = "Bạn chưa nhập email";
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error['email'] = "Email không hợp lệ !";
                } else if (account_check("", $email)) {
                    $error['email'] = "Email đã tồn tại";
                }
                if (empty($error)) {
                    move_uploaded_file($avatar_tmp, './Backend/uploads/avatar/' . $avatarName);
                    account_add($fullname, $user_name, $password, $email, $avatarName);
                    $bill_id = 0;
                    $imageSrc = '../uploads/avatar/' . $avatarName;
                    $date = date('d-m-Y H:i:s');
                    $title = "New Account";
                    $content = "User " . $user_name . " Created a successful account";
                    insert_notification($bill_id, $user_name, $title, $content, $date, $imageSrc);
                    echo "<script>
                    Swal.fire({
                        title: 'Chào mừng đến với congtiendev',
                        text: 'Bạn đã tạo tài khoản thành công',
                        icon: 'success',
                        confirmButtonText: 'Đăng nhập',
                        confirmButtonColor: '#ff0000'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'index.php?action=login';
                        }
                    })</script>";
                }
            }
            include './Backend/controller/Account/create.php';
            break;
        case 'login':
            if (isset($_POST['login'])) {
                $user_name = $_POST['user_name'];
                $password = $_POST['password'];
                $checklogin = check_login($user_name, $password);
                $error = [];
                if (empty($user_name)) {
                    $error['user_name'] = "Bạn chưa nhập tên đăng nhập";
                }
                if (empty($password)) {
                    $error['password'] = "Bạn chưa nhập mật khẩu";
                }
                if (is_array($checklogin) && empty($error)) {
                    $_SESSION['account_info'] = $checklogin;
                    echo "<script>
                    location.href='index.php?action=index.php';
                    </script>";
                }
            }
            include './Backend/controller/Account/login.php';
            break;
        case 'logout':
            session_destroy();
            header('location:index.php');
            break;

        case 'editAccount':
            if (isset($_POST['update_account'])) {
                $id = $_POST['id']; 
                $fullname = $_POST['fullname'];
                $gender = $_POST['gender'];
                $birth_year = $_POST['birth_year'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $avatar = $_FILES['avatar'];
                $avatarName = uniqid() . '-' . $avatar['name'];
                $avatar_tmp = $avatar['tmp_name'];
                $error = [];
                if (empty($fullname)) {
                    $error['fullname'] = "Bạn chưa nhập họ tên";
                }
                if (empty($email)) {
                    $error['email'] = "Bạn chưa nhập email";
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error['email'] = "Email không hợp lệ !";
                }
                if (empty($phone)) {
                    $error['phone'] = "Bạn chưa nhập số điện thoại";
                } else if (!preg_match("/^[0-9]*$/", $phone)) {
                    $error['phone'] = "Số điện thoại không hợp lệ";
                }
                if ($birth_year > date('Y')) {
                    $error['birth_year'] = "Năm sinh không hợp lệ";
                } else if (empty($birth_year)) {
                    $error['birth_year'] = "Bạn chưa nhập năm sinh";
                }
                if (empty($address)) {
                    $error['address'] = "Bạn chưa nhập địa chỉ";
                }
                if (empty($error)) {
                    move_uploaded_file($avatar_tmp, './Backend/uploads/avatar/' . $avatarName);
                    account_update($fullname, $gender, $birth_year, $email, $phone, $address, $avatar_tmp, $avatarName, $id);
                    $_SESSION['account_info'] = account_check($user_name, ""); 
                    echo "<script>
                    Swal.fire({
                        title: 'Đã cập nhật',
                        text: 'Bạn đã cập nhật tài khoản thành công',
                        icon: 'success',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#green'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'index.php?action=editAccount';
                        }
                    })</script>";
                }
            }
            include './Backend/controller/Account/edit.php';
            break;
        case 'editAccountMobile':
            include './Backend/controller/Account/edit-mobile.php';
            break;
        case 'forgotPassword':
            if (isset($_POST['confirm_email'])) {
                $email = $_POST['email'];
                $confirmEmail = account_check("", $email);
                if (is_array($confirmEmail)) {
                    $notification = "Mật khẩu của bạn là: " . $confirmEmail['password'] . ". Đừng quên nữa nhé ^^";
                } else {
                    echo "<script>
                    Swal.fire({
                        title: 'Email không tồn tại',
                        text: 'Email không tồn tại trong hệ thống',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#ff0000'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'index.php?action=forgotPassword';
                        }
                    })</script>";
                }
            }

            include './Backend/controller/Account/forgot-password.php';
            break;
        case 'changePassword':
            if (isset($_POST['change_password'])) {
                $id = $_POST['id'];
                $password = $_POST['password'];
                $new_password = $_POST['new_password'];
                $confirm_password = $_POST['confirm_password'];
                $error = [];
                if (empty($password)) {
                    $error['password'] = "Bạn chưa nhập mật khẩu cũ";
                }
                if (empty($new_password)) {
                    $error['new_password'] = "Bạn chưa nhập mật khẩu mới";
                } else if (strlen($new_password) < 6) {
                    $error['new_password'] = "Mật khẩu mới phải có ít nhất 6 ký tự";
                }
                if ($new_password != $confirm_password) {
                    $error['confirm_password'] = "Mật khẩu không khớp";
                } else if (empty($confirm_password)) {
                    $error['confirm_password'] = "Bạn chưa nhập lại mật khẩu mới";
                }
                if (empty($error)) {
                    $checkPassword = checkPassword($id, $password);
                    if ($checkPassword['password'] == $password) {
                        account_update_password($new_password, $id);
                        echo "<script>
                        Swal.fire({
                            title: 'Đã cập nhật',
                            text: 'Bạn đã đổi mật khẩu thành công',
                            icon: 'success',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#green'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'index.php?action=changePassword';
                            }
                        })</script>";
                    } else {
                        $error['password'] = "Mật khẩu không đúng";
                    }
                }
            }
            include './Backend/controller/Account/change-password.php';
            break;
        case 'admin':
            if (isset($_SESSION['account_info'])) {
                if ($_SESSION['account_info']['role'] == 1) {
                    header('location: ./Backend/admin/index.php');
                } else {
                    echo "<script>alert('Bạn không có quyền truy cập')</script>";
                    header('location: index.php');
                }
            } else {
                echo "<script>
                Swal.fire({
                    title: 'Bạn không có quyền truy cập',
                    text: 'Bạn không có quyền truy cập vào trang này',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#ff0000'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'index.php';
                    }
                })</script>";
            }
            break;
        case 'addCart':
            if (isset($_POST['add_to_cart'])) {
                $id = $_POST['id'];
                $product_name = $_POST['product_name'];
                $price = $_POST['price'];
                $image = $_POST['image'];
                $category_id = $_POST['category_id'];
                $category_name = category_id_to_name($category_id);
                $quantity = 1;
                $total = $price * $quantity;
                //Kiểm tra sản phẩm đã tồn tại trong giỏ hàng chưa
                $checkProductCart = check_product_cart($id);
                if (is_array($checkProductCart)) {
                    $quantity = $checkproductCart['quantity'] + 1;
                    $total = $price * $quantity;
                    update_product_cart($quantity, $total, $id);
                } else {
                    add_product_cart($id, $product_name, $price, $image, $category_name, $quantity, $total);
                    if (isset($_SERVER['HTTP_REFERER'])) {
                        header('location: ' . $_SERVER['HTTP_REFERER']);
                    }
                }
            }
            if (isset($_POST['buy_now'])) {
                $id = $_POST['id'];
                $product_name = $_POST['product_name'];
                $price = $_POST['price'];
                $image = $_POST['image'];
                $category_id = $_POST['category_id'];
                $category_name = category_id_to_name($category_id);
                $quantity = 1;
                $total = $price * $quantity;
                $checkProductCart = check_product_cart($id);
                if (is_array($checkProductCart)) {
                    $quantity = $checkproductCart['quantity'] + 1;
                    $total = $price * $quantity;
                    update_product_cart($quantity, $total, $id);
                } else {
                    add_product_cart($id, $product_name, $price, $image, $category_name, $quantity, $total);
                    header('location: index.php?action=viewCart');
                }
            }

            break;
        case 'deleteCart':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                delete_product_cart($id);
            }
            echo "<script>
            Swal.fire({
                title: 'Đã xóa',
                text: 'Bạn đã xóa sản phẩm khỏi giỏ hàng',
                icon: 'success',
                confirmButtonText: 'OK',
                confirmButtonColor: '#green'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'index.php?action=viewCart';
                }
            })</script>";
            header('location: index.php?action=viewCart');
            break;
        case 'viewCart':
            $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;
            $id = isset($_POST['product_id']) ? $_POST['product_id'] : 0;
            if (isset($_POST['incqty'])) {
                $product = product_detail($id); //Lấy thông tin sản phẩm
                if ($quantity < $product['quantity']) {
                    $quantity += 1;
                    update_product_cart($quantity, "", $id);
                } else {
                    $quantity = $product['quantity'];
                    echo "<script>alert('Số lượng sản phẩm trong kho không đủ')</script>";
                }
            }
            if (isset($_POST['decqty'])) {
                if ($quantity > 1) {
                    $quantity -= 1;
                    update_product_cart($quantity, "", $id);
                }
            }
            include './Backend/controller/Cart/list-cart.php';
            break;

        case 'checkout':
            if (!isset($_SESSION['my_cart']) || $_SESSION['my_cart'] == []) {
                echo "<script>
                Swal.fire({
                    title: 'Giỏ hàng trống',
                    text: 'Bạn chưa có sản phẩm nào trong giỏ hàng',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#ff0000'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'index.php?action=viewCart';
                    }
                })</script>";
            } else if (!isset($_SESSION['account_info'])) {
                echo "<script>
                Swal.fire({
                    title: 'Bạn chưa đăng nhập',
                    text: 'Bạn cần đăng nhập để thanh toán',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#ff0000'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'index.php?action=login';
                    }
                })</script>";
            }
            include './Backend/controller/Cart/checkout.php';
            break;
        case 'order':
            if (isset($_SESSION['account_info'])) {
                $account_id = $_SESSION['account_info']['id'];
            } else {
                echo "<script>
                    Swal.fire({
                        title: 'Bạn chưa đăng nhập',
                        text: 'Bạn cần đăng nhập để tiến hành đặt hàng',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#ff0000'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'index.php?action=login';
                        }
                    })</script>";
            }
            //Tạo đơn hàng
            if (isset($_POST['order']) && $_SESSION['my_cart'] != []) {
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $payment = $_POST['payment'];
                $note = $_POST['note'];
                $order_date = date('Y-m-d H:i:s');
                $totalPrice = totalPrice();
                $oder_id = insert_bill($account_id, $fullname, $address, $phone, $email, $payment, $note, $order_date, $totalPrice);
                //Lấy dữ liệu từ session['my_cart'] để thêm vào bảng cart
                foreach ($_SESSION['my_cart'] as $cart) {
                    insert_cart_bill($_SESSION['account_info']['id'], $cart[0], $oder_id, $cart[1], $cart[2], $cart[3], $cart[4], $cart[5], $cart[6]);
                }

                $product_name = "";
                foreach ($_SESSION['my_cart'] as $cart) {
                    $product_name .= $cart[1] . ", "; //Lấy tên sản phẩm và ngăn cách bằng dấu phẩy
                }
                $product_name = substr($product_name, 0, -2);
                $bill_id = $oder_id;
                $user_name = $_SESSION['account_info']['user_name'];
                $title = "User " . $user_name . " successfully ordered";
                $content =  $product_name;
                $date = date('Y-m-d H:i:s');
                $image = $_SESSION['my_cart'][0][3];
                $imageSrc = '../uploads/product/' . $image;
                insert_notification($bill_id, $user_name, $title, $content, $date, $imageSrc);
                //Xóa giỏ hàng sau khi đặt hàng thành công
                foreach ($_SESSION['my_cart'] as $cart) {
                    $_SESSION['my_cart'] = [];
                }
            } else {
                echo "<script>
                Swal.fire({
                    title: 'Giỏ hàng trống',
                    text: 'Bạn chưa có sản phẩm nào trong giỏ hàng',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#ff0000'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'index.php?action=viewCart';
                    }
                })</script>";
            }
            $bill_detail = bill_detail($oder_id); //Lấy thông tin đơn hàng
            $bill_detail_cart = bill_detail_cart($oder_id); //Lấy thông tin sản phẩm trong đơn hàng
            include './Backend/controller/Cart/order.php';
            break;
        case 'myorder':
            $list_bill_order = bill_my_order($_SESSION['account_info']['id']);
            $list_cart_order = bill_cart_order($_SESSION['account_info']['id']);
            include './Backend/controller/Cart/my-order.php';
            break;

        default:
            include './Backend/view/home.php';
            break;
    }
} else {
    include './Backend/view/home.php';
}
include './Backend/view/footer.php';
