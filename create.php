<?php
session_start();

$dm = 'https://nosapp.herokuapp.com/';
if($_POST)
{
    //neu dang nhap dung
    $checklive = json_decode(curl('https://graph.facebook.com/me?access_token='.$_POST['token']),true);
    if($checklive[id])
    {
    $token = $_SESSION['token'] = trim($_POST['token']);
    $type = trim($_POST['type']);
    $comment = trim($_POST['comment']);
    $camxuc = trim($_POST['camxuc']);
    $sticker = trim($_POST['sticker']);
?>
<div class="form-group">
  <label for="usr">Link Cron:</label>
  <input type="text" class="form-control" name="link" id="link_cron" value="<?php echo $dm.'cron.php?token='.$token.'&camxuc='.$camxuc.'&type='.$type; if(isset($comment)){ echo '&comment='.$comment; } if(isset($sticker)){ echo '&sticker='.$sticker; } ?>">
</div>
<button class="btn btn-danger" id="copy_link" onclick="Copy_Link()">Sao Chép</button>
<button class="btn btn-success" id="copy_link" onclick="Run_Link()">Chạy Thử</button>
<script>
function Copy_Link() {
  var copyText = document.getElementById("link_cron");
  copyText.select();
  document.execCommand("copy");
  swal("Sao Chép Thành Công!", "Hãy cron-job để bot hoạt động nhé <3", "success");
}
swal("Thành Công!", "Bạn đã tạo thành công bot tương tác vui lòng sao chép liên kết và cron-job để bot hoạt động!", "success")
</script>
<script>
function Run_Link() {
	var Link = document.getElementById("link_cron");
    window.open(Link.value);
}
</script>
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
