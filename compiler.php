
<?php if(isset($_POST['online']))
{
    $File = "output.php"; 
 $Handle = fopen($File, 'w');
 $Data = $_POST['code']; 
 fwrite($Handle, $Data); 
 fclose($Handle); 
 }

?>

<script type="text/javascript" >



function getOutput()
{

  var strURL="output.php";
  
//  var req = getXMLHTTP();
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
}
  else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 xmlhttp.onreadystatechange = function()
 {

      if (xmlhttp.readyState == 4 && xmlhttp.status==200) // only if "OK"
      {
      //alert('k');
      document.getElementById('output').innerHTML=xmlhttp.responseText;
    }
    /*else {
          alert("There was a problem while using XMLHTTP:\n" + xmlhttp.statusText);
        }*/
      
 }   
    xmlhttp.open("GET", strURL, true);
    xmlhttp.send(null);

}


</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post">
  <label>
  <textarea name="code" rows="10" cols="80" ></textarea>
  </label>
  <input type="submit" value="Compile" name="online"/>
<input type="button" value="Output" onClick="getOutput()" />
</form>

<div id="output">

 </div>
</body>
</html>

