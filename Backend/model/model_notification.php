<?php
function notification_list_all()
{
    $sql = "SELECT * FROM notifications ORDER BY id DESC";
    $notificationList = pdo_query($sql);
    return $notificationList;
}


function notification_info($id)
{  //Hàm lấy thông tin của 1 thông báo
    $sql = "SELECT * FROM notifications WHERE id = $id";
    $notificationInfo = pdo_query_one($sql);
    return $notificationInfo;
}

function insert_notification($bill_id,$user_name, $title, $content, $date, $imageSrc){
    $sql = "INSERT INTO notifications(bill_id,user_name,title, content, date,imageSrc) VALUES ($bill_id,'$user_name','$title', '$content', '$date','$imageSrc')";
    pdo_execute($sql);
}
function show_notification(){
    $sql = "SELECT * FROM notifications ORDER BY id DESC";
    $notificationList = pdo_query($sql);
    return $notificationList; 
}
function notification_delete($id)
{
    $sql = "DELETE FROM notifications WHERE id = '$id'";
    pdo_execute($sql);
}
