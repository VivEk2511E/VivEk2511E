<?php
$no_header_image=true;
include './header.php';
if(!isset($_POST['sub1'])) {
?>
<form name="f" action="buyerregn.php" method="post" onsubmit="return check()">
    <table class="center_tab">
	<thead>
	    <tr>
                <th colspan="2">NEW BUYER</th>
	    </tr>
	</thead>
	<tbody>
                    <tr>
		<th>Your Name</th>
		<td><input type="text" name="buyername" required autofocus></td>
	    </tr>
            <tr>
		<th>Company Name/Address</th>
		<td><textarea name="cmp" required rows="5" style="width:250px;"></textarea></td>
	    </tr>
            <tr>
		<th>Country</th>
		<td><input type="text" name="country" required></td>
	    </tr>            
	    <tr>
		<th>EMail (Userid)</th>
		<td><input type="text" name="userid" required></td>
	    </tr>
	    <tr>
		<th>Password</th>
		<td><input type="password" name="pwd" required></td>
	    </tr>
                    <tr>
		<th>Confirm Pwd</th>
		<td><input type="password" name="cpwd" required></td>
	    </tr>
	</tbody>
	<tfoot>
	    <tr>
		<td colspan="2" class="center">
		    <input type="submit" name="sub1" value="Register">
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
    $cmp = addslashes($cmp);
    mysqli_query($link, "insert into buyers(buyername,cmp,country,userid,pwd) values('$buyername','$cmp','$country','$userid','$pwd')");
    echo "<div class='center'>Registered Successfully...!<br><a href='buyerregn.php'>Back</a></div>";
}
include './footer.php';
?>
<script>
    function check() {
        var email = f.userid.value
        var pwd = f.pwd.value
        var cpwd = f.cpwd.value
        
        var ep = /^\w+\@[a-z]+\.([a-z]{3}|[a-z]{2}\.[a-z]{2}){1}$/
        
        if(!email.match(ep)) {
            alert("Invalid Email...!")
            f.userid.focus()
            return false
        }
        if(pwd!=cpwd) {
            alert("Confirm Password not Match")
            f.cpwd.focus()
            return false
        }
        return true
    }
</script>