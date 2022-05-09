<?php
//如果出現header already sent
//ob_start();

    

    session_start();
    setcookie("UID","",time()-1);

    $link = @mysqli_connect( 
        'localhost',  // MySQL主機名稱 
        'root',       // 使用者名稱 
        '*********',  // // 出於安全考量不打出密碼，這個程式會因此無法正常執行
        'php');  // 預設使用的資料庫名稱
?>

<?php
if(isset($_COOKIE['UID']))
{
    $cookieID=$_COOKIE['UID'];
    echo "<center>歡迎".$cookieID."回到本系統</center>";
}
else
{
    echo "<center>歡迎初次來到本系統</center>";
}
?>
<html>
<title>登入頁面</title>
    <body bgcolor='#be77f' >
        </br>
        </br>
        <font color="red" size="7" face="標楷體"><center><b>登入</b></center></font></br>
        

        <form action="" method="post" enctype="multipart/form-data">
                <center><b>帳號:<input type="text" name="uAccount" placeholder="account" required> </b></center></br></br>
                <center><b>密碼:<input type="password" name="uPassword" placeholder="password" required> </b></center></br></br>
                
                <center><b><input type="submit" value="登入"></b></center>
        </form>
        


        <?php
            //$Aaccount="admin";
            //$Apassword="123";
            //$Uaccount="user";
            //$Upassword="456";
            //date_default_timezone_set('Asia/Taipei');
            //echo date("Y-m-d H:i:s",time());
            //header('Refresh:1');

            if(isset($_POST["uAccount"]))
            {
                if($_POST["uAccount"]!=null)
                {
                    $uaccount=$_POST["uAccount"];
                    $upassword=$_POST["uPassword"];

                    $sql = "SELECT * FROM user WHERE uName='$uaccount' AND uPwd='$upassword'";
                    $result = mysqli_query($link, $sql);

                    if ( mysqli_num_rows($result)==1) 
                    {

                        $role=mysqli_fetch_assoc($result)["uRole"];
                        if($role=="user")
                        {
                            $_SESSION['login']='yes';
                            setcookie('UID',$uaccount,time()+17280);
                            header('Location: register.php');
                        }
                        elseif($role=="admin")
                        {
                            $_SESSION['login']='yes';
                            setcookie('UID',$uaccount,time()+17280);
                            header('Location: admin.php');
                        }
                    }
                    else
                    {
                        echo "<center>帳號或密碼錯誤</center>";
                    }




                    //echo "你的帳號: ".$uaccount."</br>";
                    //echo "你的密碼: ".$upassword."</br>";
                    //if($uaccount==$Uaccount&&$upassword==$Upassword)
                    //{
                        //echo "登入成功";
                    //    $_SESSION['login']='yes';
                    //    setcookie('UID',$uaccount,time()+17280);
                    //    header('Location: register.php');
                    //}
                    //elseif($uaccount==$Aaccount&&$upassword==$Apassword)
                    //{
                    //    $_SESSION['login']='yes';
                    //    setcookie('UID',$uaccount,time()+17280);
                    //    header('Location: admin.php');
                    //}
                    //else
                    //{
                    //    echo "<center>帳號或密碼錯誤</center>";
                    //}
                }
                else
                {
                    echo "<center>你還未輸入帳號密碼</center>";
                }
                
            }
            else
            {
                echo "<center>歡迎登入，請輸入帳密</center>";
            }
            

        ?>
    </body>
</html>
