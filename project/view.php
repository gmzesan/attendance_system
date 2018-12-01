<?php
session_start();
    include "index.php";
	$obj = new Index;
	if(!$_SESSION['user']){
		header('Location: login.php');
	  }
	$data = $obj->viewDateList();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="astyle.css">
		<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
		<title>View</title>
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

			<div class="main-content ml-auto mr-auto" style="width: 75%; padding-top: 60px;">
				<div class="panel mt-5" style="background-color: #F2F1F4">
					<div class="panel-heading p-3  mb-0">
						<h6>
							<a href="add.php">
								<button type="button" style="border-radius: 20px; cursor: pointer;">Add student</button>
							</a>
							<a href="action.php">
								<button type="button" style="border-radius: 20px; cursor: pointer; float: right;">Attendance</button>
							</a>
						</h6>
					</div>
					<div class="panel-body">
						<form action="#" method="post" class="mt-3">
							<table class="table table-striped text-center">
								<thead style="background-color: black">
									<tr class="text-light">
										<td><b>Id</b></td>
										<td><b>Attendance date</b></td>
										<td><b>Attend</b></td>
										<td><b>Action</b></td>
									</tr>
								</thead>
								<tbody>
								<?php 
									if($data->num_rows>0){
										while($row = $data->fetch_object()){
								?>
									<tr>
										<td><?php echo $row->id; ?></td>
										<td><?php echo $row->date; ?></td>
										<td><?php echo $row->action; ?></td>
										<td>
											<a href="delete.php?id=<?php echo $row->id;?>">
												<button type="button" name="submit" style="border-radius: 20px; cursor: pointer;">D e l e t e</button>
											</a>
										</td>
									</tr>
								<?php			
										}
									}
								?>
								</tbody>
							</table>
                            
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>