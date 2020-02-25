<?php
	include 'ConnectionDB/connectionDB.php';
	$db=new Database;
	$db->connect();
    
	require('Classes/PHPExcel.php');
	if(isset($_POST['btnthem']))
	{
        
		$file=$_FILES['file']['tmp_name'];
		$objReader= PHPExcel_IOFactory::createReaderForFile($file);
		$objReader->setLoadSheetsOnly('Sheet1');
		$objExcel=$objReader->load($file);
		$sheetData=$objExcel->getActiveSheet()->toArray('null',true,true,true);
		$highestRow=$objExcel->setActiveSheetIndex()->getHighestRow();
		for($row=3;$row<$highestRow;$row++)
		{
			$MaDe=$sheetData[$row]['A'];
			$MaHP=$sheetData[$row]['B'];
			$MaKhoaThi=$sheetData[$row]['C'];
			$CauSo=$sheetData[$row]['D'];
			$NDCauHoi=$sheetData[$row]['E'];
			$A=$sheetData[$row]['F'];
			$B=$sheetData[$row]['G'];
			$C=$sheetData[$row]['H'];
			$D=$sheetData[$row]['I'];
            $DapAn=$sheetData[$row]['J'];
            
            $sql="INSERT INTO cauhoi(MaDe,MaHP,MaKhoaThi,CauSo,NDCauHoi,A,B,C,D,DapAn) VALUES ('$MaDe','$MaHP','$MaKhoaThi','$CauSo','$NDCauHoi','$A','$B','$C','$D','$DapAn')";
            $db->execute($sql);
            
		} 
		echo "<script type='text/javascript'>alert('Bạn đã thêm câu hỏi thành công!');
												window.location='QuanLyCauHoi.php';
										</script>";
										exit;
		
    }
    else
    {
		echo null;
	}
		
?>

