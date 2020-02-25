<?php
	ob_start();
	include 'ConnectionDB/connectionDB.php';
	$db=new Database;
	$db->connect();?>

<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Thêm Học Phần</title>
    
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
					<a href="index.html">Quản lý học phần</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">HọcPhần</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Thêm Học Phần</h2>
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
                            <label class="control-label" for="typeahead" style="margin-top:10px;">Tên Lớp </label>   
                            <select name="cartoon1" style="margin-left:20px;">
                                    <?php 
                                    $table="lop"; 
                                    $data=$db->getAllData($table); 
                                    $i=1; 
                                    foreach($data as $value) {?> 
                                        <option value="<?php echo $value['MaLop']; ?>"><?php echo $value['TenLop']; ?></option>
                                    <?php 
                                    $i++; }?>
                                    </select>                        
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="typeahead" style="margin-top:10px;">Tên Giáo Viên </label>   
                            <select name="cartoon" style="margin-left:20px;">
                                    <?php 
                                    $table="giaovien"; 
                                    $data=$db->getAllData($table); 
                                    $i=1; 
                                    foreach($data as $value) {?> 
                                        <option value="<?php echo $value['MaGV']; ?>"><?php echo $value['TenGV']; ?></option>
                                    <?php 
                                    $i++; }?>
                                    </select>                        
                        </div>
						  <div class="control-group">
							  <label class="control-label" for="typeahead">Mã Học Phần </label>
							  <div class="controls">
								<input name="MaHP" value="" type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
							  </div>
                              <br>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Tên Học Phần </label>
							  <div class="controls">
								<input name="TenHP" value="" type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
							    </div>
                            </div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">Thời gian bắt đầu thi </label>
							  <div class="controls">
								<input name="tgbd" value="" type="datetime-local" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
							  </div>
                            </div>
                              <div class="control-group">
                                <label class="control-label" for="typeahead">Thời gian kết thúc thi </label>
                                <div class="controls">
                                    <input name="tgkt" value="" type="datetime-local" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                                </div>
                              </div>
							  <div class="control-group">
                                <label class="control-label" for="typeahead">Tổng thời gian thi</label>
                                <div class="controls">
                                    <input name="tg" value="" type="time" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                                </div>
                              </div>
                              <div class="control-group">
							  <label class="control-label" for="typeahead">Mã khóa thi </label>
							  <div class="controls">
								<input name="makhoathi" value="" type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
							  </div>
                            </div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Số lần thi </label>
							  <div class="controls">
								<input name="solanthi" value="" type="number" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
							  </div>
                            </div>
							<div class="form-actions">
										<input  type="submit"   name="add_post111" value="Thêm Học Phần" > 
										<input  type="submit"  name="add_post12" value="Quay lại" formaction="QuanLyCauHoi.php">
							</form>
							<?php
								 if(isset($_POST['add_post111']))
								 {
										$SoLanThi=$_POST['solanthi'];
										$MaKT=$_POST['makhoathi'];
										$TGKT=$_POST['tgkt'];
										$TGBD=$_POST['tgbd'];
										$MaHP=$_POST['MaHP'];
										$TenHP=$_POST['TenHP'];
										$MaLop=$_POST['cartoon1'];
										$MaGV=$_POST['cartoon'];
										$TongTG=$_POST['tg'];
										$table="hocphan";
										$date = new DateTime($TGBD); // Date object using current date and time
										$TGBD1= $date->format('Y-m-d  H:i:s'); 
										$date1 = new DateTime($TGKT); // Date object using current date and time
										$TGKT1= $date->format('Y-m-d  H:i:s');
										$sql="INSERT INTO $table(SoLan,MaLop,KeyLog,Time_Start,Time_Stop,Time_Play,MaHocPhan,TenHocPhan,MaGV_Create) VALUES ('$SoLanThi','$MaLop','$MaKT','$TGBD1','$TGKT1','$TongTG','$MaHP','$TenHP','$MaGV')";
										$data=$db->execute($sql);
										echo "<script type='text/javascript'>alert('Bạn đã thêm học phần thành công!');
												window.location='QuanLyHocPhan.php';
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
