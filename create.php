<?php
session_start();

$dm = 'https://nosapp.herokuapp.com/';
if($_POST)
{
    //neu dang nhap dung
    $checklive = json_decode(curl('https://graph.facebook.com/me?access_token='.$_POST['token']),true);
    if($checklive['id'])
    {
    $token = $_SESSION['token'] = trim($_POST['token']);
    $type = trim($_POST['type']);
    $comment = trim($_POST['comment']);
    $camxuc = trim($_POST['camxuc']);
    $sticker = trim($_POST['sticker']);
?>
<div class="form-group">
  <label for="usr">Link Cron:</label>
  <input type="text" class="form-control" id="token" name="token" value="<?php echo $dm.'cron.php?token='.$token.'&camxuc='.$camxuc.'&comment='.$comment.'&type='.$type.'&sticker='.$sticker; ?>">
</div>
<button type="submit" class="btn btn-danger" id="copy_linl">Copy Link</button>
<?php
    }else{
        //neu dang nhap sai
        echo 'false';
    }
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
