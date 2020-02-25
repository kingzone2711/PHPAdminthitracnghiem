<?php
	ob_start();
	include 'ConnectionDB/connectionDB.php';
	$db=new Database;
	$db->connect();?>

<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Sửa câu hỏi</title>
    
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
					<a href="index.html">Quản lý học phần</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Câu hỏi</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Sửa câu hỏi</h2>
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
                          <?php
							$MaCH=$_POST['MaCH'];
							$table="cauhoi"; 
                            $data=$db->getAllData($table); 
                            $sql="SELECT * FROM $table WHERE MaCH like '$MaCH'";
							$data=$db->getAllDataFind($sql);
							if(isset($_POST['add_post111']))
							{
								$MaCH=$_POST['MaCH'];
								$table="cauhoi"; 
								$data=$db->getAllData($table); 
								$sql="SELECT * FROM $table WHERE MaCH like '$MaCH'";
								$data=$db->getAllDataFind($sql);
								
							}
							foreach($data as $value)
                            {?>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Nội dung câu hỏi </label>
							  <div class="controls">
								<input name="NDCauHoi1" value="<?php echo $value['NDCauHoi']; ?>" type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Đáp án A </label>
							  <div class="controls">
								<input name="A" value="<?php echo $value['A']; ?>" type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">Đáp án B </label>
							  <div class="controls">
								<input name="B" value="<?php echo $value['B']; ?>" type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">Đáp án C </label>
							  <div class="controls">
								<input name="C" value="<?php echo $value['C']; ?>" type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">Đáp án D </label>
							  <div class="controls">
								<input name="D" value="<?php echo $value['D']; ?>" type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
							  </div>
							</div>
                            <div class="control-group">
							  <label name="DapAn" class="control-label" for="typeahead">Đáp án đúng </label>
							  <div class="controls">
								<input name="a" value="<?php echo $value['DapAn']; ?>" type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
							  </div>
                            </div>
                            
							<div class="form-actions">
							<form action="SuaCauHoi.php" method="POST">
									<div class="guisuacauhoi1">
										<input style="display:none;" value="<?php echo $value['MaCH'];?>" type="text" name="MaCH" id="MaCH" class="control-label" for="typeahead"><br>
									</div>
										<input onclick="alert('Bạn đã cập nhật thành công câu hỏi!')" type="submit"   name="add_post111" value="Sửa câu hỏi" formaction="SuaCauHoi.php"> 
										<input  type="submit"  name="add_post12" value="Quay lại" formaction="QuanLyCauHoi.php">
							</form>
							<?php
								 if(isset($_POST['add_post111']))
								 {
										$NDCauHoi=$_POST['NDCauHoi1'];
										$A=$_POST['A'];
										$B=$_POST['B'];
										$C=$_POST['C'];
										$D=$_POST['D'];
										$MaCH=$_POST['MaCH'];
										$table="cauhoi";  
										$sql="UPDATE $table SET NDCauHoi=N'$NDCauHoi' WHERE MaCH like '$MaCH'";
										$data=$db->execute($sql);
										header("Location: QuanLyCauHoi.php");
								 }
								 else
								 {
									
								 }
							?>
									
                            </div>
                            <?php
							}?>
							</from>
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
