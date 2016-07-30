	var request;
            /**
            * Load XMLDoc function
            */
            function doLoad(url) {	
			
			
		if (url == '')  url='users_relay_backend.php?id_login='+url ; 
//alert(url);			
              if (window.XMLHttpRequest) {
                request = new XMLHttpRequest();
                request.onreadystatechange = processRequestChange;
                request.open("GET", url, true);
                request.send(null);
              } else if (window.ActiveXObject) {
                request = new ActiveXObject("Microsoft.XMLHTTP");
                if (!request) { request = new ActiveXObject("Msxml2.XMLHTTP"); }
                if (request) {
                  request.onreadystatechange = processRequestChange;
                  request.open("GET", url, true);
                  request.send();
                }
              }
            }
            /**
            * Get request state text function
            */
            function getRequestStateText(code) {
              switch(code) {
                case 0: return "Uninitialized."; break;
                case 1: return "Loading..."; break;
                case 2: return "Loaded."; break;
                case 3: return "Interactive..."; break;
                case 4: return "Complete."; break;
                //default: return "No Complete."; break;
              }
			  //return "Bad Complete.";
            }
            /**
            * Event on request change
            */
            function processRequestChange() {
              document.getElementById("resultdiv").style.display = 'none';
				document.getElementById("state").value = getRequestStateText(request.readyState);
              abortRequest = window.setTimeout("request.abort();", 10000);
              if (request.readyState == 4) {
                clearTimeout(abortRequest);
						//document.getElementById("statuscode").value = request.status;
						//document.getElementById("statustext").value = request.statusText;
                if (request.status == 200) {
                  document.getElementById("resultdiv").style.display = 'block';
                  document.getElementById("responseHTML").innerHTML = request.responseText;
                } else {
                  alert("Не удалось получить данные:\n" + request.statusText);
                }
                document.getElementById("loading").style.display = 'none';
              }
              else if (request.readyState == 3 || request.readyState == 1) {
    	        document.getElementById("loading").style.display = 'block';
              }
            }
			
