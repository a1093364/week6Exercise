<?php
    session_start();
    if(isset($_SESSION['login']))
    {
        if($_SESSION['login']=='yes')
        {
            echo "<center><a href='logout.php'>登出系統</a></center>";
        }
        else
        {
            echo "<font color=red size=6 ><center><b>非法進入:(</b></center></font></br>";
            echo "<center><a href='login.php'>回登入頁</a></center>";
            exit();
        }
    }
    else
    {
        echo "<font color=red size=6 ><center><b>非法進入:(</b></center></font></br>";
        echo "<center><a href='login.php'>回登入頁</a></center>";
        exit();
    }
    
?>
<html>
<title>admin頁面</title>
    <body bgcolor='#be77f' >
        </br></br></br>
        <font color="red" size="7" face="標楷體"><center><b>Welcome to admin!</b></center></font></br>
        
    </body>
</html>