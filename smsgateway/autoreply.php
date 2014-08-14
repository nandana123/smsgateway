<?php

include "koneksi.php";
include "functionauto.php";

// mencari sms di dlm tabel inbox yg belum diproses
$query = "SELECT * FROM inbox WHERE Processed = 'false'";
		  
$hasil = mysql_query($query);
while ($data = mysql_fetch_array($hasil))
{
	// baca no hp pengirim
	$noHP = $data['SenderNumber'];
	// baca isi sms
	$sms = strtoupper($data['TextDecoded']);
	// baca id sms
	$smsID = $data['ID'];
   
	// memparsing isi sms berdasar karakter #
	$split = explode("#", $sms);
	// membaca keyword perintah
	$command = $split[0];
	  
	if ($command == "REG")
	{
		// jika keywordnya REG
		if (count($split) == 3)
		{
			// jika jumlah parameternya 3
			
			// baca idgroup
			$idgroup = $split[1];
			// baca nama 
			$nama = $split[2];
			// simpan no hp, nama, group id ke tabel phonebook
			$query2 = "INSERT INTO pbk (GroupID, Name, Number) VALUES ('$idgroup', '$nama', '$noHP')";
			mysql_query($query2);
			// pesan balasan juka sukses
			$reply = "Terimakasih ".$nama.", proses registrasi sukses";
		}
		// pesan balasan jika jml parameter tidak 3
		else $reply = "Maaf format REG salah";
		// kirim balasan
		sendsms($noHP, $reply, '');
	}
	if ($command == "UNREG")
	{
		// jika keywordnya UNREG
		if (count($split) == 2)
		{
			// jika jml parameternya 2
			// baca group id
			$idgroup = $split[1];
			// hapus data phonebook berdasar no hp dan group id
			$query2 = "DELETE FROM pbk WHERE Number = '$noHP' AND GroupID = '$idgroup'";
			mysql_query($query2);
			// konfirmasi unreg
			$reply = "Proses unregistrasi sukses";
		}
		// jika jml parameter tidak 2
		else $reply = "Maaf, format UNREG salah";
		
		// kirim balasan
		sendsms($noHP, $reply, '');
	}
	if ($command == "KELUHAN")
	{
		// jika keywordnya KELUHAN
		if (count($split) == 2)
		{
			// jika jml parameternya 2
			// baca isi keluhan
			$isi = $split[1];
			// masukkan ke tabel keluhan
			$query2 = "INSERT INTO keluhan (nomorhp,isi) VALUES ('$noHP','$isi')";
			mysql_query($query2);
			// balasan
			$reply = "terima kasih atas pemberian keluhan anda semoga dapat menjadi pembenaran bagi kami";
		}
		
		// kirim balasan
		sendsms($noHP, $reply, '');
	}
    if ($command == "EVENT")
	{
		//jika keywordnya EVENT
		if (count($split) == 1)
		{
			// jika jml parameternya 1
			// ambil dari tabel event 
			//balasan
			$query = "SELECT * from event";
			$hasil = mysql_fetch_array(mysql_query($query));
			while($data = $hasil)
			{
				$reply = "Event : ".$data['tanggal']." , ".$data['kejadian']." di ".$data['tempat']."";
			}
		}
		//kirim balasan
		sendsms($noHP, $reply, '');
	}
	// menandai sms yg sudah diproses
	$query2 = "UPDATE inbox SET Processed = 'true' WHERE ID = '$smsID'";
	mysql_query($query2);
}

?>