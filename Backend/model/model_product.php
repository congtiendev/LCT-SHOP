<?php
//manager
function product_list_all($search, $category_id,)
{
    $sql = "SELECT * FROM products WHERE 1"; // Lấy tất cả sản phẩm
    if ($search != "") {
        $sql .= " AND product_name LIKE '%$search%'";
    }
    if ($category_id != 0) {
        $sql .= " AND category_id = $category_id";
    }
    $sql .= " ORDER BY id ASC"; 
    $productList = pdo_query($sql);
    return $productList;
}
function all_products()
{
    $sql = "SELECT * FROM products WHERE 1 ORDER BY id DESC"; // Lấy tất cả sản phẩm theo thứ tự giảm dần
    $productList = pdo_query($sql);
    return $productList;
}
function product_add($product_name, $product_price, $product_discount, $imageName, $product_quantity, $product_date, $product_status, $product_detail, $category_id)
{
    $sql = "INSERT INTO products(product_name,price,discount,image,quantity,date,status,detail,category_id) VALUES('$product_name', '$product_price', '$product_discount', '$imageName', '$product_quantity', '$product_date', '$product_status', '$product_detail', '$category_id')";
    pdo_execute($sql);
}


function product_update($id, $product_name, $product_price, $product_discount, $image_tmp, $imageName, $product_quantity, $product_date, $product_status, $product_detail, $category_id)
{
    if ($image_tmp == "") {
        $sql = "UPDATE products SET product_name = '$product_name', price = $product_price, discount = $product_discount, quantity = $product_quantity, date = '$product_date', status = $product_status, detail = '$product_detail', category_id = $category_id WHERE id = '$id'";
    } else {
        $sql = "UPDATE products SET product_name = '$product_name', price = $product_price, discount = $product_discount, image = '$imageName', quantity = $product_quantity, date = '$product_date', status = $product_status, detail = '$product_detail', category_id = $category_id WHERE id = '$id'";
    }
    pdo_execute($sql);
}
//Khi click xem chi tiết sản phẩm thì tăng lượt xem lên 1
function product_view($id)
{
    $sql = "UPDATE products SET view = view + 1 WHERE id = $id";
    pdo_execute($sql);
}
function product_delete($id)
{
    $sql = "DELETE FROM cart WHERE product_id = $id";
    pdo_execute($sql);
    $sql = "DELETE FROM comments WHERE product_id = $id";
    pdo_execute($sql);
    $sql = "DELETE FROM products WHERE id = $id";
    pdo_execute($sql);
}

function product_total()
{
    $sql = "SELECT count(*) FROM products";
    $product_total = pdo_query_value($sql);
    return $product_total;
}


//Hiện thị chi tiết sản phẩm
function product_detail($id)
{
    $sql = "SELECT * FROM products WHERE id = $id";
    $productDetail = pdo_query_one($sql);
    return $productDetail;
}
//Hiển thị các sản phẩm cùng loại
function product_same_category($id, $category_id)
{
    $sql = "SELECT * FROM products WHERE id != $id AND category_id = $category_id "; // Lấy tất cả sản phẩm khác id và cùng loại
    $productSameCategory = pdo_query($sql);
    return $productSameCategory;
}
//Kiểm tra tên sản phẩm đã tồn tại chưa
function product_check_name($product_name)
{
    $sql = "SELECT count(*) FROM products WHERE product_name = '$product_name'";
    $product_check_name = pdo_query_value($sql);
    return $product_check_name;
}


function product_new()
{
    $sql = "SELECT * FROM products WHERE 1 ORDER BY id DESC LIMIT 0,4";
    $productList = pdo_query($sql);
    return $productList;
}
// Hiển thị top 10 sản phẩm có lượt xem nhiều nhất
function product_top10()
{
    $sql = "SELECT * FROM products WHERE 1 ORDER BY view DESC LIMIT 0,10";
    $productList = pdo_query($sql);
    return $productList;
}
function all_products_pagination($start, $limit)
{
    $sql = "SELECT * FROM products WHERE 1 ORDER BY id DESC LIMIT $start, $limit";
    $productList = pdo_query($sql);
    return $productList;
}
