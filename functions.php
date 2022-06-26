<?php

function getPosts($connect){
    $posts = mysqli_query($connect, "SELECT * FROM `posts`");

    while($post = mysqli_fetch_assoc($posts)){
        $postsList[] = $post;
    }

    echo(json_encode($postsList));
}

function getPost($connect, $id){
    $post = mysqli_query($connect, "SELECT * FROM `posts` WHERE id=".$id."");

    if (mysqli_num_rows($post) === 0){
        http_response_code(404);
        $res = [
            "status" => false,
            "message" => "post not found"
        ];
        echo(json_encode($res));
    }
    else{
    $post = mysqli_fetch_assoc($post);
    echo(json_encode($post));
    }
}

function addPost($connect, $data){
    http_response_code(201);
    $title = $data["title"];
    $body = $data["body"];
    mysqli_query($connect, "INSERT INTO `posts` (`id`, `title`, `body`) VALUES (NULL, '$title', '$body');");
    
    $res = [
        "status" => true,
        "post_id" => mysqli_insert_id($connect),
    ];
    echo(json_encode($res));
}
