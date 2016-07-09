<?php


$app->get('/mockapis/posts(/:id)', function($postID = null) {
    
    
    $response = array();
    $response['success'] = false;
    
    if(!isset($postID)) {
        
        $posts = array();
        
        $postDetails = array();
        
        $postDetials['postID'] = 123124;
        $postDetails['timestamp'] = 1416452343;
        $postDetails['postAuthor'] = 1337;
        $postDetails['postTitle'] = 'Hello World';
        $postDetails['postText'] = 'First post!';
        array_push($posts, $postDetails);
        
        $postDetials['postID'] = 123125;
        $postDetails['timestamp'] = 1416452453;
        $postDetails['postAuthor'] = 1337;
        $postDetails['postTitle'] = 'Hello Again';
        $postDetails['postText'] = 'Second post!';
        array_push($posts, $postDetails);
        
        $postDetials['postID'] = 123126;
        $postDetails['timestamp'] = 1416452563;
        $postDetails['postAuthor'] = 1337;
        $postDetails['postTitle'] = 'Hi World';
        $postDetails['postText'] = 'Third post!';
        array_push($posts, $postDetails);
        
        $response['posts'] = $posts;
        
        $response['details'] = 'Posts found';
        $response['success'] = true;
    } else {
        
        if($postID == 123123) {
            
            $postDetails = array();
        
            $postDetials['postID'] = 123127;
            $postDetails['timestamp'] = 1416454343;
            $postDetails['postAuthor'] = 1211;
            $postDetails['postTitle'] = 'Hello John!';
            $postDetails['postText'] = 'I\'m Susan!';
            
            $response['postDetails'] = $postDetails;
            $response['details'] = 'Post found';
            $response['success'] = true;
        } else {
            
            $response['details'] = 'Post not found';
            $response['success'] = false;
        }
        
    }
    
    echo json_encode($response);
});



$app->post('/mockapis/posts', function() use ($app) {
    
    $response = array();
    
    $postText = $app->requests->post('postText');
    $postTime = $app->requests->post('timestamp');
    $postTitle = $app->request->post('title');
    $postAuthor = $app->request->post('authorID');
    
    $response['success'] = false;
    
    if(!isset($postAuthor) || !isset($postText) || !isset($postTime) || !isset($postTitle)) {
        
        $response['postDetails'] = null;
        $repsonse['details'] = 'One or more fields are missing';
        $response['success'] = false;
    } else {
        
        $postDetails = array();
        $postDetials['postID'] = 123124;
        $postDetails['timestamp'] = time.getdate();
        $response['postDetails'] = $postDetails;
        $response['details'] = 'Post created successfully';
        $response['success'] = true;
    }
    
    echo json_encode($response);
});


?>