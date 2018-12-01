<?php
	session_start();
	include 'index.php';
    $obj = new Index;
    if(isset($_SESSION['user'])){
        header('Location: action.php');
      }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>insertdata</title>
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css" />
	</head>
	<body style="background-color: #F3F3F3">
		<div class="container" style="">
			
			<div class="inner mt-5" style="width: 30%; margin-left: auto;margin-right: auto;background-color: #F3F3F3; position: relative; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="mb-3" style="text-align:center;">
                    <img class="img-fluid" src="zes.jpg" style="width: 23%;border-radius:50%;">
                </div>
            <h2 class="pb-3 text-center">Login Here</h2>
				<div style="width: 85%; margin-left: auto;margin-right: auto;">
					<form action="auth.php" method="post">
						<div class="form-group">
							<label><b>Username</b></label>
							<input class="form-control" type="text" name="user" placeholder="Enter username">
						</div>
						<div class="form-group">
							<label><b>Password</b></label>
							<input class="form-control" type="password" name="pass" placeholder="Enter password">
						</div>
						<br>
						<div class="form-group">
						    <div class="form-check">
						       <input class="form-check-input" type="checkbox" id="gridCheck">
						       <label class="form-check-label" for="gridCheck">
						        Remind me
						       </label>
						    </div>
						    <div style="text-align: right;">
						    	<button type="submit" name="submit" style="border-radius: 20px; cursor: pointer;" class="mb-3">S i g n I n</button>
						    </div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>