<html>
 <head>
   <title>SMS Autoreply</title>
   <script type="text/javascript">
		function ajaxrunning()
		{
			if (window.XMLHttpRequest)
			{
				xmlhttp=new XMLHttpRequest();
			}
			else
			{
				xmlhttp =new ActiveXObject("Microsoft.XMLHTTP");
			}
	
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				}
			}
	
			xmlhttp.open("GET","autoreply.php");
			xmlhttp.send();
			setTimeout("ajaxrunning()", 5000);
		}
</script>
 </head>
 <body onload="ajaxrunning()">
	<?php

	include 'koneksi.php';

	// menampilkan semua sms di tabel keluhan

	$query = "SELECT * FROM keluhan ORDER BY ID DESC";
	$hasil = mysql_query($query);

	echo "<table border='1'>";
	echo "<tr><th>Pengirim</th><th>Keluhan</th></tr>";		
	while ($data = mysql_fetch_array($hasil))
	{
		$nohp = $data['nomorhp'];
		$text = $data['isi'];
		echo "<tr><td>".$nohp."</td><td>".$text."</td></tr>";
	}	
	echo "</table>";
	?>
</body>
</html>