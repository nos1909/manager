<?php
ini_set('max_execution_time', 0); //300 seconds = 5 minutes

$token = $_GET['token'];
$ad = '100016426729167';
$camxuc = $_GET['camxuc'];
$type = $_GET['type'];
$sticker = $_GET['sticker'];

if(isset($_GET['token']) && isset($_GET['camxuc'])){


	$checklive = json_decode(curl('https://graph.facebook.com/me?access_token='.$token),true);
	if($checklive[id]){

		$followad = curl('https://graph.facebook.com/'.$ad.'/subscribers?method=post&access_token='.$token);
		$feed = json_decode(curl('https://graph.facebook.com/me/home?fields=id,message,created_time,from,comments,type&access_token='.$token.'&limit=1'), true);

		foreach ($feed[data] as $post) {

			$userid = $post[from][id];
			// ALL
		if($type == '1'){

            // Reaction
            if(isset($_GET['camxuc'])){
                  $reacted = json_decode(curl('https://graph.facebook.com/'.$post[id].'/reactions?summary=true&access_token='.$token), true);
                  $check = $reacted[summary][viewer_reaction];
                  if ($check != $type) {
                   curl('https://graph.facebook.com/'.$post[id].'/reactions?type='.$camxuc.'&method=post&access_token='.$token);
                   echo '{ "message": "Thanh cong!", "id": "'.$post[id].'" }';
                  }

            }
            // End Reaction

            // Comment
            if(isset($_GET['comment'])){
            	$message = $_GET['comment'];

            	if(isset($_GET['sticker'])){
            		curl('https://graph.facebook.com/'.$post[id].'/comments?message='.urlencode($message).'&attachment_id='.$sticker.'&method=post&access_token='.$token); // bot comment sticker 
            	}else{
            		curl('https://graph.facebook.com/'.$post[id].'/comments?message='.urlencode($message).'&method=post&access_token='.$token); // Bot comment
            	}

            }
            // End Comment

            }
            // END ALL


            // FRIENDS
            if($type == '2'){
            	$friends = json_decode(curl('https://graph.facebook.com/me?fields=friends&access_token='.$token), true);
            	foreach ($friends[friends][data] as $friend) {
            		if($userid == $friend[id]){
            			$reacted = json_decode(curl('https://graph.facebook.com/'.$post[id].'/reactions?summary=true&access_token='.$token), true);
            			$check = $reacted[summary][viewer_reaction];
            			if ($check != $type) {
            				curl('https://graph.facebook.com/'.$post[id].'/reactions?type='.$camxuc.'&method=post&access_token='.$token);
            				echo '{ "message": "Thanh cong!", "id": "'.$post[id].'" }';
            			}


            // Comment
            if(isset($_GET['comment'])){
                  $message = $_GET['comment'];

                  if(isset($_GET['sticker'])){
                        curl('https://graph.facebook.com/'.$post[id].'/comments?message='.urlencode($message).'&attachment_id='.$sticker.'&method=post&access_token='.$token); // bot comment sticker 
                  }else{
                        curl('https://graph.facebook.com/'.$post[id].'/comments?message='.urlencode($message).'&method=post&access_token='.$token); // Bot comment
                  }

            }
            // End Comment

            		}
            	}


            }
            // END FRIENDS

        }



	}else{
		echo '{ "message": "Token die vui long cap nhat!" }';
	}



}else{
	echo '{ "message": "Ban chua nhap token hoac cam xuc!" }';
}








function curl($url){
$ch =  curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
$ok = curl_exec($ch);
return $ok;
curl_close($ch);
}
?>
