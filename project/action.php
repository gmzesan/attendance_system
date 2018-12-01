<?php
	session_start();
	include 'index.php';
	$obj = new Index;
	if(!$_SESSION['user']){
		header('Location: login.php');
	}
	$data = $obj->show();

	if( isset($_POST['date']) && ($_POST['date'] != "") )
	{
		$date = $_POST['date'];
		$total = $_POST['total_student'];
		$present ="";
		for ($i=1; $i < $total; $i++){ 
			if ($_POST[$i] != 'absent')
			{
				$present = $_POST[$i].", ".$present;
			}else
			{
				$present = $present;
			}		
		}

		$status = $obj->insertRecord($date, $present);
		if ($status == true) 
		{
			echo "Data inserted Successfully";
		}else
		{
			echo "Error!";
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
    <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="astyle.css">
		<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
		<title>Attendance</title>
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
					<li> <a href="action.php"> <span><b>Attendance</b></a></span></li>
					<li> <a href="add.php"><span>Add student</span></a> </li>
					<li> <a href="view.php"> <span>View all</span></a></li>
					<li> <a href="slist.php"> <span>Student list</span></a></li>
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
							<a href="view.php">
								<button type="button" style="border-radius: 20px; cursor: pointer; float: right;">View all</button>
							</a>
						</h6>
					</div>
					<div class="text-center" style="border: 2px solid #ccc;width: 95%; margin: 0 auto">
					</div>
					<div class="panel-body">
						<form action="#" method="post" class="mt-3">
							<label><strong>DATE : </strong></label>
							<input type="date" class="form-control" name="date">
							<div class="text-center" style="border: 4px solid #ccc;width: 100%; margin: 0 auto">
							</div>
							<table class="table table-striped text-center">
								<thead style="background-color: black">
									<tr class="text-light">
										<td><b>Id</b></td>
										<td><b>Student's Name</b></td>
										<td><b>Roll no</b></td>
										<td><b>Action</b></td>
									</tr>
								</thead>
								<tbody>

                                <?php
                                    if($data->num_rows > 0)
                                    {
                                        $c = 1;
                                        while($value = $data->fetch_object())
                                        {
                                ?>
                                <tr>
                                    <td><?php echo $value->id;?></td>
                                    <td><?php echo $value->name;?></td>
                                    <td><?php echo $value->roll;?></td>
                                    <td>
                                        <input type="radio" name="<?php echo $c ?>" id="<?php echo $value->id ?>" value="<?php echo $value->roll ?>">
                                        <label for="<?php echo $value->id ?>">Present</label>
                                            
                                        <input type="radio" name="<?php echo $c ?>" id="<?php echo $value->id."a" ?>" value="absent">
                                        <label for="<?php echo $value->id."a" ?>">Absent</label>
                                    </td>
                                </tr>
                                <?php
                                            $c++;
                                        }
                                    }
                                ?>
                            </table>
                            <input type="hidden" name="total_student" value="<?php echo $c; ?>">	
                            <div style="background-color:#F0F5E4" class="mb-5 p-3">
                                <button type="reset" style="border-radius: 20px; cursor: pointer;" name="reset">reset</button>
                                <button type="submit" name="submit" style="border-radius: 20px; cursor: pointer; float:right">S u b m i t</button>
                            </div>		
                        </form>
                    </div>
				</div>
			</div>
		</div>
    </body>
</html>