
<!--
 * Author: Abubakar Abdusalam
 * ORG: Binary Laboratory (Bynalab)
 * Email: bynalabs@gmail.com
 * Date: 07/12/2018
 * Time: 1:03 PM
-->

<!DOCTYPE html>
<html>
<head>
	<title>Generate Transaction ID</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<style>
	.done{
		color: green;
	}
	.rem{
		color: red;
	}
</style>

	<br/><br/>
	<center>

		<h1>Transaction ID Finder! (UTME)</h1>

		<form method="POST" action="">


			<input type="text" name="start" placeholder="Start from. eg: 1000" value="<?php if(isset($_POST['generate'])){echo $_POST['start'];} ?>">
			<input type="text" name="stop" placeholder="Stop at. eg: 2000" value="<?php if(isset($_POST['generate'])){echo $_POST['stop'];} ?>">
			<br/><br/>
			<h3>eg: http://portals.ibbu.edu.ng/epinsys/?q=receipt/sum</h3>
			<input type="text" name="url" placeholder="http://portals.ibbu.edu.ng/epinsys/?q=receipt/sum" value="<?php if(isset($_POST['generate'])){echo $_POST['url'];} ?>">
			<br/><br/>
			<button type="submit" name="generate"> Generate </button>

		</form>
<br/>
<hr>
	<div class="count">
	<?php 
		if(isset($_POST['generate'])){

			$from = $_POST['start'];
			$to = $_POST['stop'];
			$accu = ($to+1)-($from);

			echo "Overall: $accu   <br/><br/>";
			echo "<span class='done'> </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "<span class='rem'> </span>";

	}
	?>
		
	</div>
<hr>
<br/>
		<div class = "data">

		</div>
		

	</center>


</body>
</html>

<?php


if(isset($_POST['generate'])){

	function get_data($url) {
		$ch = curl_init();
		$timeout = 5;
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}

$start = $_POST['start'];
$stop = $_POST['stop'];
$url = $_POST['url']; 

while ($start <= $stop) {

	$curl = $url.'/'.$start;
    $data = get_data($curl); ?>

    <script>
    
    var data = <?php echo json_encode($data); ?>;
    var report = $(data).find("table");
	report.appendTo(".data");
	
	function bynaCounter(index,loc,stat) {
		setTimeout(function() { 
			$(loc).html(stat+index); 
		},  <?php echo $start; ?>);
	}
	bynaCounter(<?php echo " ".$start." "; ?>,".done"," Done: ");
	bynaCounter(<?php echo " ".$stop-$start. " "; ?>,".rem"," Remaining: ");

    </script>

<?php

	$start++;
	}
}

?>
