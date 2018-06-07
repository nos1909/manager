<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bot Cam Xuc By NosApp</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>

</head>
<body>
 
<div class="container">
  <center><h2>Cài Đặt Bot Cảm Xúc By NosTeam</h2></center>
  <div class="panel-group">
<div class="panel panel-primary">
      <div class="panel-heading">Cài Đặt Bot</div>
      <div class="panel-body">      
<form method="post" id="form_login">
<div class="form-group">
  <label for="token">Token:</label>
  <input type="text" class="form-control" id="token" name="token" placeholder="Nhập token của bạn!" <?php if($_SESSION['token']){ echo 'value="'.$_SESSION['token'].'"'; } ?> required>
</div>
<div class="form-group">
  <label for="camxuc">Cảm Xúc:</label>
  <select class="form-control" name="camxuc">
  <option value="LIKE">LIKE</option>
  <option value="LOVE">LOVE</option>
  <option value="HAHA">HAHA</option>
  <option value="WOW">WOW</option>
  <option value="SAD">SAD</option>
  <option value="ANGRY">ANGRY</option>
</select>
</div>
<div class="form-group">
  <label for="comment">Bình Luận:</label>
  <textarea type="text" class="form-control" id="comment" name="comment" style="resize: vertical;" rows="5" placeholder="Có thể không nhập!"></textarea>
</div>
<div class="form-group">
  <label for="sticker">ID Dãn Nhãn:</label>
  <input type="text" class="form-control" id="sticker" name="sticker" placeholder="Có thể không nhập!">
</div>
<div class="form-group">
  <label for="type">Loại:</label>
  <select class="form-control" name="type">
  <option value="1">Bạn Bè</option>
  <option value="2">Tất Cả</option>
</select>
</div>
<button type="submit" class="btn btn-danger" id="button_login">Lấy Link Cron</button>
</form>
</div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function()
{  
    //khai báo nút submit form
    var submit   = $("button[type='submit']");
     
    //khi thực hiện kích vào nút Login
    submit.click(function()
    {
        //khai báo các biến
        var token = $("input[name='token']").val(); //lấy giá trị input tài khoản
         
        //kiem tra xem da nhap tai khoan chua
        if(token == ''){
            alert('Vui lòng nhập Token');
            return false;
        }
         
        //lay tat ca du lieu trong form login
        var data = $('form#form_login').serialize();
        //su dung ham $.ajax()
        $.ajax({
        type : 'POST', //kiểu post
        url  : 'create.php', //gửi dữ liệu sang trang submit.php
        data : data,
        success :  function(data)
               {                       
                    if(data == 'false')
                    {
                        alert('Token die! Vui lòng cập nhật lại!');
                    }else{
                        $('#content').html(data);
                    }
               }
        });
        return false;
    });
});
</script>
<div class="panel panel-primary">
      <div class="panel-heading">Link Cron</div>
      <div class="panel-body"> 
      <div id="content"></div>

</div>
    </div>

</body>
</html>