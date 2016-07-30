<?
//mb_internal_encoding("UTF-8");

//Error_Reporting(E_ALL & ~E_NOTICE);
//error_reporting(-1);
//header('Content-Type: text/html; charset=utf-8');

	include('adodb/adodb.inc.php');
	$db = &ADONewConnection('mysql');
		$db->PConnect('localhost','root','','base1');
		if (!$db) print "DO'NT CONNECTION  .... !!!!! <br> ".$db->ErrorMsg()."<br>"  ;		

		//$db->charSet='win1251';
 $db->charSet='utf8';
	//$db->charSet='cp1251';
	//	$db->charSet='koi8r';
	
	//		$res=$db->Execute("TRUNCATE TABLE tab1;"); 
	//		$res=$db->Execute("TRUNCATE TABLE tab2;"); 
	//		$res=$db->Execute("TRUNCATE TABLE tab3;"); 
	//		$res=$db->Execute("TRUNCATE TABLE tab4;"); 

			$mass[1]="Овца1";	
			$mass[2]="Овца2";	
			$mass[3]="Овца3";	
			$mass[4]="Овца4";	
			$mass[5]="Овца5";	
			$mass[6]="Овца6";	
			$mass[7]="Овца7";	
			$mass[8]="Овца8";	
			$mass[9]="Овца9";	
			$mass[10]="Овца10";		
			
			$x=1;
			$tab_num=1;
			while($x<=$owner+10)
			{
			
			
				$tab_num=rand(1, 4);
				$res=$db->Execute("INSERT INTO `base1`.`tab$tab_num` (`id` ,`name`) VALUES ('$x', '$mass[$x]');");
				$x=$x+1;
			}


echo('			<div id="par2"> ');

	$x=1;			
while($x<=4)
{
			echo('			
				<div class="block2">				
				 ����� '.$x.'
					<div id="par2">
					<select name="bar" size="10" multiple> 

				');			
				
					$tab_num=1;
					//	$res=$db->Execute("SELECT `base1`.`tab$tab_num` (`id` ,`name`);");				
					$res=$db->Execute("SELECT * FROM `tab$x`;");

				foreach ($res as $res2) {
				//echo "<b>$value</b><br>";
				echo("<option value='bar$res2[id]'>���� $res2[id] ");
				}

echo('</select> </div> </div>');
 
$x=$x+1;
}				

echo('	</div> ');
				
	
?>

