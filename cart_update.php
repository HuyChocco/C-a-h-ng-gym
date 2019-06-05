<?php
session_start();

include("controller/c_gymstore.php");

$c_gymstore=new C_GYMSTORE();
$return_url=base64_decode($_GET["current_url"]);
$id_sp=$_GET["idsp"];
$soluong=$_GET["soluongsp"];
$noidung=$c_gymstore->sanpham($id_sp);
$sanpham=$noidung['sanpham'];
$new_product=array(array('tensp'=>$sanpham[0]->tensp,
'id'=>$sanpham[0]->id,'soluong'=>$soluong,
'dongia'=>$sanpham[0]->dongia
));

if($sanpham!=null){
	// Đã có sản phẩm trong giỏ
if(isset($_SESSION['products']))
{
	
	
	$found=false;//Flag tìm kiếm

	foreach ($_SESSION["products"] as $cart_item) {
		if($cart_item["id"]==$id_sp){
			$product[] = array('tensp'=>$cart_item['tensp'],'id'=>$cart_item['id'],
			'soluong'=>$cart_item['soluong']+1,'dongia'=>$cart_item['dongia']);
			
			$found=true;// Đã thấy			


		}else
		{
			$product[] = array('tensp'=>$cart_item['tensp'],
			'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'dongia'=>$cart_item['dongia']);

		}

	}//Kết thúc vòng lặp
	if($found==false)
	{
		// Gộp vào mảng cũ nếu sản phẩm mới
		$_SESSION["products"]=array_merge($new_product,$product);
		
	}
	else
	{
		// Cập nhật mảng cũ nếu sản phẩm đã tồn tại
		$_SESSION["products"]=$product;
	}
}
else
{
//Chưa có sản phầm nào trong giỏ hàng thì khởi tạo 
	$_SESSION['products']=$new_product;
}
}


header('Location:'.$return_url);// Giữ nguyên trang hiện tại


?>