<?php
	include('adodb/adodb.inc.php');				                                          
	
	$db = &ADONewConnection('mysql');  # create a connection
		$db->PConnect('localhost','root','','base1');
		if (!$db) print "DO'NT CONNECTION  .... !!!!! <br> ".$db->ErrorMsg()."<br>"  ;		
		if (!$db) die("Connection failed");

		$db->charSet='win1251';		
		
	//	$db->charSet='utf8';				                                          
		///$db->charSet='cp1251';				                                          
	//	$db->charSet='koi8r';				                                          
	//$_POST['connect']=$db;
			if($res<0) echo('���-�� �� ��� � ������');			

			$res=$db->Execute("TRUNCATE TABLE tab1;"); //�������� �������
			$res=$db->Execute("TRUNCATE TABLE tab2;"); //�������� �������
			$res=$db->Execute("TRUNCATE TABLE tab3;"); //�������� �������
			$res=$db->Execute("TRUNCATE TABLE tab4;"); //�������� �������


	$x=1;			
while($x<=4)
{
			echo('			
				<div class="block2">				
				����� '.$x.'	
					<select name="bar" size="10" multiple> 

				');			
				
					$tab_num=1;
					//			$res=$db->Execute("SELECT `base1`.`tab$tab_num` (`id` ,`name`);");				
					$res=$db->Execute("SELECT * FROM `tab$x`;");

				foreach ($res as $res2) {
				//echo "<b>$value</b><br>";
				echo("<option value='bar$res2[id]'>������ $res2[id] ");
				}

echo('</select>  </div>');
  
$x=$x+1;
}				
				

?>




