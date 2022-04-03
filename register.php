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
<title>註冊頁面</title>
    <body bgcolor='#be77f' >
        <font color="red" size="7" face="標楷體"><center><b>註冊</b></center></font></br>
        

        <form action="information.php" method="post" enctype="multipart/form-data">
                <center><b>帳號:<input type="text" name="uAccount" placeholder="account" required> </b></center></br></br>
                <center><b>密碼:<input type="password" name="uPassword" placeholder="password" required> </b></center></br></br>
                <center><b>Email:<input type="email" name="uMail" placeholder="email" required> </b></center></br></br>
                <center><b>電話:<input type="text" name="uTel" placeholder="tel" required> </b></center></br>
                
                <center><b><input type="submit"></b></center>
        </form>
        
    </body>
</html>