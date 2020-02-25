<?php
	ob_start();
	include 'ConnectionDB/connectionDB.php';
	$db=new Database;
	$db->connect();?>

<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Thêm Lớp</title>
    
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
       
        
        <div id="content" class="span10" style="min-height=235px;">
       

        <ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Quản lý sinh viên</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Lớp</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Thêm Lớp</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div class="form-horizontal">
						  <fieldset>
                              
						  <form action="" method="post">
                          <div class="HocPhan">
                                <form method="POST" name="input" class="hocphan1">
                                <span >Tên giáo viên:</span> 	<select name="cartoon1" style="margin-top:-5px;">
                                    <?php 
                                    $table="giaovien"; 
                                    $data=$db->getAllData($table); 
                                    $i=1; 
                                    foreach($data as $value) {?> 
                                        <option value="<?php echo $value['MaGV']; ?>"><?php echo $value['TenGV']; ?></option>
                                    <?php 
                                    $i++; }?>
                                    </select>
                                    Tên học phần:	<select name="cartoon" style="margin-top:-5px;">
                                    <?php 
                                    $table="khoa"; 
                                    $data=$db->getAllData($table); 
                                    $i=1; 
                                    foreach($data as $value) {?> 
                                        <option value="<?php echo $value['MaKhoa']; ?>"><?php echo $value['TenKhoa']; ?></option>
                                    <?php 
                                    $i++; }?>
                                    </select>
                                </form>
                    </div>
                    <hr>
					<form action="ThemLop.php" method="POST">
							<div class="control-group">
							<label class="control-label" for="typeahead">Mã Lớp </label>
							  <div class="controls">
								<input name="MaLop" value="" type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
							  </div>
							  <label class="control-label" for="typeahead">Tên Lớp </label>
							  <div class="controls">
								<input name="TenLop" value="" type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
							  </div>
							<div class="form-actions">
							
										<input  type="submit"   name="add_post111" value="Thêm lớp" > 
										<input  type="submit"  name="add_post12" value="Quay lại" formaction="QuanLyLop.php">
                            </form>
                            <?php
								 if(isset($_POST['add_post111']))
								 {
										$TenLop=$_POST['TenLop'];
										$MaLop=$_POST['MaLop'];
										$table="lop";  
                                        $sql="INSERT INTO $table(MaLop,TenLop) VALUES ('$MaLop','$TenLop')";
										$data=$db->execute($sql);
										header("Location: QuanLyLop.php");
										echo "<script type='text/javascript'>alert('Bạn đã xóa thành công câu hỏi thành công!');
												window.location='QuanLyCauHoi.php';
										</script>";
										exit;
								 }
								 else
								 {
										echo null;		
								 }
							?>
                            </div>
						  </fieldset>
						</div>
					</div>
				</div><!--/span-->
			</div><!--/row-->
        </div>
        </div>
    </div>
<!-- End: Content-->

<!-- Footer-->
    <?php include 'UcControl/UcFooter.php';?>
<!-- End: Footer-->
