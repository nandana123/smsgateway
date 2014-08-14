<?php
	include 'koneksi.php';
	include 'function.php';
?>
<html>
	<head>
		<title>Kirim SMS</title>
	</head>
	<body>
		<h1>Case 01 - Kirim Short SMS</h1>
		<form method="post" action="index.php?op=kirim">
			Nomor HP Tujuan<br>
			<input type="text" name="nohp"><br><br>
			Pesan SMS<br>
			<textarea name="pesan" cols="20" rows="5"></textarea><br><br>
			<input type="submit" name="submit" value="Kirim SMS">
		</form>
		
		<?php
		
		if (isset($_GET['op']))
		{
			if ($_GET['op'] == 'kirim')
			{
				$nohp = $_POST['nohp'];
				$pesan = $_POST['pesan'];
				sendsms($nohp, $pesan, '');
			}	
		}
		
		?>
		
	</body>
</html>