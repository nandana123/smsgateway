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
			setTimeout("ajaxrunning()", 1000);
		}
</script>
 </head>
 <body onload="ajaxrunning()">
	<h1>Autoreply</h1>
	<h3>SMS Server running...</h3>
	<ul>
	<li><a href="">Home</a></li>
	<li><a href="">Inbox</a></li>
	<li><a href="keluhan.php">Keluhan</a></li>
	</ul>
 </body>  
</html>