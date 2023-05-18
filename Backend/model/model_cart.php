<?php
//Kiểm tra sản phẩm đã tồn tại trong giỏ hàng chưa
function check_product_cart($id)
{
    foreach ($_SESSION['my_cart'] as $cart) { //Duyệt mảng session
        if ($cart[0] == $id) {
            return true; //Nếu tồn tại sản phẩm trong giỏ hàng thì trả về true
        }
    }
    return false; //Nếu không tồn tại
}
function  add_product_cart($id, $product_name, $price, $image, $category_id, $quantity, $total)
{
    if (check_product_cart($id)) {
        foreach ($_SESSION['my_cart'] as $key => $cart) {
            if ($cart[0] == $id) {
                (int)$_SESSION['my_cart'][$key][5] += (int)$quantity; //Nếu sản phẩm đã tồn tại thì cộng thêm số lượng
                // (int)$_SESSION['my_cart'][$key][6] += (int)$total; 
            }
        }
    } else {
        $product = array($id, $product_name, $price, $image, $category_id, $quantity, $total);
        $_SESSION['my_cart'][] = $product;
    }
}

function update_product_cart($quantity, $total, $id)
{
    foreach ($_SESSION['my_cart'] as $key => $cart) { //Duyệt mảng session
        if ($cart[0] == $id) {
            $_SESSION['my_cart'][$key][5] = $quantity;
            $_SESSION['my_cart'][$key][6] = $total;
        }
    }
}


function delete_product_cart($id)
{
    foreach ($_SESSION['my_cart'] as $key => $cart) {
        if ($cart[0] == $id) {
            unset($_SESSION['my_cart'][$key]);
        }
    }
}
//Tinh tổng tiền sản phẩm đang mua
function totalPrice()
{
    $total = 0;
    $totalPrice = 0;
    foreach (($_SESSION['my_cart']) as $cart) {
        $total = $cart[5] * $cart[2];
        $totalPrice += $total;
    }
    return $totalPrice;
}

function check_product_cart_quantity($id)
{ //Kiểm tra số lượng sản phẩm trong giỏ hàng
    foreach ($_SESSION['my_cart'] as $key => $cart) {
        if ($cart[0] == $id) {
            return $_SESSION['my_cart'][$key][5];
        }
    }
}
//Tạo bill đơn hàng thêm vào bảng bill
function insert_bill($account_id, $fullname, $address, $phone, $email, $payment, $note, $order_date, $totalPrice)
{
    $sql = "INSERT INTO bill(account_id,bill_name,bill_address,bill_phone,bill_email,bill_payment,bill_note,bill_date,bill_total) VALUES('$account_id','$fullname','$address','$phone','$email','$payment','$note','$order_date','$totalPrice')";
    return pdo_execute_last_insert_id($sql); //Trả về id của bill vừa thêm mới 
}
//Đếm tổng số đơn hàng trong database
function order_total()
{
    $sql = "SELECT count(*) FROM bill";
    $order_total = pdo_query_value($sql);
    return $order_total;
}
//show bill_detail
function bill_detail($id)
{
    $sql = "SELECT * FROM bill WHERE id = $id";
    $bill_detail = pdo_query_one($sql);
    return $bill_detail;
}

//Thêm bill vào bảng cart
function insert_cart_bill($account_id, $product_id, $bill_id, $product_name, $price, $image, $category_name, $quantity, $total)
{
    $sql = "INSERT INTO cart(account_id,product_id,bill_id,product_name,price,image,category_name,quantity,total) VALUES('$account_id','$product_id','$bill_id','$product_name','$price','$image','$category_name','$quantity','$total')";
    pdo_execute($sql);
}
function bill_list_all()
{ //Lấy danh sách bill
    $sql = "SELECT * FROM bill ORDER BY id DESC";
    $bill_list_all = pdo_query($sql);
    return $bill_list_all;
}
//Hiển thi product theo bill_id
function bill_detail_cart($bill_id)
{
    $sql = "SELECT * FROM cart WHERE bill_id = $bill_id";
    $bill_detail_cart = pdo_query($sql);
    return $bill_detail_cart;
}

//Hiển thị tất cả sản phẩm trong bill
function bill_detail_product($list_products)
{
    global $imageUrl; //Lấy biến $imageUrl từ global.php
    $totalPrice = 0;
    $i = 0;
    foreach ($list_products as $product) {
        extract($product);
        $total = $price * $quantity;
        $totalPrice += $product['total'];
        $imageSrc = $imageUrl . $product['image'];
        //load trang không bị mất dữ liệu
        echo '
            <tr class="border border-dashed">
                  <td class="px-4 py-2 w-[40%]">
                    <div class="flex">
                      <div class="w-20 h-auto">
                        <img
                      src="' . $imageSrc . '" alt=""
                          class="w-26 h-auto"
                        />
                      </div>
                      <div class="ml-4 flex flex-col gap-2">
                        <p class="font-medium text-gray-600 text-xs ">
                            ' . $product['product_name'] . '
                        </p>
                        <span class="block text-gray-400 text-xs"
                          >   ' . $product['category_name'] . '</span
                        >
                      </div>
                    </div>
                  </td>
               <td
                    class="px-4 py-2 text-xs lg:text-sm text-gray-600 text-center"
                  >
                        <span class="font-semibold text-gray-700">
                            ' . $product['quantity'] . '
                       </span>
                  </td>
                  <td
                    class="px-4 py-2 text-xs lg:text-sm text-gray-600 text-center"
                  >
                    <span class="font-semibold text-gray-700">    $' . number_format($product['price']) . '</span>
                  </td>
                  <td
                    class="px-4 py-2 text-xs lg:text-sm  text-gray-600 text-center"
                  >
                    <span class="font-semibold text-gray-700">
                        $' . $total . '
                    </span>
                  </td>
                </tr>
        ';
        $i++;
    }
}
//Hiển thị tất cả sản phẩm trong bill trên mobile
function bill_detail_product_mobile($list_products)
{
    global $imageUrl; //Lấy biến $imageUrl từ global.php
    $totalPrice = 0;
    $i = 0;
    foreach ($list_products as $product) {
        extract($product);
        $totalPrice += $product['total'];
        $imageSrc = $imageUrl . $product['image'];
        echo '
            <div class="item__prouduct__cart-mobile border-b-[3px] border-dashed pb-2 flex gap-3">
                   <img   src="' . $imageSrc . '" alt="" class="w-24 h-24 object-cover" />
                   <div class="item__prouduct__cart-mobile--info flex flex-col gap-2">
                       <h1 class="text-sm font-medium">
                            ' . $product['product_name'] . '
                       </h1>
                           <div class="text flex gap-2">
                               <span class="text-sm text-gray-500">x ' . $product['quantity'] . '</span>
                               <span class="text-sm text-gray-500">
                                      $' . number_format($product['price']) . '
                               </span>
                       </div>
                   </div>
               </div>
               
        ';
    }
}


function  bill_cart_order($account_id)
{ //Hiển thị tất cả sản phẩm trong bill của user
    $sql = "SELECT * FROM cart WHERE account_id = $account_id";
    $bill_cart_order = pdo_query($sql);
    return $bill_cart_order;
}



//Hiển thị tất cả đơn hàng đã order của user
function bill_my_order($account_id)
{
    $sql = "SELECT * FROM bill WHERE account_id = $account_id";
    $list_order = pdo_query($sql);
    return $list_order;
}

//Xóa bill
function bill_delete($id)
{
    $sql = "DELETE FROM cart WHERE bill_id = $id";
    pdo_execute($sql);
    $sql = "DELETE FROM bill WHERE id = $id";
    pdo_execute($sql);
    $sql = "DELETE FROM notifications WHERE bill_id = $id";
    pdo_execute($sql);
}

function get_status_bill($status)
{
    if ($status == 0) {
        return 'Processing';
    } else if ($status == 1) {
        return 'Preparing goods';
    } else if ($status == 2) {
        return 'Delivery';
    } else if ($status == 3) {
        return 'Delivered';
    } else if ($status == 4) {
        return 'Cancelled';
    }
}
