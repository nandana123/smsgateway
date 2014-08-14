<?php
include "koneksi.php";
include "functionbroadcast.php";
?>
 
<html>
 <head>
   <title>SMS Broadcast </title>
 </head>
 <body>
   <h1>SMS Broadcast </h1>
   
   <form method="post" action="index.php">
   Tuliskan pesan SMS di sini:<br>
   <textarea name="sms" cols="40" rows="5"></textarea><br><br>
   Pilih Group:<br>
   <select name="group">
     <option>Semua</option>
	 
   <?php
      $query = "SELECT * FROM pbk_groups";
      $hasil = mysql_query($query);
      while ($data = mysql_fetch_array($hasil))
      {
         echo "<option value='".$data['ID']."'>".$data['Name']."</option>";
      }	  
   ?> 
   </select>
   <br><br>
   <input type="submit" name="submit" value="Kirim SMS">
   </form>
   
 <?php
   
   if (isset($_POST['submit']))
   {
      $sms = $_POST['sms'];
	  $group = $_POST['group'];
	  
	  if ($group == "Semua")
	  {
		// query untuk membaca semua nomor jika yang dipilih 'Semua'
	    $query = "SELECT * FROM pbk";
	  }
	  else
	  {
	    // query untuk membaca nomor dalam group jika yang dipilih group tertentu
	    $query = "SELECT * FROM pbk WHERE GroupID = '$group'";
	  }
	  
	  $hasil = mysql_query($query);
	  while ($data = mysql_fetch_array($hasil))
	  {
		$nohp = $data['Number'];
		// proses kirim sms
		sendsms($nohp, $sms, '');		
	  }
      echo "<p>SMS sedang dikirimkan...</p>";	  
   }
 ?>
 </body>
</html>