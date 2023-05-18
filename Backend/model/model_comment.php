<?php
function add_comment($content, $rating,  $comment_imgName, $date_comment, $product_id, $account_id)
{
    $sql = "INSERT INTO comments(content, rating, comment_img, date_comment, product_id, account_id) VALUES ('$content', '$rating', '$comment_imgName', '$date_comment', '$product_id', '$account_id')";
    pdo_execute($sql);
}

function get_rating($rating)
{ 
    if ($rating == 1) {
        return "★☆☆☆☆";
    } else if ($rating == 2) {
        return "★★☆☆☆";
    } else if ($rating == 3) {
        return "★★★☆☆";
    } else if ($rating == 4) {
        return "★★★★☆";
    } else if ($rating == 5) {
        return "★★★★★";
    }
}
//Hiển thị danh sách comment theo  product_id , hiển thị cả thông tin của account
function list_comments($product_id)
{
    $sql = "SELECT * FROM comments INNER JOIN accounts ON comments.account_id = accounts.id WHERE product_id = $product_id ORDER BY date_comment DESC";
    return pdo_query($sql);
}

function list_comments_admin()
{
    $sql =
        "SELECT * FROM comments INNER JOIN accounts ON comments.account_id = accounts.id INNER JOIN products ON comments.product_id = products.id ORDER BY date_comment DESC";
    return pdo_query($sql);
}

function comment_delete($id)
{
    $sql = "DELETE FROM comments WHERE id_comment = $id";
    pdo_execute($sql);
}

function comment_total()
{
    $sql = "SELECT count(*) FROM comments";
    $comment_total = pdo_query_value($sql);
    return $comment_total;
}
//Đếm số lượng comment theo product_id
function comment_total_product($product_id)
{
    $sql = "SELECT count(*) FROM comments WHERE product_id = $product_id";
    $comment_total = pdo_query_value($sql);
    return $comment_total;
}

//Tính trung bình rating theo product_id
function rating_average($product_id)
{
    $sql = "SELECT AVG(rating) FROM comments WHERE product_id = $product_id";
    $rating_average = pdo_query_value($sql);
    return $rating_average;
}
