<?php
$conn = mysqli_connect('localhost','root','','firstProject');

function getCategory($conn, $id){
    $query = "SELECT * FROM category WHERE id = $id";
    $run = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($run);
    return $data['name'];
}


function getImagesByPost($conn, $id){
    $query = "SELECT * FROM images WHERE post_id = $id";
    $run = mysqli_query($conn, $query);
    // $data = array();

    // while($d= mysqli_fetch_assoc($run)){
    //     $data[] = $id;
    // }
    // return $data;
    return rand(1,5);
}

function getSubMenu($conn, $menu_id){
    $query = "SELECT * FROM submenu WHERE parent_menu_id = $menu_id";
    $run = mysqli_query($conn, $query);
    $data = array();

    while($d= mysqli_fetch_assoc($run)){
        $data[] = $d;
    }
    return $data;
}

// to find sub menu using dropdown
function getSubMenuNo($conn, $menu_id){
    $query = "SELECT * FROM submenu WHERE parent_menu_id = $menu_id";
    $run = mysqli_query($conn, $query);
    return mysqli_num_rows($run);
}

function getComments($db,$post_id){
    $query="SELECT * FROM comments WHERE post_id=$post_id ORDER BY id DESC";
    $run=mysqli_query($db,$query);
    $data = array();

    while($d=mysqli_fetch_assoc($run)){
        $data[]=$d;
    }
    return $data; 
}

?>