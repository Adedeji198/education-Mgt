<?php defined('_JEXEC') or die ?>
    <div id="menu" >
        <ul >
            <li ><a href="index.php" >Home</a ></li>
            <li >
            <a href="<?php echo convertURL('enroll.html'); ?>" >Enroll</a >
            </li>
            <li >
            <a href="<?php echo convertURL('login.html'); ?>" >
            Login
            </a >
            </li>
            <li >
                <a href="<?php echo convertURL('about-us.html'); ?>" >About</a >
            </li>            
        </ul >
        <div id="clock" style="float:right; color:#fff; font-size:20px; padding: 1% " >
        </div>
    </div >
<script>
    function showTime(){
        var MonthList= [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
        ];
        var DayList = [
            "Sunday",
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday"
            
        ];
        var D = new Date();
        var Day,Month,Year;
        Day = DayList[ D.getDay() ];
        Month=MonthList[ D.getMonth() ];
        Year = D.getFullYear();
        
        var str = "Today: " + " "+Day+", "+ D.getDate()+" "+Month +
        ", "+Year;        
        console.log(str);
        var p_a = (D.getHours() >12) ? "PM": "AM";
        var Hour = D.getHours()%12;
        if (Hour==0){
            Hour = 12;
        }
        var M = D.getMinutes();
        if (M <10){
            M = '0' + M;
        }
        str += " "+Hour+ ":" + M+" "+p_a;
        document.getElementById("clock").innerHTML = str;
    }
    showTime();
    window.setInterval(showTime,10000);
</script>