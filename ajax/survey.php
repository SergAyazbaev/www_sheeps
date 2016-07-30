<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><style type="text/css" id="SEOBar-noindex-highlight">noindex a {border: 1px dashed red !important;}</style>

	
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>jQuery Impromptu States Survey Example</title>
		
		<link rel="stylesheet" media="all" type="text/css" href="examples.css">

        <script type="text/javascript" src="jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="jquery-impromptu.3.1.min.js"></script>
		
		<style type="text/css">			
			/*-------------------------------- */
            div.jqi .jqimessage .field{ padding: 2px 0; }
			div.jqi .jqimessage .field textarea{ width: 100%; height: 120px; }
			/*-------------------------------- */
		</style>
        
	
		<script type="text/javascript">
			function openprompt(){
			
				var temp = {
					state0: {
						html:'<p>How would you rate the content of this site?</p><div class="field"><input type="radio" name="rate_content" id="rate_content_poor" value="Poor" class="radioinput" /><label for="rate_content_poor">Poor</label></div><div class="field"><input type="radio" name="rate_content" id="rate_content_ok" value="Ok" class="radioinput" /><label for="rate_content_ok">Ok</label></div><div class="field"><input type="radio" name="rate_content" id="rate_content_good" value="Good" class="radioinput" /><label for="rate_content_good">Good</label></div><div class="field"><input type="radio" name="rate_content" id="rate_content_excellent" value="Excellent" class="radioinput" /><label for="rate_content_excellent">Excellent!</label></div>',
						buttons: { Cancel: false, Next: true },
						focus: 1,
						submit:function(v,m,f){ 
							if(!v)
								$.prompt.close()
							else $.prompt.goToState('state1');//go forward
							return false; 
						}
					},
					state1: {
						html:'<p>Check all which need improvement:</p><div class="field"><input type="checkbox" name="rate_improve" id="rate_improve_colors" value="Color Scheme" class="radioinput" /><label for="rate_improve_colors">Color Scheme</label></div><div class="field"><input type="checkbox" name="rate_improve" id="rate_improve_graphics" value="Graphics" class="radioinput" /><label for="rate_improve_graphics">Graphics</label></div><div class="field"><input type="checkbox" name="rate_improve" id="rate_improve_readability" value="readability" class="radioinput" /><label for="rate_improve_readability">Readability</label></div><div class="field"><input type="checkbox" name="rate_improve" id="rate_improve_content" value="Content" class="radioinput" /><label for="rate_improve_content">Content</label></div><div class="field"><input type="checkbox" name="rate_improve" id="rate_improve_other" value="Other" class="radioinput" /><label for="rate_improve_other">Other</label> <input type="text" name="rate_improve_other_txt" id="rate_improve_other_txt" value="" /></div>',
						buttons: { Back: -1, Cancel: 0, Next: 1 },
						focus: 2,
						submit:function(v,m,f){
							if(v==0)
								$.prompt.close()
							else if(v==1)
								$.prompt.goToState('state2');//go forward
							else if(v=-1)
								$.prompt.goToState('state0');//go back
							return false; 
						}
					},
					state2: {
						html:'How did you first find out about this site?<div class="field"><select name="rate_find" id="rate_find"><option value="Search">Search</option><option value="Online Publication">Online Publication</option><option value="friend">A Friend</option><option value="No Clue">No Clue</option></select></div>',
						buttons: { Back: -1, Cancel: 0, Next: 1 },
						focus: 2,
						submit: function(v, m, f){
							if (v == 0) 
								$.prompt.close()
							else 
								if (v == 1) 
									$.prompt.goToState('state3');//go forward
								else 
									if (v = -1) 
										$.prompt.goToState('state1');//go back
							return false;
						}
					},
					state3: {
						html:'<p>Please leave any other comments you have about this site:</p><div class="field"><textarea id="rate_comments" name="rate_comments"></textarea></div>',
						buttons: { Back: -1, Cancel: 0, Finish: 1 },
						focus: 2,
						submit:function(v,m,f){ 
							if(v==0) 
								$.prompt.close()
							else if(v==1)								
								return true; //we're done
							else if(v=-1)
								$.prompt.goToState('state2');//go back
							return false; 
						}
					}
				}
				
				$.prompt(temp,{
					callback: function(v,m,f){
						var str = "You can now process with this given information:<br />";
						$.each(f,function(i,obj){
							str += i + " - <em>" + obj + "</em><br />";
						});	
						$.prompt(str);
					}
				});
			}
		</script>
	</head><body>
		<a href="javascript:openprompt()">Test Impromptu States Survey</a>
	</body></html>