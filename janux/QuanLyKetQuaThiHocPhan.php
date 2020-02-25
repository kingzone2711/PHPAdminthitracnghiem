
<?php
	include 'ConnectionDB/connectionDB.php';
	$db=new Database;
	$db->connect();?>
<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Kết quả thi học phần</title>
    
    <?php include 'Css_Script.php';?>
	<!-- end: JavaScript-->
</head>
<body>

<!-- Header-->
    <?php include 'UcControl/UcHeader.php';?>
<!-- End: Header-->

<!-- Content-->
    <div class="container-fluid-full">
        <div class="row-fluid">
        <!-- Left-->
            <?php include 'UcControl/UcLeft.php';?>
        <!-- End: Left-->
       
        
        <div id="content" class="span10" style="min-height=247px;">
        <ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Quản lý sinh viên</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Kết quả thi học phần</a></li>
			</ul>
			<div class="HocPhan">
			<form method="POST" name="input" class="hocphan1">
			Tên lớp:	<select name="cartoon1">
				<?php 
				$table="lop"; 
				$data=$db->getAllData($table); 
				$i=1; 
				foreach($data as $value) {?> 
					<option value="<?php echo $value['MaLop']; ?>"><?php echo $value['TenLop']; ?></option>
				<?php 
				$i++; }?>
				</select>
				Tên học phần:	<select name="cartoon">
				<?php 
				$table="hocphan"; 
				$data=$db->getAllData($table); 
				$i=1; 
				foreach($data as $value) {?> 
					<option value="<?php echo $value['MaHocPhan']; ?>"><?php echo $value['TenHocPhan']; ?></option>
				<?php 
				$i++; }?>
				</select>
				<input type="submit" name="choose" value="Lọc">
            </form>
					</div>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Kết quả thi học phần <?php if(isset($_POST['choose']))
							{
								echo '______________	Lớp:	';
								echo  $film =$_POST['cartoon'] ; 
								echo '	';
								echo '______________	Học phần:	';
								echo  $film =$_POST['cartoon1'] ;
							}
							else
							{
								echo null;
							}?></h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					

					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th class="sv">Tên SV</th>
								  <th class="sv">Số câu đúng</th>
								  <th class="gt">Điểm số</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php
								$table="sinhvien";
								$table1="hocphan"; 
								$table2="ketquahp";
								$table3="lop";
								$sql="SELECT * FROM $table,$table1,$table2,$table3 WHERE  $table.MaSV=$table2.MaSV AND $table1.MaHocPhan=$table2.MaHP AND $table3.MaLop=$table.MaLop";
								$data=$db->getAllDataFind($sql);  
							if(isset($_POST['choose']))
							{
								$film = $_POST['cartoon'];
								$film1 = $_POST['cartoon1']; 
								$table="sinhvien";
								$table1="hocphan"; 
								$table2="ketquahp";
								$table3="lop";
								$sql="SELECT * FROM $table,$table1,$table2,$table3 WHERE $table3.MaLop like '$film1'AND $table2.MaHP like '$film' AND $table.MaSV=$table2.MaSV AND $table1.MaHocPhan=$table2.MaHP AND $table3.MaLop=$table.MaLop";
								$data=$db->getAllDataFind($sql);
								if($data==null)
								{
									echo '<p style="color: red; text-align: center"> Không có dữ liệu nào bạn đang cần tìm kiếm! </p>'; 
									
								return;
								}
							}
							else
							{
								echo null;
							}
							$i=1;
							foreach($data as $value)
							{?>
							<tr>
								<td class="center"><?php echo $value['TenSV']; ?></td>
								<td class="center"><?php echo $value['SoCauDung']; ?></td>
								<td class="center"><?php echo $value['DiemSo']; ?></td>
							</tr>
							<?php
							$i++;
							
							}?>
						  </tbody>
					  </table>
					  <div class="thongke">
					<?php
							if(isset($_POST['choose']))
							{
								$film = $_POST['cartoon'];
								$film1 = $_POST['cartoon1']; 
								$table="sinhvien";
								$table1="hocphan"; 
								$table2="ketquahp";
								$table3="lop";
								$sql="SELECT DiemSo,COUNT(DiemSo) AS SoLuong FROM $table,$table1,$table2,$table3 WHERE $table3.MaLop like '$film1'AND $table2.MaHP like '$film' AND $table.MaSV=$table2.MaSV AND $table1.MaHocPhan=$table2.MaHP AND $table3.MaLop=$table.MaLop GROUP BY DiemSo";
								$data=$db->getAllDataFind($sql);
								if($data==null)
								{
									echo null;
									return;
								}
							}
							else
							{
								echo null;
								return;
								
							}
							$i=1;
							foreach($data as $value)
							{?>
							<tr>
							Số lượng sinh viên  có điểm	<span style="color:red;"><?php echo $value['DiemSo']; ?></span> là <span style="color:blue;"><?php echo $value['SoLuong']; ?></span> sinh viên <br>

							</tr>
							<?php
							$i++;
							}?>
					</div>            
					</div>
				</div><!--/span-->
			
			</div>
        </div>
        </div>
	</div>
<!-- End: Content-->

<!-- Footer-->
    <?php include 'UcControl/UcFooter.php';?>
<!-- End: Footer-->