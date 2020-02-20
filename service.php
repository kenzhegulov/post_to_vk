<?php
include 'classes/classe.vkfriends.php';

$vkf = new VkFriends;

$date = $vkf->clean_var($_POST["date"]);
$month = $vkf->clean_var($_POST["month"]);
$limit = $vkf->clean_var($_POST["limit"]); 
$message = $_POST["message"]; 



if(($date!='')&&($month!='')&&($limit!='')){
    echo '<div id="block">';
//  print($message);  
    $users = $vkf->get_users($date, $month, $limit);//getting friends list from user with u_id
    if($users!=''){
//        print_r($users);
        $vkf->view_users_info($users, $message);
        
    }else{		
	print("<center><h2 class='error'>Поиск не дал результатов</h2></center>");
    }
    echo '</div>';	
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

