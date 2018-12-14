
<!--
 * Written by: BynaLab
 * Email: jjidexy@gmail.com
 * Date: 07/12/2018
 * Time: 1:03 PM
-->

<!DOCTYPE html>
<html>
<head>
	<title>Generate Transaction ID</title>
</head>
<body>
	<br/><br/>
	<center>

		<h1>Transaction ID Trial and Error! (UTME)</h1>

		<form method="POST" action="">


			<input type="text" name="start" placeholder="start from. eg: 1000" value="<?php if(isset($_POST['generate'])){echo $_POST['start'];} ?>">
			<input type="text" name="stop" placeholder="stop at. eg: 2000" value="<?php if(isset($_POST['generate'])){echo $_POST['stop'];} ?>">
			<br/><br/>
			<h3>eg: http://portals.ibbu.edu.ng/epinsys/?q=receipt/sum</h3>
			<input type="text" name="url" placeholder="http://portals.ibbu.edu.ng/epinsys/?q=receipt/sum" value="<?php if(isset($_POST['generate'])){echo $_POST['url'];} ?>">
			<br/><br/>
			<button type="submit" name="generate"> Generate </button>

		</form>

	</center>

</body>
</html>

<?php


if(isset($_POST['generate'])){

$start = $_POST['start'];
$stop = $_POST['stop'];
$url = $_POST['url'];

while ($start <= $stop) {

	echo "<script>window.open('$url/$start', '_blank');</script>";
	$start++;

	}
}
?>


