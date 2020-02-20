<!DOCTYPE html>
<html>

<head>
	<meta name="description" content="Найти общих друзей разных людей">
	<meta name="keywords" content="общие друзья, вконтакте друзья, друзья разных людей">
	<meta name="author" content="Найти общих друзей разных людей">
	<meta charset="UTF-8">

	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="http://malsup.github.com/jquery.form.js"></script> 
</head>

<body>

	<div id="main">
		<div id="inp">
<!--			<form id="myForm">
	
			    <input type="text" name="u1" id="u1" placeholder="User ID" onClick="this.select();">
				<input type="text" name="u2" id="u2" placeholder="User ID" onClick="this.select();" class="right">

			</form>-->
                    
                    <!--Страна и город выбраны по умлочанию. Изменить их в данное время не возможно.-->
                    
                        <form id="userSearch">
                            <div class="com">
                                <p class="label">СТРАНА</p>
                                <input type="text" name="country" id="country" disabled="true" value="Казахстан"  style="width: 220px;">
                            </div>
                            <div class="com">
                                <p class="label">Город</p>
                                <input type="text" name="city" id="city" disabled="true" value="Алматы"  style="width: 220px;">
                            </div>
                            
                            <div class="com">
                                <label class="label">ДАТА РОЖДЕНИЯ</label>
                                <input type="text" name="date" id="date" placeholder="День" style="width: 100px;" required="true"><input type="text" name="month" id="month" placeholder="Месяц" class="right" style="width: 100px;">
                            </div>
                            <div class="com">
                                <p class="label">ЛИМИТ ПО КОЛИЧЕСТВУ РЕЗУЛЬТАТОВ</p>
                                <input type="text" name="limit" id="limit" placeholder="Макс. значение 1000" style="width: 220px;">
                            </div>
                            <div class="com">
                            <p class="label">ТЕКСТ СООБЩЕНИЯ</p>
                            <textarea name="message" id="message" placeholder="Запись которая будет опубликована на странице пользователей"  required></textarea>
                            </div>
                            <input type="button" id="submit" class="btn" value="Сделать поиск и добавить запись" onClick="choiceOf();">
			</form>
		</div>
		
		<div id="res">		
				<div id="content"></div>
		</div>		
	</div>
	
    <script>      
//        $(document).ready(function(){          
//            $('#u1,#u2').on('blur change focus focusin  mouseenter mouseleave', function() {  
//            var msg   = $('#myForm').serialize();
//                $.ajax({  
//                    type: "POST",  
//                    url: "main.php",  
//                    data: msg,  
//                    success: function(html){  
//                        $("#content").html(html);  
//                    }  
//                });  
//                return false;  
//            });  
//            
//        
//            
//        });
        
            function choiceOf(){
//                    var message   = $('#userSearch').serialize();
            var msg   = $('#userSearch').serialize();
//            alert(document.getElementById('date').value);
            if(!document.getElementById('date').value || !document.getElementById('month').value){
                alert('Заполните поле "Дата рождения"');
            }
            
          else if(!document.getElementById('limit').value){
                alert('Заполните поле "Лимит по количеству результатов"');
            }
            
           else if(!document.getElementById('message').value){
                alert('Заполните поле "Текст сообщения"');
            }
                     $.ajax({  
                    type: "POST",  
                    url: "service.php",  
                    data: msg,  
                    success: function(html){  
                        $("#content").html(html);  
                    }  
                });  
                return false;  
            }
    </script>  
    	
</body>
</html>
