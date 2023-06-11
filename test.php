<?php
if (isset($_POST["submit"])) {
	echo var_dump($_POST);
}
?>

<!DOCTYPE html>
<html>

<body>
	<form action="" method="post">
			<input type="checkbox" id="1" name="ref[]" value="1"><br>
			<input type="checkbox" id="2" name="ref[]" value="2"><br>
			<input type="checkbox" id="3" name="ref[]" value="3"><br>

		<input type=submit name="submit" id="submit" value="submit">
	</form>
</body>

</html>