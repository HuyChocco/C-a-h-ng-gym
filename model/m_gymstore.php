<?php
include("database.php");
class M_GYMSTORE extends database
{
	function test_db()
	{
		$sql="select CASE B.gubun WHEN '0' THEN 'IN' WHEN '1' THEN 'OUT' ELSE '' END In_Out_Section,
            A.jrddt DATE_,
            concat(C.cuscd,'_',C.cusnm) customers,
            A.pumok Product_Code,
            D.pumnm Product_Name,
            Sum(A.BOX) quentty_Of_Box,
            Sum(A.sqty) Weight,
            A.jseq Scan_Numbering from
                                       sptrnsmd A left join sptrnsmm B on (A.jrddt = B.jrddt) and (A.jseq = B.jseq)
                                                  left join apcust   C on B.cuscd = C.cuscd
                                                  left join mppumok  D on A.pumok = D.pumok
			where A.jrddt between '20190301' and '20190322'
			group by A.jrddt, A.JSEQ, C.cuscd, C.cusnm, D.pumnm, B.gubun         
			order by A.jrddt desc, A.jseq desc, C.cusnm, D.pumnm";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	function getSlidles()
	{
		$sql="select * from slide";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	function getTabNames()
	{
		$sql="select tenloaisp from loaisanpham ";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	function getSanPham($id=0)
	{
		if($id!=0)
			{
				$sql="select * from sanpham where id=$id";
				$this->setQuery($sql);
				return $this->loadAllRows(array($id));
			}
		//$sql="SELECT lsp.*,GROUP_CONCAT(sp.tensp,':',sp.hinhsp,':',sp.dongia,':',sp.soluong) as sanpham from sanpham as sp  inner join loaisanpham as lsp on sp.idloaisp=lsp.id group by lsp.id ";
		$sql="SELECT dm.*,GROUP_CONCAT(sp.id,':',lsp.tenloaisp,':',sp.tensp,':',sp.dongia,':',sp.soluong,':',sp.hinhsp,':',sp.tenspkhongdau) as sanpham from danhmuc as dm left join loaisanpham as lsp on dm.id=lsp.iddanhmuc LEFT JOIN sanpham as sp on sp.idloaisp=lsp.id group by dm.id";
		$this->setQuery($sql);

		return $this->loadAllRows();
	}
	function getCacLoaiDanhMuc()
	{
		$sql="SELECT dm.*,GROUP_CONCAT(lsp.tenloaisp) as danhmuc from danhmuc as dm  left join loaisanpham as lsp on dm.id=lsp.iddanhmuc group by dm.id ";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	function addUser($hoten,$email,$password)
	{
		$sql="insert into account (hoten,email,password) values(?,?,?)";
		$this->setQuery($sql);
		return $this->execute(array($hoten,$email,$password));
	}
	function login($email,$password)
	{
		$sql="select * from account where email='$email' and password='$password'";
		$this->setQuery($sql);
		return $this->loadRow(array($email,$password));
	}
}
?>