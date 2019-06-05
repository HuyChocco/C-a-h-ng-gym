<?php
session_start();
include("controller/c_gymstore.php");
$c_gymstore=new C_GYMSTORE();
$noidung=$c_gymstore->index();
$slides=$noidung['slides'];
$tabnames=$noidung['tabnames'];
$sanpham=$noidung['sanpham'];
$danhmuc=$noidung['danhmuc'];
if(isset($_SESSION['products']))
//print_r($_SESSION['products']);
$return_url=base64_encode($_SERVER["REQUEST_URI"]);
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="public/css/dropdownwithnav.css">
<link rel="stylesheet" href="public/css/slide.css">
<link rel="stylesheet" href="public/css/cardcss.css">
<link rel="stylesheet" href="public/css/tab.css">
<link rel="stylesheet" href="public/css/tooltip.css">
<link rel="stylesheet" href="public/css/loginform.css">
<link rel="stylesheet" href="public/css/modal.css">
<script src="public/js/tabjs.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="public/js/slidejs.js"></script>

<style>

* {
    box-sizing: border-box;
}

body{
    background-color: #f2f2f2
}
.row::after {
    content: "";
    clear: both;
    display: table;
}
[class*="col-"] {
    float: left;
    padding: 15px;
}
html {
    font-family: "Lucida Sans", sans-serif;
}
.header {
    background-color: white;
    color: #000000;
    max-height: 90px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}
.menu ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
.menu li {
    padding: 8px;
    margin-bottom: 7px;
    background-color: #4d4d00;
    color: #ffffff;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}
.menu li:hover {
    background-color: #333300;
}
.aside {
    background-color: #33b5e5;
    padding: 15px;
    color: #ffffff;
    text-align: center;
    font-size: 14px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}
.footer {
    background-color: #333300;
    color: #ffffff;
    text-align: center;
    font-size: 12px;
    padding: 15px;
}
/* For mobile phones: */
[class*="col-"] {
    width: 100%;
     
}

@media only screen and (min-width: 600px) {
    /* For tablets: */
    .col-s-1 {width: 8.33%;}
    .col-s-2 {width: 16.66%;}
    .col-s-3 {width: 25%;}
    .col-s-4 {width: 33.33%;}
    .col-s-5 {width: 41.66%;}
    .col-s-6 {width: 50%;}
    .col-s-7 {width: 58.33%;}
    .col-s-8 {width: 66.66%;}
    .col-s-9 {width: 75%;}
    .col-s-10 {width: 83.33%;}
    .col-s-11 {width: 91.66%;}
    .col-s-12 {width: 100%;}
    .nav-item{
        display: none;
    }
    .navbar-form{
        display: none;
    }
   .navbar li {
    float: left;
    }

}
@media only screen and (min-width: 768px) {
    /* For desktop: */
    .col-1 {width: 8.33%;}
    .col-2 {width: 16.66%;}
    .col-3 {width: 25%;}
    .col-4 {width: 33.33%;}
    .col-5 {width: 41.66%;}
    .col-6 {width: 50%;}
    .col-7 {width: 58.33%;}
    .col-8 {width: 66.66%;}
    .col-9 {width: 75%;}
    .col-10 {width: 83.33%;}
    .col-11 {width: 91.66%;}
    .col-12 {width: 100%;}
    .nav-item{
        display: block;
    }
    .navbar-form{
        display: block;
    }
       .navbar li {
    float: left;
    }

}
</style>

</head>
<body>


<div class="header">
  <div class="row">
    <div class="col-1 col-s-1">
      <a href=""><img src="public/img/logo.jpg" alt="Không thấy hình" width="60px" height="60px"></a>
    </div>
    <div class="col-2 col-s-2">
      <div class="dropdown">
      <button class="dropbtn" style="background:white;color: grey">Danh mục 
      <i class="fa fa-bars"></i>
      </button>
      <div class="dropdown-content">
      <div class="header">
        <h2></h2>
      </div> 
      <div class="row">
      	<?php
      	foreach ($danhmuc as $dm) {
      		?>
      		 <div class="column">
             <h3><?=$dm->tendanhmuc?></h3>
      		<?php
      		$cacdanhmuc=explode(',', $dm->danhmuc);
      		if($cacdanhmuc!=null){
      		foreach ($cacdanhmuc as $key => $value) {
      			?>
      			<a href="#" style="font-size: 15px"><?=$value?></a>
      			<?php
      		}}?>
      		</div>
      		<?php
      	}

      	?>
        
        
       
        
         </div>
      </div>
      </div> 
    </div>
    <div class="col-6 col-s-6">
      <form class="example" action="search_page.php">
      <input type="text" placeholder="Tìm kiếm sản phẩm..." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
    <div class="col-3 col-s-3">
      
      <div class="" style="">
      <a  style="font-size: 15px;color: grey;margin-right: 10px;cursor: pointer;" onclick="document.getElementById('id02').style.display='block'">ĐĂNG KÍ</a>
      <a  style="font-size: 15px;color: red;cursor: pointer; " onclick="document.getElementById('id01').style.display='block'" >
      ĐĂNG NHẬP</a>
      <a  style="cursor: pointer;margin-left: 10px;"><img src="public/img/cart-icon.png" alt="" width="40px" height="40px">
      </a>
      </div>
      
      <!-- The Modal -->
      <div id="id01" class="modal">
      <span onclick="document.getElementById('id01').style.display='none'" 
      class="close" title="Close Modal">&times;</span>

      <!-- Modal Content -->
      <form class="modal-content animate" action="./login.php" method="POST">
      <div class="imgcontainer">
      <p>Đăng nhập bằng email</p>
      <span id="messageLogin" style=" "></span>
      </div>

      <div class="container">
     
      <input onkeyup="validate(this.value)"  type="text" style="border-radius: 12px;" placeholder="Nhập email..." name="email"  required>
      
      <input  type="password" style="border-radius: 12px;" placeholder="Nhập mật khẩu..." name="pass" required>
      
      <button type="submit" style="border-radius: 12px;" >ĐĂNG NHẬP</button>
      <label>
      <input type="checkbox" checked="checked" name="remember"> Ghi nhớ
      </label>

      </div>

      <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn" style="border-radius: 12px;">Hủy bỏ</button>
      <span class="psw">Quên <a href="#" style="font-size: 16px;color: #4CAF50">mật khẩu?</a></span><br>
      <span>Bạn chưa có tài khoản? <a onclick="document.getElementById('id02').style.display='block';document.getElementById('id01').style.display='none';" style="font-size: 16px;color: #4CAF50;cursor: pointer;">Đăng kí</a></span>
      </div>
      </form>
      </div>

      <!-- The Modal -->
      <div id="id02" class="modal">
      <span onclick="document.getElementById('id02').style.display='none'" 
      class="close" title="Close Modal">&times;</span>

      <!-- Modal Content -->
      <form class="modal-content animate" action="./signup.php" method="POST">
      <div class="imgcontainer">
      <p>Đăng ký bằng email</p>
      <span id="messageLogin" style=" "></span>
      </div>

      <div class="container">
     
      <input onkeyup="validate(this.value)"  type="text" style="border-radius: 12px;" placeholder="Nhập họ tên..." name="hoten"  required>
      <input onkeyup="validate(this.value)"  type="text" style="border-radius: 12px;" placeholder="Nhập email..." name="email"  required>
      <input  type="password" style="border-radius: 12px;" placeholder="Nhập mật khẩu..." name="pass" required>
      
      <button type="submit" style="border-radius: 12px;" >ĐĂNG KÝ</button>
      
      </div>

      <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn" style="border-radius: 12px;">Hủy bỏ</button>
     
      <span>Bạn đã có tài khoản? <a onclick="document.getElementById('id01').style.display='block';document.getElementById('id02').style.display='none'" style="font-size: 16px;color: #4CAF50;cursor: pointer;">Đăng nhập</a></span>
      </div>
      </form>
      </div>
      <script>
      // Get the modal
      var modal1 = document.getElementById('id01');
      var modal2 = document.getElementById('id02');
      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
      if (event.target == modal1) {
        modal1.style.display = "none";
      }
     if (event.target == modal2) {
       modal2.style.display = "none";
      }
      }
      </script>
      <?php
if(isset($_SESSION["login"]))
{
	

  if($_SESSION["login"]=="login_fail")
  {
    echo '<script type="text/javascript">
 
    document.getElementById("id01").style.display="block";
    document.getElementById("messageLogin").innerHTML="Sai tài khoản hoặc mật khẩu. Bạn vui lòng đăng nhập lại!";
    document.getElementById("messageLogin").style="background-color:#ff4d4d;color: white; border-left: 6px solid grey;padding: 10px;border-radius: 12px";
</script>';
  }
 
}


//session_destroy();


?>
    </div>
  </div>
  
  <!-- <div class="dropdown-content-picture"> 
   <img src="logo.jpg" alt="Cinque Terre" width="300" height="200" >
    <div class="desc">Logo</div> 
  </div>-->

</div>
<div class="row">
<div class="slideshow-container pictureMove">
<?php
for($i=0;$i<count($slides);$i++)
{
	?>
  <div class="mySlides">
    
    <img src="public/img/<?=$slides[$i]->tenkhongdau?>" width="300" height="200" >
    
  </div>
	<?php
}
?>
  <!-- Full-width images with number and caption text -->

  <!-- Next and previous buttons -->
  
</div>
<br>

<!-- The dots/circles -->

</div>
<script>
var slideIndex = 0;
showSlides();
</script>      
<div class="tab">
<div class="row">
<div class="col-12 col-s-12">
	<?php
	for($i=0;$i<count($danhmuc);$i++)
	{
		if($i==0)
		{

			?>

 <button class="tablink" onclick="openPage('<?=$danhmuc[$i]->tendanhmuc?>', this)" id="defaultOpen"><?=$danhmuc[$i]->tendanhmuc?></button>
		<?php
		}
		else
		{
			?>
		 <button class="tablink" onclick="openPage('<?=$danhmuc[$i]->tendanhmuc?>', this)" ><?=$danhmuc[$i]->tendanhmuc?></button>

		<?php
		}
		
	}
	?>
   
</div>      
</div>
	<?php

	foreach ($sanpham as $sp) {
		?>
	  <div id="<?=$sp->tendanhmuc?>" class="tabcontent">
      <div class="row">
      <div class="col-12 col-s-12">
      	<?php
      	$cacsanpham=$sp->sanpham;
      	if($cacsanpham!=null){
      	$sps=explode(',',$cacsanpham);
      	//print_r($sp);
      	foreach ($sps as $value) {
      		list($idsp,$tenloaisp,$tensp,$gia,$soluong,$hinh,$tenspkhongdau)=explode(':', $value);
      		?>
      <div class="card">
     <!-- <form action="" method="POST">
      	<input type="hidden" name="idsp" value="<?=$idsp?>">
      	<input type="hidden" name="soluongsp" value="<?=$soluong?>">
      	<input type="hidden" name="return_url" value="'.$return_url'">-->
      <a href="./sanpham.php?<?=$tenspkhongdau?>&id=<?=$idsp?>"><img src="public/img/<?=$hinh?>" alt="John" style="width:40%;height: 40%"></a>
      <h1><?=$tensp?></h1>
      <p class="title"><?=$gia?> đ</p>
      		<?php
      		if($soluong>0)
      			{
      				?>

      		<div><a href="cart_update.php?soluongsp=1&idsp=<?=$idsp?>&gia=<?=$gia?>&current_url=<?=$return_url?>" style="cursor: pointer;"><img src="public/img/cart-icon.png" width="40px" height="40px" style="position: relative;left: 10px;  float: left;"></a>
      		 <p style="position:relative;left: 30px;top: 10px;color: green">Còn hàng</p>
      </div>
      <!--</form>-->
      </div>
      		<?php
      	}
      	else
      	{
      		?> 
      		<div><a href="" style="cursor: pointer;"><img src="public/img/cart-icon.png" width="40px" height="40px" style="position: relative;left: 10px;  float: left;"></a>
      		<p style="position:relative;left: 30px;top: 10px;color: red">Hết hàng</p>
      </div>
      </form>
      </div><?php
      	}}
      	}
      	
      	?>
      
  
      </div>
      </div>
    </div>

		<?php
	}
	?>
    
    <script type="text/javascript">
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
    </script>


</div>


 
<div class="footer">
  <p>Nguyễn Thành Nghĩa</p>
</div>

</body>
</html>
