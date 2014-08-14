<html>
	<head>
		<title>INBOX</title>
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
						document.getElementById("inbox").innerHTML = xmlhttp.responseText;
					}
				}
	
				xmlhttp.open("GET","run.php");
				xmlhttp.send();
				setTimeout("ajaxrunning()", 5000); 
			}
		</script>
	</head>
	<body onload="ajaxrunning()">
		<h1>INBOX</h1>
		
		<div id="inbox"></div>
		
	</body>
</html>