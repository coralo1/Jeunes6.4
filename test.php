<?php
if (isset($_POST["test1"])) {
	echo "test1";
}
if (isset($_POST["test2"])) {
	echo "test2";
}
if (isset($_POST["test3"])) {
	echo "test3";
}
if (isset($_POST["test4"])) {
	echo "test4";
}
if (isset($_POST["test5"])) {
	echo "test5";
}
if (isset($_POST["test6"])) {
	echo "test6";
}
if (isset($_POST["submit"])) {
	echo "flop";
}
?>

<!DOCTYPE html>
<html>

<body>
	<form action="" method="post">
		<input type=submit name="test1" id="test2" value="test3">
	</form>
	<form action="" method="post">
		<input type=submit name="test4" id="test5" value="test6">
	</form>
</body>

</html>