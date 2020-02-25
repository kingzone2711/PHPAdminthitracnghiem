<?php
	ob_start();
	include 'ConnectionDB/connectionDB.php';
	$db=new Database;
	$db->connect();?>

<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Thêm Khoa</title>
    
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
					<a href="#">Khoa</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Thêm khoa</h2>
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
						  <div class="control-group">
							  <label class="control-label" for="typeahead">Mã Khoa </label>
							  <div class="controls">
								<input name="MaKhoa" value="" type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
							  </div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Tên Khoa </label>
							  <div class="controls">
								<input name="TenKhoa" value="" type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
							  </div>
							<div class="form-actions">
										<input  type="submit"   name="add_post111" value="Thêm khoa" > 
										<input  type="submit"  name="add_post12" value="Quay lại" formaction="QuanLyCauHoi.php">
							</form>
							<?php
								 if(isset($_POST['add_post111']))
								 {
										$MaKhoa=$_POST['MaKhoa'];
										$TenKhoa=$_POST['TenKhoa'];
										$table="khoa";  
                                        $sql="INSERT INTO $table(MaKhoa,TenKhoa) VALUES ('$MaKhoa','$TenKhoa')";
										$data=$db->execute($sql);
										echo "<script type='text/javascript'>alert('Bạn đã thêm khoa thành công!');
												window.location='QuanLyKhoa.php';
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
