<!-- PHP Create/Retrieve a Cookie -->
<?php
$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>
<html>

<body>

    <?php
    if (!isset($_COOKIE[$cookie_name])) {
        echo "Cookie named '" . $cookie_name . "' is not set!";
    } else {
        echo "Cookie '" . $cookie_name . "' is set!<br>";
        echo "Value is: " . $_COOKIE[$cookie_name];
    }
    ?>

</body>

</html>


<!-- Modify a Cookie Value -->
<?php
$cookie_name = "user";
$cookie_value = "Alex Porter";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
?>
<html>
<body>

<?php
if(!isset($_COOKIE[$cookie_name])) {
  echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
  echo "Cookie '" . $cookie_name . "' is set!<br>";
  echo "Value is: " . $_COOKIE[$cookie_name];
}
?>

</body>
</html>


<!-- Delete a Cookie -->

<?php
setcookie("user", "", time() - 3600);
?>
<html>
<body>

<?php
echo "Cookie 'user' is deleted.";
?>

</body>
</html>


<!-- Check if Cookies are Enabled -->
<?php
setcookie("test_cookie", "test", time() + 3600, '/');
?>
<html>
<body>

<?php
if(count($_COOKIE) > 0) {
  echo "Cookies are enabled.";
} else {
  echo "Cookies are disabled.";
}
?>

</body>
</html>

<!-- update code -->

<?php
include_once("config.php");
include_once("function.php");
check_login_user();
if(isset($_POST['update']))
{
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$dept = mysqli_real_escape_string($mysqli, $_POST['dept']);

	if(empty($name) || empty($age) || empty($email) || empty($dept)) {

		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
	} else {
		$query_update = "UPDATE users SET name='$name',age='$age',email='$email',dept='$dept' WHERE id=$id";
		$result = mysqli_query($mysqli, $query_update);

		header("Location: user_list.php");
	}
}
?>
<?php


// Create
<?php
include_once("config.php");
include_once("function.php");
check_login_user();
if(isset($_POST['Submit'])) {
	$name = $_POST['name'];
	$age =  $_POST['age'];
	$email =$_POST['email'];
	$dept =$_POST['dept'];

	if(empty($name) || empty($age) || empty($email) || empty($dept)) {

		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
	} else {
		$result = mysqli_query($mysqli, "INSERT INTO users(name,age,email,dept) VALUES('$name','$age','$email','$dept')");
		}
	}
		?>

// JS Calculator
<script>
        $("button").button().click(function (event) {
            event.preventDefault();
            var value1 = parseInt($("#amount").val()); //get value of first slider
            var value2 = parseInt($("#amount2").val()); //value of second slider
            var result = 0;
            var radioval = $('input[name=radio]:checked', '#myForm').val(); //get value of the radio bytton
       
            //calculations depending of chose of the radio button
            if (radioval == "Addition") result = value1 + value2;
            else if (radioval == "Substraction") result = value1 - value2;
            else if (radioval == "Multiplication") result = value1 * value2;
            else if (radioval == "Division") result = value1 / value2;
       
            $("#resultlabel").text("Result: " + result); //show result
        });       
</script>
        