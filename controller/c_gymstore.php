<?php
include("model/m_gymstore.php");
class C_GYMSTORE 
{
	

	public function index()
	{
		$m_gymstore=new M_GYMSTORE();
		$slides=$m_gymstore->getSlidles();
		$tabnames=$m_gymstore->getTabNames();
		$sanpham=$m_gymstore->getSanPham();
		$danhmuc=$m_gymstore->getCacLoaiDanhMuc();
		return array('slides' =>$slides,'tabnames'=>$tabnames,'sanpham'=>$sanpham,'danhmuc'=>$danhmuc);
	}
	public function sanpham($id)
	{
		$m_gymstore=new M_GYMSTORE();
		$slides=$m_gymstore->getSlidles();
		$danhmuc=$m_gymstore->getCacLoaiDanhMuc();
		
		$sanpham=$m_gymstore->getSanPham($id);
		
		
		return array('slides' =>$slides,'sanpham'=>$sanpham,'danhmuc'=>$danhmuc);
	}
	public function signup($hoten,$email,$password)
	{
		$m_gymstore=new M_GYMSTORE();
		return $m_gymstore->addUser($hoten,$email,$password);
	}
	public function login($email,$password)
	{
		$m_gymstore=new M_GYMSTORE();
		return $m_gymstore->login($email,$password);
	}
}
?>