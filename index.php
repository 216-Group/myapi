<?php

header("Content-type: application/json");

require("connect.php");
require("functions.php");

$method = $_SERVER['REQUEST_METHOD'];

$q = $_GET["q"];
$params = explode("/", $q);

$type = $params[0];
$id = $params[1];

if ($method === "GET"){
    if ($type === "posts"){
    
        if (isset($id) and $id != ""){
            getPost($connect, $id);
        }
        else{
        getPosts($connect);    
        }
    }
}

elseif ($method === "POST"){
    if ($type === "posts"){
        addPost($connect, $_POST);
    }
}

elseif ($method === "PUT"){
    
}

elseif ($method === "DELETE"){
    
}
