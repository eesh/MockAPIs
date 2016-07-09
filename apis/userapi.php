<?php


$app->get('/mockapis/user(/:id(/:posts))', function($userID = null, $posts = null) {
    
    $response = array();
    $user = array();
    
    $response['success'] = false;
    if(!isset($userID) && !isset($posts)) {

            
        $user['name'] = 'John Doe';
        $user['username'] = 'IamGroot';
        $user['email'] = 'johndoe@xyz.com';
        $user['uID'] = 1337;
        $user['gender'] = 'Male';
        $user['postCount'] = 233;
        $user['followerCount'] = 32;
        $user['category'] = 'Photography';
        $user['interests'] = ['Music', 'Art', 'Dance', 'Vlogging'];
        $response['userDetails'] = $user;
        $response['details'] = 'User found';
        $response['success'] = true;

    } else {
        
        if(!isset($posts)) {
            
            $user['name'] = 'Susan Alexander';
            $user['username'] = 'SusieAlex';
            $user['email'] = 'susie_alexa@xyz.com';
            $user['uID'] = 1211;
            $user['gender'] = 'Female';
            $user['postCount'] = 543;
            $user['followerCount'] = 241;
            $user['category'] = 'Caligraphy';
            $user['interests'] = ['Music', 'Art', 'Dance', 'Vlogging'];
            $response['userDetails'] = $user;
            $response['details'] = 'User found';
            $response['success'] = true;
        } else {
            
            $postsList = array();
            array_push($postsList, 123127);
            
            $response['posts'] = $postsList;
            $response['details'] = 'Posts found';
            $response['success'] = true;
        }
    }
    
    echo json_encode($response);
    
});

$app->post('/mockapis/user(/:create)', function($create) use ($app) { 

    $email = $app->requests->post('email');
    $password = $app->requests->post('password');
    
    $response = array();
    
    if($email != null && $password != null) {
        
        if(!isset($create)) {
            
            if($email == 'johndoe@xyz.com' && $password = 'default') {
                
                $response['success'] = true;
                $response['details'] = 'Login successful';
            } else {
                
                $response['success'] = false;
                $response['details'] = 'Incorrect username or password';
            }
        } else {
            
            $response['details'] = 'User created successfully';
            $response['success'] = true;
        }
    } else {
        
        $response['success'] = false;
        $response['details'] = 'username or password field empty';
    }
    echo json_encode($response);
});



?>