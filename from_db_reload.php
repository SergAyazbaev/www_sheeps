<?
	include('adodb/adodb.inc.php');
	$db = &ADONewConnection('mysql');
		$db->PConnect('localhost','root','','base1');
		if (!$db) print "DO'NT CONNECTION  .... !!!!! <br> ".$db->ErrorMsg()."<br>"  ;		

		//$db->charSet='win1251';
		$db->charSet='utf8';
		//$db->charSet='cp1251';
		//$db->charSet='koi8r';
	


		$text= strstr( $_REQUEST['but_text'] ,"kill");
		//echo $text;
		//echo ('<br><br>') ;
		
		
		if( substr_count($text,'kill')>0 ) 
		{			
		//	echo ('----kill baran199999--------') ;		
		//	echo ereg ("[0-9][0-9]",$text, $regs);			
			print_r( $regs);
			
			//$regs[0];
			
			$res=$db->Execute("DELETE FROM `base1`.`tab1` WHERE `id` = $regs[0] ;");
			$res=$db->Execute("DELETE FROM `base1`.`tab2` WHERE `id` = $regs[0] ;");
			$res=$db->Execute("DELETE FROM `base1`.`tab3` WHERE `id` = $regs[0] ;");
			$res=$db->Execute("DELETE FROM `base1`.`tab4` WHERE `id` = $regs[0] ;");
			
		
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

