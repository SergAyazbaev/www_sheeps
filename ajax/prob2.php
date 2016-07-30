<?    header("Content-type: text/html; charset=windows-1251");      
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
?>

        <link rel="stylesheet" media="all" type="text/css" href="ajax/examples.css">
        <script type="text/javascript" src="ajax/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="ajax/jquery-impromptu.3.1.min.js"></script>

		<script type="text/javascript">
			function openprompt( x,y ){
			
				var temp = {
					state0: {
						html:'<iframe border=0 src="popup_maket.php?x='+x+'&y='+y+'" width="350" height="400">'+                        
                        '</iframe>'+
                        '<a href="" >Просмотр страницы </a>' ,
                        buttons: { Аватар: 1, Фото: 2, Видео: 3, Просмотр_страницы: 4,  Вернуться: 0 },
                        focus: 4,
                        submit:function(v,m,f){ 
                            if(v==0)
                                $.prompt.close()
                            else if (v == 1) 
                                $.prompt.goToState('state1');
                            else if (v == 2) 
                                $.prompt.goToState('state2');
                            else if (v == 3) 
                                $.prompt.goToState('state3');
                            else if (v == 4) {                                
                                $.prompt.close();
                                $('#rounded-box-grey2').slideToggle("slow");    
                                //$('h3').slideToggle("slow");
                                $('h3').before("<button id='button'>Закрыть просмотр страницы</button>")
                                //$('h3').replaceWith("<h3><button id='button'>Закрыть просмотр страницы</button></h3>")
                                   //$(this).replaceWith("<div>" + $(this).text() + "</div>");
$("#button").click(function(){ 
 $('#help1').slideToggle("slow");
 //$('#rounded-box-grey2').slideToggle("slow");    

})

                                
                                $('div.wrapper_space').before("<div class='images'><div>");
                                 //$('div.images').load("work.html");
                                 $('div.images').load("images/group_foto/1/82_36/82_1.xml");
                                $('#help1').slideToggle("slow");
                                //$('#help1').hide('slow');
                                }                                
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
                            '<input type=hidden id="id_image" name="id_image" value="'+x+'" >'+
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
                        html:'<a id="btn1">заказать</a> ',
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
                    state4: {
                        html:'asdf sadf<a id="btn1">заказать</a> ',
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

