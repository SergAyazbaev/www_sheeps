
        <link rel="stylesheet" media="all" type="text/css" href="ajax/examples.css">
        <script type="text/javascript" src="ajax/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="ajax/jquery-impromptu.3.1.min.js"></script>

		<script type="text/javascript">
			function openprompt( x ){
			
				var temp = {
					state0: {
						html:'<p>Что будем изненять или добавлять?</p>' ,
                        buttons: { Аватар: 1, Фото: 2, Видео: 3,  Вернуться: 0 },
                        focus: 3,
                        submit:function(v,m,f){ 
                            if(v==0)
                                $.prompt.close()
                            else if (v == 1) 
                                $.prompt.goToState('state1');
                            else if (v == 2) 
                                $.prompt.goToState('state2');
                            else if (v == 3) 
                                $.prompt.goToState('state3');
                            return false; 

                            if(!v)
                                $.prompt.close()
                            else $.prompt.goToState('state0');//go forward
                            return false; 
                        }
					},
                    state1: {
                        html:'Добавить файл с изображением аватара?<br><br><div class="field">'+
                        '<FORM ENCTYPE="multipart/form-data" METHOD=POST action="load_img.php">'+
                            '<input type=file name=myfile size = 40  class=brown>'+
                            '<input type=hidden id="id_m" name=id_m value='+x+'>'+
                            '<br><br>'+
                            '<input type=submit name=aha value="Закачать файл" >'+
                            '<br><br>'+
                            '</form>'+                            
                        '</div>',
                        buttons: { Back: -1, Cancel: 0, Next: 1 },
                        focus: 2,
                        submit:function(v,m,f){
                            if(v==0)
                                $.prompt.close()
                            if (v == 1) 
                                return true; //we're done
                            else if(v=-1)
                                $.prompt.goToState('state0');//go back
                            return false; 
                        }
                    },
                    state2: {
                        html:'Добавить файл с изображением для фотоальбома?<br><br><div class="field">'+
                        '<FORM ENCTYPE="multipart/form-data" METHOD=POST action="load_img.php">'+
                            '<input type=file name=myfile size = 40  class=brown>'+
                            '<input type=hidden id="id_m" name=id_m value='+x+'>'+
                            '<br><br>'+
                            '<input type=submit name=aha value="Закачать файл" >'+
                            '<br><br>'+
                            '</form>'+                            
                        '</div>',
                        buttons: { Back: -1, Cancel: 0, Next: 1 },
                        focus: 2,
                        submit:function(v,m,f){
                            if(v==0)
                                $.prompt.close()
                            if (v == 1) 
                                return true; //we're done
                            else if(v=-1)
                                $.prompt.goToState('state0');//go back
                            return false; 
                        }
                    },
                    state3: {
                        html:'<p>Добавить файл с видеоизображением?</p><div class="field">'+
                        '<FORM ENCTYPE="multipart/form-data" METHOD=POST action="load_img.php">'+
                            '<input type=file name=myfile size = 40  class=brown>'+
                            '<input type=hidden id="id_m" name=id_m value='+x+'>'+
                            '<br><br>'+
                            '<input type=submit name=aha value="Закачать файл" >'+
                            '<br><br>'+
                            '</form>'+                            
                        '</div>',
                        buttons: { Back: -1, Cancel: 0, Next: 1 },
                        focus: 2,
                        submit:function(v,m,f){
                            if(v==0)
                                $.prompt.close()
                            if (v == 1) 
                                return true; //we're done
                            else if(v=-1)
                                $.prompt.goToState('state0');//go back
                            return false; 
                        }
                    }
                
                    
                    
				}         
// $.prompt(temp,{ callback: function(v,m,f){ var str = "HERE YOUR:<br />";$.each(f,function(i,obj){    str += i + " - <em>" + obj + "</em><br />";}); $.prompt(str);} }); }

$.prompt(temp ); 
            }
		</script>


