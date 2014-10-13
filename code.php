
<!--


                        <label><input type="checkbox" name="checkbox" value="checkbox2">Check me out 2</label>
                        <label><input type="checkbox" name="checkbox" value="checkbox3">Check me out 3</label>
                        <label><input type="checkbox" name="checkbox" value="checkbox4">Check me out 4</label>
                        <label><input type="checkbox" name="checkbox" value="checkbox5">Check me out 5</label>


if($_POST['submit'])
{

	$bekijken = $_POST['kranten'];
	$lijndikte = $_POST['lijndikte'];
	


	$z = 100;
	$melk = "goedvoorelk";
	$nummer = 200;

	function PeterLand()
	{
		global $bekijken;
		echo $bekijken;

		$allekranten = Array("NRC","Volkskrant","Het Parool","Trouw");
		
		foreach($allekranten as $value)
		{
			echo $value . "<br><br>";
		}
		
	}


}

<script>


	
	function DisplayInfo() {
		
		
			$("#displayinfo").toggle("slide",{direction:"up"},800);			
		
	}


</script>


	<div class='button' id='button' onclick='DisplayInfo(); return false'>Klik op deze button</div>
	
	
	<div class='displayinfo' id='displayinfo'>
	
		tekst
	
	
	</div>
	
	
	<?php Peterland(); ?>
	<br><br>
	Ik wil gaan naar de website:
	<form action="index.php" method="POST">
		<select name="kranten">
			<option value="http://www.parool.nl">PAROOL</option>
			<option value="http://www.nrc.nl">NRC</option>
			<option value="http://www.volkskrant.nl">VOLKSKRANT</option>
			<option value="http://www.trouw.nl">TROUW</option>
		</select>
		<p>Moet er een rand aanwezig zijn om het venster van de webpagina?</p>
			<input type="radio" name="lijndikte" value="1">Ja
			<input type="radio" name="lijndikte" value="0">Nee
		<input type="submit" name="submit" value="Bekijken" />
	</form>
	
	
	<iframe src="<?php print $bekijken; ?>" name="center_iframe" width="800px" height="500px" frameborder="<?php print $lijndikte; ?>"></iframe>
	</div>
-->