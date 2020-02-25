

<?php ob_start(); include 'Controller/QuanLyCauHoi.php';?>


<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Câu hỏi</title>
    
    <?php include 'Css_Script.php';?>
	<!-- end: JavaScript-->
</head>
<body>

<!-- Header-->
	<?php include 'UcControl/UcHeader.php';?>
	
<!-- End: Header-->


    <div class="container-fluid-full">
        <div class="row-fluid">
        <!-- Left-->
            <?php include 'UcControl/UcLeft.php';?>
		<!-- End: Left-->
		

       <!-- Content-->
		<div id="content" class="span10" style="min-height=247px;">
		
        <ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Quản lý học phần</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Câu hỏi</a></li>
			</ul>
			<div class="HocPhan">
			<form method="POST" name="input" class="hocphan1">
				Tên học phần: <select name="cartoon">
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
				<div class="themcauhoi">
					<form method="POST" enctype="multipart/form-data">
						<input type="file" name="file">
						<button typy="submit" name="btnthem">Thêm câu hỏi</button>
					</form>
				</div>
					</div>
					
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Câu hỏi
						<?php if(isset($_POST['choose']))
							{
								echo '	học phần:	';
								echo  $film =$_POST['cartoon'] ;
							}
							else
							{
								echo null;
							}?>
					</h2>
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
								  <th class="causo">Câu số</th>
								  <th class="cauhoi">Câu hỏi</th>
								  <th class="dapana">Đáp án A</th>
								  <th class="dapanb">Đáp án B</th>
								  <th class="dapanc">Đáp án C</th>
                                  <th class="dapand">Đáp án D</th>
                                  <th class="dapan">Đáp án đúng</th>
								  <th class="xuly">Xử lý</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php
						  	$table="cauhoi"; 
						  	$data=$db->getAllData($table); 
							if(isset($_POST['choose']))
							{
								$film = $_POST['cartoon']; 
								$sql="SELECT * FROM $table WHERE MaHP like '$film'";
								$table="cauhoi"; 
								$data=$db->getAllDataFind($sql);
								if($data==null)
								{
									echo '<p style="color: red; text-align: center"> Không có dữ liệu nào bạn đang cần tìm kiếm! </p>'; 
									
								return;
								} 
							}
							$i=1;
							foreach($data as $value)
							{?>
							<tr>
								<td class="center"><?php echo $value['CauSo']; ?></td>
								<td><?php echo $value['NDCauHoi']; ?></td>
								<td class="center"><?php echo $value['A']; ?></td>
								<td class="center"><?php echo $value['B']; ?></td>
                                <td class="center"><?php echo $value['C']; ?></td>
                                <td class="center"><?php echo $value['D']; ?></td>
                                <td class="center"><?php echo $value['DapAn']; ?></td>
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
										<button name="add_post1" class="btn btn-danger" >
											<i class="halflings-icon white trash"></i> 
										</button>
									</form>
								</td>
							</tr>
							<?php
							$i++;
							}?>
							<?php
								if(isset($_POST['add_post1']))
								{	
									$table="cthocphan"; 
									$MaCH=$_POST['MaCH'];
									$sql="SELECT * FROM $table WHERE MaCH like '$MaCH'";
									$data=$db->getAllDataFind($sql);
									if($data!=NULL)
									{
										
										echo '<script language="javascript">';
										echo 'alert("Câu hỏi đã được dùng trong thi, không thể xóa được!")';
										echo '</script>';
										exit;
									} 
									{
										$table="cauhoi"; 
										$MaCH=$_POST['MaCH'];
										$sql="DELETE FROM $table WHERE MaCH like '$MaCH'";
										$data=$db->execute($sql);
										echo "<script type='text/javascript'>alert('Bạn đã xóa thành công câu hỏi thành công!');
												window.location='QuanLyCauHoi.php';
										</script>";
										exit;
									}
								}
								else
								{
									echo null;
									exit;
								}
								
							?>
							
						  </tbody>
					  </table>            
					</div>
				</div>
			</div>
        </div>
		</div>
	</div>
<!-- End: Content-->

<!-- Footer-->
<?php include 'UcControl/UcFooter.php';?>
<!-- End: Footer-->
