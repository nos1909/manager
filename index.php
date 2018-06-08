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
  <link rel="stylesheet" href="../css/sweetalert.css">
  <style type="text/css">
  	.panel-primary>.panel-heading {
  	color: #f00;
  	font-size: 14px;
  	background-color: rgba(0,0,0,.0001);
  	}
  	.btn-danger {
    color: #ff0707;
    background-color: rgba(255,255,255,.15);
    border-color: #d43f3a;
}
.btn-success {
    color: #00ff2d;
    background-color: rgba(255,255,255,.1);
    border-color: #4cae4c;
}
.btn-warning {
    color: #fd9866;
    background-color: rgba(255,255,255,.1);
    border-color: #eea236;
}
  </style>

</head>
<body>
 
<div class="container">
	<br /><br />
<div class="panel panel-primary">
      <div class="panel-heading"><b>Menu Cài Đặt Bot Miễn Phí - NosApp</b></div>
      <div class="panel-body"><center><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#lay_token">Hướng Dẫn Lấy Token</button>   <button type="button" class="btn btn-success" data-toggle="modal" data-target="#lay_id_sticker">Hướng Dẫn Lấy ID Sticker</button>   <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#cron_job">Hướng Dẫn Cron Job</button></center><hr>    
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
  <option value="1">Tất Cả</option>
  <option value="2">Bạn Bè</option>
</select>
</div>
<button type="submit" class="btn btn-danger" id="button_login">Lấy Link Cron</button>
</form>
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
            swal("Thông Báo!", "Bạn chưa nhập token!");
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
                        swal("Thông Báo!", "Token Die! Vui lòng cập nhật lại!");
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
      <div class="panel-heading"><b>Link Cron</b></div>
      <div class="panel-body"> 
      <div id="content"></div>

</div>
    </div>


<!-- Modal Lay Token -->
<div id="lay_token" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Hướng Dẫn Lấy Token Trên Máy Tính</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal Lay ID Sticker -->
<div id="lay_id_sticker" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal Cron Job -->
<div id="cron_job" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script src="../js/sweetalert.js"></script>
<script src="../js/sweetalert.custom.js"></script>
</body>
</html>
