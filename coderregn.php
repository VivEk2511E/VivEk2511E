<?php
$no_header_image=true;
include './header.php';
if(!isset($_POST['sub1'])) {
    $result = mysqli_query($link, "select tname from newtech");
?>
<form name="f" action="coderregn.php" method="post" onsubmit="return check()">
    <table class="center_tab">
	<thead>
	    <tr>
                <th colspan="2">NEW CODER</th>
	    </tr>
	</thead>
	<tbody>
                    <tr>
		<th>Your Name</th>
		<td><input type="text" name="codername" required autofocus></td>
	    </tr>
            <tr>
		<th>Gender</th>
		<td>
                    <input type="radio" name="g" value="Male" checked> Male &nbsp;
                    <input type="radio" name="g" value="Female"> Female
                </td>
	    </tr>
            <tr>
		<th>Country</th>
		<td><input type="text" name="country" required></td>
	    </tr>
            <tr>
		<th>Currency</th>
		<td>
                    <select name="currency">
		        <option value="rupee">Rupee</option>                        
                                        <option value="dollar">&dollar;</option>                        
                                        <option value="yen">&yen;</option>
                                        <option value="pound">&pound;</option>
                                        <option value="euro">&euro;</option>
		    </select>
                </td>
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
            <tr>
		<th>Experience (Years)</th>
		<td>
                    <select name="expr">
                        <?php
                        for($i=1; $i<=20; $i++)
                        echo "<option value='$i'>$i</option>";
                        ?>		        
		    </select>
                </td>
	    </tr>
            <tr>
                <th>Known Program <br>Languages</th>
                <td>
                        <?php
                        $c=1;
                        while($row = mysqli_fetch_row($result)) {
                            echo "<input type='checkbox' name='lang[]' value='$row[0]'>$row[0] &nbsp;&nbsp;&nbsp; ";
                            if($c%3==0)
                                echo "<br>";
                            $c++;
                        }
                        ?>
                    <!--textarea name="lang" required rows="4" style="width:200px;"></textarea-->
                </td>
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
    //$lang = addslashes($lang);
    $npwd = sha1($pwd);
    $lg="";
    foreach($lang as $v) {
        $lg.=$v.",";
    }
    $lg = substr($lg, 0,  strlen($lg)-1);
    echo $lg;
    mysqli_query($link, "insert into coders(codername,gender,country,currency,userid,pwd,expr,lang) values('$codername','$g','$country','$currency','$userid','$npwd','$expr','$lg')");
    echo "<div class='center'>Registered Successfully...!<br><a href='coderregn.php'>Back</a></div>";
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
        
       var elts = document.getElementsByName("lang[]")
         var bn=false
         for(i=0; i<elts.length; i++) {
             if(elts[i].checked) {
                 bn=true
             }
         }
         
         if(!bn) {
             alert("Select Program Languages...!")
             return false
         }
        return true
    }
</script>