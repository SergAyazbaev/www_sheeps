
<div id="loading" style="  
    position: static;
    width: auto;
    display: none;	
    height: 40px;
    font-family: Tahoma, Verdana;
    font-size: 11px;	
    background: #EEEEEE;
    padding: 5 5 5 5;
    ">	  

    <center><br>&nbsp; Загружаем данные... &nbsp;<br><br>

        <div id="canselloading"
            style="
            background: Silver;
            border: 1px solid #000000;
            color: Black;
            padding: 2 2 2 2;
            cursor: pointer;
            width: 125px;
            "
            onClick="  request.abort(); document.getElementById(\'loading\').style.display = \'none\'; return false;">    <<a href>Прекратить </a>
        </div>
    </center>
            </div>
';
?>