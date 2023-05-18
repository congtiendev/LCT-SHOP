<?php
session_start();
if (!isset($_SESSION['account_info']) || $_SESSION['account_info']['role'] != 1) {
    echo "<script>alert('Bạn không có quyền truy cập trang này! Vui lòng sử dụng tài khoản admin để tuy cập trang này'); 
    window.location.href = '../../index.php?action=login';</script>";
}
ob_start(); //  Dùng để bắt đầu lưu nội dung vào bộ nhớ đệm (tránh lỗi header)
$imageUrl = "../uploads/product/";
$avatarUrl = "../uploads/avatar/";
include '../model/connect.php';
include '../model/model_category.php';
include '../model/model_product.php';
include '../model/model_account.php';
include '../model/model_cart.php';
include '../model/model_comment.php';
include '../model/model_notification.php';
$products_top = product_top10();
$notificationList = show_notification();
(int)$products_total = product_total();
(int)$accounts_total = account_total();
(int)$order_total = order_total();
(int)$comment_total = comment_total();
include './view/header.php';
$imageUrlAD = "../uploads/";
if (isset($_GET['action'])) { // Nếu biến action ở thẻ a trong header tồn tại 
    $action = $_GET['action'];
    switch ($action) {
        case 'home':
            include './view/home.php';
            break;
            // ------------------------------Category---------------------------------\
            //list category
        case 'listCategory':
            $categoryList = category_list_all();
            include './controller/category/list-category.php';
            break;
            //add category
        case 'addCategory':
            if (isset($_POST['submit'])) {
                $category_name = $_POST['category_name'];
                $category_error = '';
                if (empty($category_name)) {
                    $category_error = 'Vui lòng nhập tên danh mục';
                } else {
                    $category_check = category_check($category_name);
                    if ($category_check) {
                        $category_error = 'Danh mục đã tồn tại';
                    } else {
                        category_add($category_name);
                        echo "<script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Thêm danh mục thành công',
                                showConfirmButton: true,
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#3085d6',
                                allowOutsideClick: false
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = 'index.php?action=listCategory';
                                }
                            })
                        </script>";
                    }
                }
            }
            include './controller/category/add-category.php';
            break;

        case 'editCategory':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM category WHERE id = '$id'";
                $categoryList = pdo_query($sql);
            }
            include './controller/category/edit-category.php';
            break;
        case 'updateCategory':
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $category_name = $_POST['category_name'];
                if (empty($category_name)) {
                    $category_error = 'Vui lòng nhập tên danh mục';
                    echo "<script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Vui lòng nhập tên danh mục',
                            showConfirmButton: true,
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#3085d6',
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'index.php?action=editCategory&id=$id';
                            }
                        })
                    </script>";
                } else {
                    $category_check = category_check($category_name);
                    if ($category_check) {
                        echo "
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Danh mục đã tồn tại',
                                showConfirmButton: true,
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#3085d6',
                                allowOutsideClick: false
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = 'index.php?action=editCategory&id=$id';
                                }
                            })
                        ";
                    } else {
                        category_update($id, $category_name);
                        echo "<script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Cập nhật danh mục thành công',
                                showConfirmButton: true,
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#3085d6',
                                allowOutsideClick: false
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = 'index.php?action=listCategory';
                                }
                            })
                        ";
                    }
                }
            }
            $categoryList = category_list_all();
            include './controller/category/list-category.php';
            break;
            //delete category
        case 'deleteCategory':
            if (isset($_GET['id']) && $_GET['id'] != 0) {
                $id = $_GET['id'];
                echo "<script>
                    Swal.fire({
                        title: 'Bạn có chắc chắn muốn xóa?',
                        text: 'Bạn sẽ không thể khôi phục lại dữ liệu này!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Đồng ý',
                        cancelButtonText: 'Hủy'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'index.php?action=deleteCategoryConfirm&id=$id';
                        }
                    })
                </script>";
            }
            break;
        case 'deleteCategoryConfirm':
            if (isset($_GET['id']) && $_GET['id'] != 0) {
                $id = $_GET['id'];
                category_delete($id);
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Xóa danh mục thành công',
                        showConfirmButton: true,
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#3085d6',
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'index.php?action=listCategory';
                        }
                    })
                </script>";
            }
            break;
        case 'deleteSelectedCategory':
            if (isset($_POST['delete_select'])) {
                if (isset($_POST['checkbox'])) {
                    $checkbox = $_POST['checkbox'];
                    foreach ($checkbox as $id) {
                        category_delete($id);
                    }
                }
            }
            $categoryList = category_list_all();
            include './controller/category/list-category.php';
            // ------------------------------Product---------------------------------
        case 'listProducts':
            if (isset($_POST['submit'])) {
                $search = $_POST['search'];
                $category_id = $_POST['category_id'];
            } else {
                $search = "";
                $category_id = 0;
            }
            $categoryList = category_list_all(); // Gọi hàm category_list  để lấy danh sách category và tiến hành lọc
            $productList = product_list_all($search, $category_id);
            include './controller/product/list-products.php';
            break;

        case 'addProduct':
            $error = [];
            if (isset($_POST['add_new'])) {
                $product_name = $_POST['product_name'];
                //Kiểm tra trùng tên sản phẩm
                if (empty($product_name)) {
                    $error['product_name'] = 'Vui lòng nhập tên sản phẩm';
                } else if (strlen($product_name) > 100) {
                    $error['product_name'] = 'Tên sản phẩm không được quá 100 ký tự';
                } else if (product_check_name($product_name)) {
                    $error['product_name'] = 'Tên sản phẩm đã tồn tại';
                }
                $product_price = $_POST['price'];
                if (empty($product_price)) {
                    $error['price'] = 'Vui lòng nhập giá sản phẩm';
                } else if (!is_numeric($product_price)) {
                    $error['price'] = 'Giá sản phẩm phải là số';
                } else if ($product_price < 0) {
                    $error['price'] = 'Giá sản phẩm phải lớn hơn 0';
                }
                $product_discount = $_POST['discount'];
                $product_image = $_FILES['image']['name'];
                $image = $_FILES['image'];
                $image_tmp = $image['tmp_name'];
                $imageName = uniqid() . '-' . $image['name'];
                if (empty($product_image)) {
                    $error['image'] = 'Vui lòng chọn ảnh sản phẩm';
                } else {
                    $imageType = pathinfo($imageName, PATHINFO_EXTENSION);
                    $imageTypeAllow = ['png', 'jpg', 'jpeg', 'gif'];
                    if (!in_array(strtolower($imageType), $imageTypeAllow)) {
                        $error['image'] = 'Chỉ được upload file ảnh';
                    }
                }

                $product_quantity = $_POST['quantity'];
                if (empty($product_quantity) || $product_quantity < 0) {
                    $error['quantity'] = 'Vui lòng nhập số lượng sản phẩm';
                }
                $product_date = $_POST['date'];
                if (empty($product_date) || $product_date == '0000-00-00') {
                    $error['date'] = 'Vui lòng nhập ngày sản xuất';
                } else {
                    $product_date = date('Y-m-d', strtotime($product_date));
                }
                $category_id = $_POST['category_id'];

                if (isset($_POST['status'])) {
                    $product_status = $_POST['status'];
                } else {
                    $product_status = 0;
                }
                if ($product_status == null) {
                    $error['status'] = 'Vui lòng chọn trạng thái';
                }
                $product_detail = $_POST['detail'];
                $product_detail = trim($product_detail);
                if (empty($product_detail)) {
                    $error['detail'] = 'Vui lòng nhập chi tiết sản phẩm';
                } else if (strlen($product_detail) > 254) {
                    $error['detail'] = 'Chi tiết sản phẩm không được quá 254 ký tự';
                }

                if (empty($error)) {
                    try {
                        product_add($product_name, $product_price, $product_discount, $imageName, $product_quantity, $product_date, $product_status, $product_detail, $category_id);
                        move_uploaded_file($image_tmp, '../uploads/product/' . $imageName);
                        echo "<script> window.location.href = 'index.php?action=listProducts';</script>";
                    } catch (Exception $e) {
                        echo "<script>alert('Thêm sản phẩm thất bại ! $e'); window.location.href = 'index.php?action=listProducts';</script>";
                    }
                }
            }
            $categoryList = category_list_all(); // Lấy danh sách category
            include './controller/product/add-product.php';
            break;
        case 'editProduct':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM products WHERE id = '$id'";
                $productList = pdo_query($sql);
            }
            $categoryList = category_list_all();
            include './controller/product/edit-product.php';
            break;
        case 'updateProduct':
            $error = [];
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $product_name = $_POST['product_name'];
                if (empty($product_name)) {
                    $error['product_name'] = 'Vui lòng nhập tên sản phẩm';
                }
                $product_price = $_POST['price'];
                if (empty($product_price)) {
                    $error['price'] = 'Vui lòng nhập giá sản phẩm';
                }
                $product_discount = $_POST['discount'];
                $image = $_FILES['image'];
                $imageName = uniqid() . '-' . $image['name'];
                $image_tmp = $image['tmp_name'];
                $product_quantity = $_POST['quantity'];
                if (empty($product_quantity) || $product_quantity < 0) {
                    $error['quantity'] = 'Vui lòng nhập số lượng sản phẩm';
                }
                $product_date = $_POST['date'];
                if (empty($product_date) || $product_date == '0000-00-00') {
                    $error['date'] = 'Vui lòng nhập ngày sản xuất';
                } else {
                    $product_date = date('Y-m-d', strtotime($product_date));
                }
                $category_id = $_POST['category_id'];

                if (isset($_POST['status'])) {
                    $product_status = $_POST['status'];
                } else {
                    $product_status = 0;
                }
                if ($product_status == null) {
                    $error['status'] = 'Vui lòng chọn trạng thái';
                }
                $product_detail = $_POST['detail'];
                if (empty($product_detail)) {
                    $error['detail'] = 'Vui lòng nhập chi tiết sản phẩm';
                }
                if (empty($error)) {
                    move_uploaded_file($image_tmp, '../uploads/product/' . $imageName); // Upload file vào thư mục uploads
                    product_update($id, $product_name, $product_price, $product_discount, $image_tmp, $imageName, $product_quantity, $product_date, $product_status, $product_detail, $category_id);
                }
            }
            $productList = product_list_all("", 0);
            $categoryList = category_list_all();
            include './controller/product/list-products.php';
            break;

        case 'deleteProduct':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                echo "<script>
                    Swal.fire({
                        title: 'Bạn có chắc chắn muốn xóa?',
                        text: 'Bạn sẽ không thể khôi phục lại dữ liệu này!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Đồng ý',
                        cancelButtonText: 'Hủy'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'index.php?action=deleteProductConfirm&id=$id';
                        }
                    })
                </script>";
            }
            break;
        case 'deleteProductConfirm':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                product_delete($id);
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Xóa sản phẩm thành công',
                        showConfirmButton: true,
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#3085d6',
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'index.php?action=listProducts';
                        }
                    })
                </script>";
            }
            break;
        case 'deleteSelectedProduct':
            if (isset($_POST['delete_select'])) {
                if (isset($_POST['checkbox'])) {
                    $checkbox = $_POST['checkbox'];
                    foreach ($checkbox as $id) {
                        product_delete($id);
                    }
                }
            }
            $productList = product_list_all("", 0);
            include './controller/product/list-products.php';
            break;
        case 'listAccounts':
            $accountList = account_list_all();
            include './controller/account/list-account.php';
            break;
        case 'editAccount':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM accounts WHERE id = $id";
                $accountList = pdo_query($sql);
            }
            include './controller/account/edit-account.php';
            break;
        case 'updateRole':
            if (isset($_POST['save'])) {
                $id = $_POST['id'];
                $role = $_POST['role'];
                account_role_set($id, $role);
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Cập nhật vai trò thành công',
                        showConfirmButton: true,
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#3085d6',
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'index.php?action=listAccounts';
                        }
                    })
                </script>";
            }
            break;
        case 'deleteAccount':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                if ($_SESSION['account_info']['role']  == 1) {
                    echo "
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Không thể xóa tài khoản này',
                            showConfirmButton: true,
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#3085d6',
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'index.php?action=listAccounts';
                            }
                        })
                    ";
                } else {
                    echo "<script>
                    Swal.fire({
                        title: 'Bạn có chắc chắn muốn xóa người dùng này?',
                        text: 'Bạn sẽ không thể khôi phục lại dữ liệu này!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Đồng ý',
                        cancelButtonText: 'Hủy'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'index.php?action=deleteAccountConfirm&id=$id';
                        }
                    })
                </script>";
                }
            }
            break;
        case 'deleteAccountConfirm':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                account_delete($id);
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Xóa tài khoản thành công',
                        showConfirmButton: true,
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#3085d6',
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'index.php?action=listAccounts';
                        }
                    })
                </script>";
            }
            break;
        case 'deleteSelectedAccount':
            if (isset($_POST['delete_select'])) {
                if (isset($_POST['checkbox'])) {
                    $checkbox = $_POST['checkbox'];
                    foreach ($checkbox as $id) {
                        account_delete($id);
                    }
                }
            }
            $accountList = account_list_all();
            break;
        case 'listComments':
            $commentList = list_comments_admin();
            include './controller/comment/list-comment.php';
            break;
        case 'deleteComment':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                echo "<script>
                    Swal.fire({
                        title: 'Bạn có chắc chắn muốn xóa bình luận này?',
                        text: 'Bạn sẽ không thể khôi phục lại dữ liệu này!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Đồng ý',
                        cancelButtonText: 'Hủy'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'index.php?action=deleteCommentConfirm&id=$id';
                        }
                    })
                </script>";
            }
            break;
        case 'deleteCommentConfirm':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                comment_delete($id);
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Xóa bình luận thành công',
                        showConfirmButton: true,
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#3085d6',
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'index.php?action=listComments';
                        }
                    })
                </script>";
            }
            break;
        case 'deleteSelectedComment':
            if (isset($_POST['delete_select'])) {
                if (isset($_POST['checkbox'])) {
                    $checkbox = $_POST['checkbox'];
                    foreach ($checkbox as $id) {
                        comment_delete($id);
                    }
                }
            }
            $commentList = list_comments_admin();
            include './controller/comment/list-comment.php';
            break;



        case 'listOrder':
            $orderList = bill_list_all();
            include './controller/order/list-order.php';
            break;
        case 'deleteOrder':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                echo "<script>
                    Swal.fire({
                        title: 'Bạn có chắc chắn muốn xóa đơn hàng này?',
                        text: 'Bạn sẽ không thể khôi phục lại dữ liệu này!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Đồng ý',
                        cancelButtonText: 'Hủy'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'index.php?action=deleteOrderConfirm&id=$id';
                        }
                    })
                </script>";
            }
            break;
        case 'deleteOrderConfirm':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                bill_delete($id);
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Xóa đơn hàng thành công',
                        showConfirmButton: true,
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#3085d6',
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'index.php?action=listOrder';
                        }
                    })
                </script>";
            }
            break;
        case 'deleteSelectedOrder':
            if (isset($_POST['delete_select'])) {
                if (isset($_POST['checkbox'])) {
                    $checkbox = $_POST['checkbox'];
                    foreach ($checkbox as $id) {
                        bill_delete($id);
                    }
                }
            }
            $orderList = bill_list_all();
            include './controller/order/list-order.php';
            break;
        case 'statistical':
            $category_statistical = category_statistical();
            include './controller/statistical/statistical.php';
            break;

        case 'logout':
            session_destroy();
            header('location: ../../index.php?action=login');
        default:
            include './view/home.php';
            break;
    }
} else {
    include './view/home.php';
}
include './view/footer.php';
