<?php
$no_header_image=true;
include './header.php';
if(!isset($_POST['sub1'])) {
?>
<form name="f" action="" method="post">
    <table class="center_tab">
	<thead>
	    <tr>
                <th colspan="2">LOGIN</th>
	    </tr>
	</thead>
	<tbody>
	    <tr>
		<th>UserId</th>
		<td><input type="text" name="userid" required autofocus></td>
	    </tr>
	    <tr>
		<th>Password</th>
		<td><input type="password" name="pwd" required></td>
	    </tr>
	    <tr>
		<th>Type</th>
		<td>
		    <select name="utype">
		        <option value="buyer">Buyer</option>                        
                                        <option value="coder">Coder</option>                        
                                        <option value="admin">Admin</option>
		    </select>
		</td>
	    </tr>
	</tbody>
	<tfoot>
	    <tr>
		<td colspan="2" class="center">
		    <input type="submit" name="sub1" value="Login">
		    <!--br>
		    Don't You have Id? &nbsp;<a href="regn.php#reg">Register</a-->
		</td>
	    </tr>
	</tfoot>
    </table>
</form>
<?php
} else {
    extract($_POST);
    if(strcasecmp($utype, "admin")==0) {
        $result = mysqli_query($link, "select * from admin where userid='$userid' and 
pwd='$pwd'") or die(mysqli_error($link));
        if(mysqli_num_rows($result)>0) {
            $_SESSION['adminuserid'] = $userid;
            header("Location:adminhome.php");
        } else {
            echo "<div class='center'>Invalid Userid/Password...!<br><a href='adminlogin.php'>Back</a></div>";
        }
        mysqli_free_result($result);        
    } else if(strcasecmp($utype, "coder")==0) {
        $npwd = sha1($pwd);
        $result = mysqli_query($link, "select * from coders where userid='$userid' and pwd='$npwd'") or die(mysqli_error($link));
        if(mysqli_num_rows($result)>0) {
            $row = mysqli_fetch_row($result);            
            $_SESSION['coderid'] = $userid;
            header("Location:coderhome.php");
        } else {
            echo "<div class='center'>Invalid Userid/Password...!<br><a href='index.php'>Back</a></div>";
        }
        mysqli_free_result($result);
    } else if(strcasecmp($utype, "buyer")==0) {
        $result = mysqli_query($link, "select * from buyers where userid='$userid' and pwd='$pwd'") or die(mysqli_error($link));
        if(mysqli_num_rows($result)>0) {
            $row = mysqli_fetch_row($result);
            $_SESSION['buyerid'] = $userid;
            header("Location:buyerhome.php");
        } else {
            echo "<div class='center'>Invalid Userid/Password...!<br><a href='index.php'>Back</a></div>";
        }
        mysqli_free_result($result);
    }
}
include './footer.php';
?>