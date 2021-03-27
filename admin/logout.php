<?PHP 
session_destroy();
setcookie("uname","",time() - 3600,"/");
header("location: login.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Logout</title>
</head>

<body>
</body>
</html>