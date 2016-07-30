<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>jQuery Impromptu - Demo 1</title>
		<style type="text/css">			
			body,img,p,h1,h2,h3,h4,h5,h6,fieldset,form,table,td,ul,li,pre,blockquote,code{ margin:0; padding:0; border:0; }
			body{ font: 100% Georgia, "Times New Roman", serif; background-color: #ffffff; color: #565656; text-align: center; }
			div.wrapper{ position: relative; margin: 0  auto 30px auto; width: 500px; text-align: left; border: solid 1px #aaaaaa; }
			#users{  }
			#users .user{ border: solid 1px #bbbbbb; background-color: #dddddd; padding: 10px; margin: 5px; }
			#users .user .controls{ float: right; }
			
			/*-------------impromptu---------- */
			.jqifade{ position: absolute; background-color: #aaaaaa; }
			div.jqi{ width: 400px; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif; position: absolute; background-color: #ffffff; font-size: 11px; text-align: left; border: solid 1px #eeeeee; -moz-border-radius: 10px; -webkit-border-radius: 10px; padding: 7px; }
			div.jqi .jqicontainer{ font-weight: bold; }
			div.jqi .jqiclose{ position: absolute; top: 4px; right: -2px; width: 18px; cursor: default; color: #bbbbbb; font-weight: bold; }
			div.jqi .jqimessage{ padding: 10px; line-height: 20px; color: #444444; }
			div.jqi .jqibuttons{ text-align: right; padding: 5px 0 5px 0; border: solid 1px #eeeeee; background-color: #f4f4f4; }
			div.jqi button{ padding: 3px 10px; margin: 0 10px; background-color: #2F6073; border: solid 1px #f4f4f4; color: #ffffff; font-weight: bold; font-size: 12px; }
			div.jqi button:hover{ background-color: #728A8C; }
			div.jqi button.jqidefaultbutton{ background-color: #BF5E26; }
			.jqiwarning .jqi .jqibuttons{ background-color: #BF5E26; }
			/*-------------------------------- */
		</style>
		
		
		<script type="text/javascript" src="../scripts/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="../scripts/jquery-impromptu.3.1.min.js"></script>
		
		<script type="text/javascript">
			
			function removeUser(id){
				var txt = 'Are you sure you want to remove this user?<input type="hidden" id="userid" name="userid" value="'+ id +'" />';
				
				$.prompt(txt,{ 
					buttons:{Delete:true, Cancel:false},
					callback: function(v,m,f){
						
						if(v){
							var uid = f.userid;
							//Here is where you would do an ajax post to remove the user
							//also you might want to print out true/false from your .php
							//file and verify it has been removed before removing from the 
							//html.  if false dont remove, $promt() the error.
							
							//$.post('removeuser.php',{userid:f.userid}, callback:function(data){
							//	if(data == 'true'){
							
									$('#userid'+uid).hide('slow', function(){ $(this).remove(); });
									
							//	}else{ $.prompt('An Error Occured while removing this user'); }							
							//});
						}
						else{}
						
					}
				});
			}
			
		</script>
	</head>
	<body>
		
		<div class="wrapper">
			<div id="users">
				<div id="userid1" class="user">
					<span class="controls">
						<a href="javascript:;" title="Delete User" class="deleteuser" onclick="removeUser(1);">Delete</a>
					</span>
					<span class="fname">John</span>
					<span class="lname">Doe</span>
				</div>
				
				<div id="userid2" class="user">
					<span class="controls">
						<a href="javascript:;" title="Delete User" class="deleteuser" onclick="removeUser(2);">Delete</a>
					</span>
					<span class="fname">Jane</span>
					<span class="lname">Doe</span>
				</div>
				
				<div id="userid3" class="user">
					<span class="controls">
						<a href="javascript:;" title="Delete User" class="deleteuser" onclick="removeUser(3);">Delete</a>
					</span>
					<span class="fname">Bill</span>
					<span class="lname">Smith</span>
				</div>
				
				<div id="userid4" class="user">
					<span class="controls">
						<a href="javascript:;" title="Delete User" class="deleteuser" onclick="removeUser(4);">Delete</a>
					</span>
					<span class="fname">Steve</span>
					<span class="lname">Jones</span>
				</div>
				
				<div id="userid5" class="user">
					<span class="controls">
						<a href="javascript:;" title="Delete User" class="deleteuser" onclick="removeUser(5);">Delete</a>
					</span>
					<span class="fname">Will</span>
					<span class="lname">Johnson</span>
				</div>
				
				<div id="userid6" class="user">
					<span class="controls">
						<a href="javascript:;" title="Delete User" class="deleteuser" onclick="removeUser(6);">Delete</a>
					</span>
					<span class="fname">Harold</span>
					<span class="lname">Anderson</span>
				</div>
				
			</div>
		</div>
		
	</body>
</html>
