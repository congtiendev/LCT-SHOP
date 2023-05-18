<?php
function category_list_all()
{ //Lấy danh sách loại sản phẩm 
    $sql = "SELECT * FROM category ORDER BY id ASC ";
    $categoryList = pdo_query($sql);
    return $categoryList;
}
//lấy ra danh sách loại sản phẩm theo id
function category_list_one($id)
{
    $sql = "SELECT * FROM category WHERE id = $id";
    $categoryListOne = pdo_query_one($sql);
    return $categoryListOne;
}
//Lấy  tên loại sản phẩm
function category_name($category_id)
{
    if ($category_id > 0) {
        $sql = "SELECT * FROM category WHERE id = $category_id";
        $categoryList = pdo_query_one($sql); //Chỉ lấy 1 dòng
        extract($categoryList);
        return $category_name;
    } else {
        return "";
    }
}



function category_add($category_name)
{
    if ($category_name != "") {
        $sql = "INSERT INTO category(category_name) VALUES ('$category_name')";
        pdo_execute($sql);
    } else {
        echo "<script>alert('Vui lòng nhập đầy đủ thông tin !')</script>";
    }
}

function category_update($id, $category_name)
{
    if ($category_name != "") {
        $sql = "UPDATE category SET category_name = '$category_name' WHERE id = $id";
        pdo_execute($sql);
    } else {
        echo "<script>alert('Vui lòng nhập đầy đủ thông tin !')</script>";
    }
}

function category_delete($id)
{ //Xóa loại sản phẩm
    $sql = "DELETE FROM products WHERE category_id = $id";
    pdo_execute($sql); 
    $sql = "DELETE FROM category WHERE id = $id";
    pdo_execute($sql);
}
//Chuyển category_id thành category_name
function category_id_to_name($category_id)
{
    $sql = "SELECT category_name FROM category WHERE id = $category_id";
    $category_name = pdo_query_value($sql);
    return $category_name;
}
function category_check($category_name)
{ //Kiểm tra loại sản phẩm đã tồn tại chưa
    $sql = "SELECT * FROM category WHERE category_name = '$category_name'";
    $categoryList = pdo_query($sql);
    return $categoryList;
}
function category_statistical()
{
    $sql = "SELECT category.id AS category_id, category.category_name AS category_name, count(products.id) AS count_product, min(products.price) AS min_price, max(products.price) AS max_price, avg(products.price) AS avg_price FROM category LEFT JOIN products ON category.id = products.category_id GROUP BY category.id";
    //AS là đặt tên cho cột
    //GROUP BY là nhóm theo category_id
    //LEFT JOIN là lấy tất cả các dòng của bảng category và chỉ lấy các dòng của bảng products có category_id tương ứng
    $statistical = pdo_query($sql);
    return $statistical;
}
