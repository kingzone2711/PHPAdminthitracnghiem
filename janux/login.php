<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>


<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Space Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>



<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />



<link href="//fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,vietnamese" rel="stylesheet">


</head>
<body>

	<div class="main">
		<div class="main-w3l">
			<h1 class="logo-w3"></h1>
			<div class="w3layouts-main">
				<h2><span>Login now</span></h2>
				<div class="social">
				</div>
					<h3></h3>
					<form action="" method="post">
						<input placeholder="Tài khoản" name="Email" type="text" >
						<input placeholder="Mật khẩu" name="Password" type="password">
						<input  type="submit"   name="add_post111" value="Đăng nhập" > 
					</form>
					<h6><a href="#">Lost Your Password?</a></h6>
			</div>
			<?php
			if(isset($_POST['add_post111']))
			{
				$MaKhoa=$_POST['Email'];
				$TenKhoa=$_POST['Password'];
				if($MaKhoa=="" && $TenKhoa=="")
				{
					echo "<script type='text/javascript'>alert('Vui lòng nhập User và Password!');
					window.location='login.php';
					</script>";
					exit;
				} else if($MaKhoa=="")
				{
					echo "<script type='text/javascript'>alert('Vui lòng nhập User');
					window.location='login.php';
					</script>";
					exit;
				}	else if($TenKhoa=="")
				{
					echo "<script type='text/javascript'>alert('Vui lòng nhập Password!');
					window.location='login.php';
					</script>";
					exit;
				}	else if($MaKhoa=="MinhLuongVu" && $TenKhoa=="23021998")
				{
					echo "<script type='text/javascript'>alert('Đăng nhập thành công!');
					window.location='index1.php';
					</script>";
					exit;
				}
				
			}
			else
			{
				echo null;		
			}
			?>
			<div class="footer-w3l">
				<p></p>
			</div>

		</div>
	</div>

</body>
</html>
