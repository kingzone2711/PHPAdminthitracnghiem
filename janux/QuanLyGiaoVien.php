
<?php
	include 'ConnectionDB/connectionDB.php';
	$db=new Database;
	$db->connect();?>
<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Giáo viên</title>
    
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
					<a href="index.html">Quản trị viên</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Giáo viên</a></li>
			</ul>
			<div class="HocPhan">
			<form method="POST" name="input" class="hocphan1">
			Tên khoa:	<select name="cartoon">
				<?php 
				$table="khoa"; 
				$data=$db->getAllData($table); 
				$i=1; 
				foreach($data as $value) {?> 
					<option value="<?php echo $value['MaKhoa']; ?>"><?php echo $value['TenKhoa']; ?></option>
				<?php 
				$i++; }?>
				</select>
				<input type="submit" name="choose" value="Lọc">
			</form>
				<div  class="themcauhoi">
					<form action="ThemGiaoVien.php" method="POST" enctype="multipart/form-data">
						<button typy="submit" name="btnthem">Thêm giáo viên</button>
					</form>
				</div>
					</div>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Giáo viên</h2>
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
								  <th class="sv">Tên GV</th>
								  <th class="gt">Giới tính</th>
								  <th class="ns">Ngày sinh</th>
								  <th class="sv">Email</th>
                                  <th class="sdt">SĐT</th>
								  <th class="xuly">Xử lý</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php
						  	$table="giaovien"; 
						  	$data=$db->getAllData($table); 
							if(isset($_POST['choose']))
							{
								$film = $_POST['cartoon']; 
								$sql="SELECT * FROM $table WHERE MaKhoa like '$film'";
								$table="giaovien"; 
								$data=$db->getAllDataFind($sql); 
							}
							$i=1;
							foreach($data as $value)
							{?>
							<tr>
								<td class="center"><?php echo $value['TenGV']; ?></td>
								<td class="center"><?php echo $value['GioiTinh']; ?></td>
								<td class="center"><?php echo $value['NgaySinh']; ?></td>
                                <td class="center"><?php echo $value['Email']; ?></td>
                                <td class="center"><?php echo $value['SDT']; ?></td>
								<td class="center">
									<form action="SuaCauHoi.php" method="POST">
									<div class="guisuacauhoi">
										<input value="<?php echo $value['MaCH'];?>" type="text" name="MaCH" id="MaCH" class="control-label" for="typeahead"><br>
										<input value="<?php echo $value['MaHP'];?>" type="text" name="MaHP" id="MaHP" class="control-label" for="typeahead"><br>
									</div>
										<button name="add_post" class="btn btn-info">
												<i class="halflings-icon white edit"></i>
										</button>
									</form>
									<form style="float:right; margin-top:-54px;" action="QuanLyCauHoi.php" method="POST">
										<input style="display:none;" value="<?php echo $value['MaCH'];?>" type="text" name="MaCH" id="MaCH" class="control-label" for="typeahead"><br>
										<button name="add_post1" class="btn btn-danger">
											<i class="halflings-icon white trash"></i> 
										</button>
									</form>
								</td>
							</tr>
							<?php
							$i++;
							
							}?>
						  </tbody>
					  </table>            
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