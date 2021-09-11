<!DOCTYPE html>
<html>
    <head>
         <link rel="stylesheet" href="style.css">
    </head>
    <body>
	<br>
	<div align="left">
			<a href="index.php" class="btn btn-warning" style="padding:12px;">Back to Index Page</a>
			</div>
        <div class="container-md">
            <center>
            <br>
            <h2>ADMIN LOGIN</h2>
            <br>
            <form method="post" action="process.php">
            <div class="form-group">
            Username : <input type="text" name="uname" required>
            </div>
            <br>
            Password : <input type="password" name="pwd" required>
            <br>
            <br>
            <br>
            <input type="submit" class="btn btn-danger" name="admin" value="submit">
            </div>
        </form>
        </center>
        </div>
    </body>
</html>
