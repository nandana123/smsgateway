<?php

// mengirim short sms

function sendsms($nohp, $pesan, $modem)
{
	$pesan = str_replace("'", "\'", $pesan);
	$query = "INSERT INTO outbox (DestinationNumber, TextDecoded, SenderID, CreatorID) 
	          VALUES ('$nohp', '$pesan', '$modem', 'Gammu')";
    $hasil = mysql_query($query);
	return 'SMS sedang dikirim...';
}

?>