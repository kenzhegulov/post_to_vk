<?php
class VkFriends
{

    public function clean_var($var) {
    
         $var = strip_tags($var);
         $var = preg_replace('~\D+~', '', $var);        
         $var = trim($var);
         
         return $var;
    }
    
    public function get_friends($u_id) {
    
         $friends = file_get_contents('https://api.vk.com/method/friends.get?user_id='.$u_id);
		 $friends = json_decode($friends);
         
         if(!isset($friends->error)){
	         return $friends;
         }else{
	         return '';
         }
         
    } 
    
    public function get_users($date, $month, $limit) {
    
        $friends = file_get_contents('https://api.vk.com/method/users.search?birth_day='.$date.'&country=4&city=183&birth_month='.$month.'&count='.$limit.'&access_token=d017eeefde1f139b021b38e2ec0b48a3ad5c4af4265bbc1a7a79d4c3d6a3f678690816ec4b5c4b527775f&fields=photo_100');
        $friends = json_decode($friends);
         
         if(!isset($friends->error)){
	         return $friends;
         }else{
	         return '';
         }
         
    }
    
    public function mutual_friends($friends) {
    
         $mutual = array_intersect($friends[0]->response, $friends[1]->response);
         
         if(!empty($mutual)){
	         return $mutual;
         }else{
	         return '';
         }
         
    }
    
    public function get_users_info($users) {
    
         $u_ids = implode(",",$users);    
         $u_info = file_get_contents('https://api.vk.com/method/users.get?user_ids='.$u_ids.'&fields=photo_100');
         $u_info = json_decode($u_info);
         
         return $u_info;
    }     

    public function view_user_info($u_info) {
    if($u_info->uid) {
    	 $uid = $u_info->uid;
    	 $first_name = $u_info->first_name;
    	 $last_name = $u_info->last_name;
    	 $photo = $u_info->photo_100;
    	 
    	 print("
    	 <a href='http://vk.com/id$uid' target='_blank'>
    	 <div id='info'>
    	 
    	 	<div id='ava'>
    	 		<img src='$photo'>
    	 	</div>
    	 	
    	 	<div id='name'>
	    	 	$first_name <br/>
	    	 	$last_name
    	 	</div>
    	 </div>
    	 </a>
    	 ");
    }	
    }    
    
    public function view_users_info($users_info, $message='') {
    
    	for($i=0;$i<sizeof($users_info->response);$i++){
//    	 print($users_info->response[$i]->uid. ', ');
    		$this->view_user_info($users_info->response[$i]);
                if($message!='') {
            file_get_contents('https://api.vk.com/method/wall.post?owner_id='.$users_info->response[$i]->uid.'&message='.urlencode($message).'&access_token=d017eeefde1f139b021b38e2ec0b48a3ad5c4af4265bbc1a7a79d4c3d6a3f678690816ec4b5c4b527775f'); 
                }
    		
    	}
    
    }
    
}
/****
 * ПОИСК ЛЮДЕЙ
 * ***/

// Получение токена
//https://oauth.vk.com/authorize?client_id=5412964&display=page&redirect_uri=https://oauth.vk.com/blank.html&scope=friends&response_type=token&v=5.50


// Отправляем запрос на поиск людей
//https://api.vk.com/method/users.search?birth_day=13&country=4&city=183&birth_month=04&count=20&access_token=d735b3d6ea24518a97610de2869261179eb0be89d8b66d41be59fef643ca77a7cc463dd9e4b6711c7fd02


// Формирование токена
//https://oauth.vk.com/blank.html#access_token=d735b3d6ea24518a97610de2869261179eb0be89d8b66d41be59fef643ca77a7cc463dd9e4b6711c7fd02&expires_in=86400&user_id=331953658





// !!!!!!!!!!!! Отправляем запрос на публикацию записи на стене !!!!!!!!!!!!!!!
/**
 https://oauth.vk.com/authorize?client_id=5412964&display=page&redirect_uri=https://oauth.vk.com/blank.html&scope=friends,messages,notify,photos,docs,pages,ads,audio,video,notes,offers,wall,groups,offline&response_type=token&v=5.50

 https://oauth.vk.com/blank.html#access_token=27d258281e577c3e04d219a9344d7dcaadcbc35640f5779300e298418f02cb78c78ebba47aa17fae88755&expires_in=0&user_id=331953658


 https://api.vk.com/method/wall.post?owner_id=231987410&message=HELLOs&access_token=27d258281e577c3e04d219a9344d7dcaadcbc35640f5779300e298418f02cb78c78ebba47aa17fae88755
56162092
**/
?>