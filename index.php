<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=win-1251">

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  
</script>
<script type="text/javascript">   
$(document).ready(function(){

   $("#but1").click(function(){
      $("#par2").load("from_db_add.php");
   })
   $("#but11").click(function(){
      $("#par2").load("from_db_rest.php");
   })

   $("#but2").click(function(){
      $("#par2").load("from_db_clear.php");
   })

   $("#but3555").click(function(){
      $("#par2").load("from_db_reload.php","but_text="+$("#but_text").val());		
   })
        
            $('#myForm').submit(function(){  
                $.ajax({  
                    type: "POST",  
                    url: "from_db_kill.php",  
                    data: "but_text="+$("#but_text").val(),
                    success: function(html){  
                        $("#par2").html(html);  
                    }  
                });  
                return false;  
            });  
              
        });  
</script> 

 <style type="text/css">
   form { 
    width: 800px;
	height:400px;
    background: #ccc;
    padding: 5px;
    padding-right: 20px; 
    border: solid 1px black; 
    float: auto;
	margin-left: auto;
    margin-right: auto
   }
   form .block1 { 
    width: 22%; 
	height:250px;
    background: #fc9; 
    padding: 5px; 
    border: solid 1px black;     
	float: right;
   }
   form .block2 { 
    width: 22%; 
	height:250px;
    background: #fc9; 
    padding: 5px; 
    border: solid 1px black;     
	float:  left ;
   }
   form .block3 { 
    width: 90%; 
	height:50px;
    background: #fc9; 
    padding: 5px; 
    border: solid 1px black; 
    float: left; 
   }
   form .block33 { 
    width: 100%; 
	height:10px;
    background: #ccc;
    padding: 5px;     
    float: left; 
   }
  select {
    width: 70%; 
   }
   form .search {
    width: 50%; 
   }
   form .new {
    width: 25%; 
	float: left; 
	height:30px;
   }
   form .kill {
    width: 25%; 
	float: right; 
	height:30px;
   }

   form .formSubmit {
	margin-left: 85px;
	cursor: pointer;
	width: auto;
	}
	
	
	form input[type=checkbox] {
	border: none;
	}
  </style> 
  
</head>
  
<body>
  
<table width=100% height=100%>
<tr><td align=center>

			<div class="block1">
			<form  id="myForm">
<?
if (!isset($_SESSION['number'])) $_SESSION['number']=1;

/*  создаем четыре таблицы в базе "base1"
DROP TABLE IF EXISTS `tab1`;

CREATE TABLE IF NOT EXISTS `tab1` (
  `id` int(3) NOT NULL,
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

*/

//mb_internal_encoding("UTF-8");

	include('adodb/adodb.inc.php');				                                          
	$db = &ADONewConnection('mysql');  # create a connection
		$db->PConnect('localhost','root','','base1');
		if (!$db) print "DO'NT CONNECTION  .... !!!!! <br> ".$db->ErrorMsg()."<br>"  ;		
		if (!$db) die("Connection failed");

	//	$db->charSet='win1251';		
		$db->charSet='utf8';				                                          
	/// $db->charSet='cp1251';				                                          
	//	$db->charSet='koi8r';				                                          
	//$_POST['connect']=$db;
			if($res<0) echo('Что-то пошло не так');
			else print ("<font color=red size=6> Учет овечек </font><br>");

			$res=$db->Execute("TRUNCATE TABLE tab1;"); 
			$res=$db->Execute("TRUNCATE TABLE tab2;"); 
			$res=$db->Execute("TRUNCATE TABLE tab3;"); 
			$res=$db->Execute("TRUNCATE TABLE tab4;"); 

		
			$mass[1]="Овца1";	
			$mass[2]="РћРІС†Р°2";	
			$mass[3]="РћРІС†Р°3";	
			$mass[4]="РћРІС†Р°4";	
			$mass[5]="РћРІС†Р°5";	
			$mass[6]="РћРІС†Р°6";	
			$mass[7]="РћРІС†Р°7";	
			$mass[8]="РћРІС†Р°8";	
			$mass[9]="РћРІС†Р°9";	
			$mass[10]="РћРІС†Р°10";	
			
if (isset($_COOKIE['number']))			
			
			$x=$_COOKIE['number']; 
			$x=1;
			$tab_num=1;
			while($x<=$owner+10)
			{
			
				$tab_num=rand(1, 4);
				$res=$db->Execute("INSERT INTO `base1`.`tab$tab_num` (`id` ,`name`) VALUES ('$x', '$mass[$x]');");
				//$str1=convert_cyr_string($str1,"k","w");
				 
				$x=$x+1;
			}


echo('			<div id="par2"> ');

	$x=1;			
while($x<=4)
{
			echo('			
				<div class="block2">				
				 Загон '.$x.'
					<div id="par2">
					<select name="bar" size="10" multiple> 

				');			
				
					$tab_num=1;
					//			$res=$db->Execute("SELECT `base1`.`tab$tab_num` (`id` ,`name`);");				
					$res=$db->Execute("SELECT * FROM `tab$x`;");

				foreach ($res as $res2) {
				//echo "<b>$value</b><br>";
				echo("<option value='bar$res2[id]'>Овца $res2[id] ");
				}

echo('</select> </div> </div>');
 
$x=$x+1;
}				

echo('	</div> ');

// 	<input id="but11" type="button" value=" Обновить " class="new">	 
				
echo('
	<div class="block33"></div>	
	
	<input id="but1" type="button" value=" Добавить " class="new">	 
	<input id="but2" type="button" value=" Удалить всех овечек " class="kill">

	<div class="block33"></div>	
	
	<br><br>
	<input id="but_text" type="text" class="search " > 
	<input id="but3" type="submit" value=" Выполнить команду " class="kill">
	( например: kill baran1 )
	
	</form> ');
	
echo('	<div id="par3"> ');
echo('	</div> ');

//<input type=submit value="GO!">
?>

</div>
</div>

</td></tr>
</table>

</body></html>


