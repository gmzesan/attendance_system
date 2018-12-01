<?php
session_start();
	include "index.php";
	$obj = new Index;
	if(!$_SESSION['user']){
		header('Location: login.php');
	  }
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$roll = $_POST['roll'];
		$data = $obj->insertdata($name,$roll);
		header("location: slist.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="astyle.css">
		<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
		<title>Test</title>
	</head>
	<body style="background-color: #F0F5E4">
		<div class="wrapper">
			<div class="header" style="top: 0">STUDENT ATTENDANCE</div>
			<input type="checkbox" name="" class="openSidebarMenu" id="openSidebarMenu">
			<label for="openSidebarMenu" class="sidebarIconToggle">
				<div class="spinner diagonal part-1"></div>
				<div class="spinner horizontal"></div>
				<div class="spinner diagonal part-2"></div>
			</label>

			<div id="sidebarMenu"style="top: 0">
				<ul class="sidebarMenuInner">
					<li> <a href="action.php"> <span><b>Attendance</b></span></a></li>
					<li> <a href="add.php"><span>Add student</span></a> </li>
					<li> <a href="view.php"> <span>View all</span></a></li>
					<li> <a href="logout.php?logout=true"><span>Exit</span></a> </li>
				</ul>
			</div>

			<div class="main-content ml-auto mr-auto" style="width: 50%; padding-top: 60px;">
				<div class="panel mt-5" style="background-color: #F2F1F4">
					<div class="panel-heading p-3  mb-0">
						<h6>
							<a href="view.php">
								<button type="button" style="border-radius: 20px; cursor: pointer;">View all</button>
							</a>
							<a href="action.php">
								<button type="button" style="border-radius: 20px; cursor: pointer; float: right;">Attendance</button>
							</a>
						</h6>
					</div>
					<div class="text-center" style="border: 2px solid #ccc;background-color: #fff;border-radius: 5px;padding: 8px;margin: 0 auto;width: 80%; margin: 0 auto">
						<h2>Join now</h2>
					</div>
					<div class="panel-body ml-auto mr-auto" style="width:80%"; >
						<form action="#" method="post" class="mt-3">
                            <div class="form-group">
                                <label for="name">Student's name</label>
                                <input type="text" name="name" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="roll">Student's roll</label>
                                <input type="number" name="roll" class="form-control" >
                            </div>
                            <div>
                                <button type="submit" name="submit" style="border-radius: 20px; cursor: pointer;">S u b m i t</button>
                            </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>