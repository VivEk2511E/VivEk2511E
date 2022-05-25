<?php
include './buyersheader.php';
if(!isset($_POST['sub1'])) {
    $result = mysqli_query($link, "select tname from newtech");
?>
<form name="f" action="buyerhome.php" method="post">
    <table class="center_tab">
	<thead>
	    <tr>
                <th colspan="2">NEW PROJECT</th>
	    </tr>
	</thead>
	<tbody>
                    <tr>
		<th>Project Title</th>
		<td><input type="text" name="ptitle" required autofocus></td>
	    </tr>
            <tr>
		<th>Description</th>
		<td><textarea name="descr" required rows="5" cols="35"></textarea></td>
	    </tr>
            <tr>
                <th>Application Type</th>
                <td>
                    <select name="apptype">
                        <option value="web">Web Application</option>
                        <option value="windows">Windows Application</option>
                        <option value="mobile">Mobile Application</option>
                    </select>
                </td>
            </tr>
            <tr>
	<th>Technology to Use</th>
	<td>
            <select name="technology">
                <?php
                while($row=  mysqli_fetch_row($result)) {
                    echo "<option value='$row[0]'>$row[0]</option>";
                }
                mysqli_free_result($result);
                ?>
            </select>
                </td>
            </tr>            
	    <tr>
		<th>Posted On</th>
		<td><input type="text" name="postdt" value="<?php echo date('Y-m-d',time())?>" required></td>
	    </tr>
	    <tr>
		<th>Deliverable Timeline</th>
		<td><input type="text" name="delivertime" required></td>
	    </tr>
                    <tr>
		<th>Project Amount</th>
		<td><input type="text" name="pamt" pattern="\d+" required></td>
	    </tr>
	</tbody>
	<tfoot>
	    <tr>
		<td colspan="2" class="center">
		    <input type="submit" name="sub1" value="Submit">
		</td>
	    </tr>
	</tfoot>
    </table>
</form>
<?php
} else {
    extract($_POST);
    $descr = addslashes($descr);
    mysqli_query($link, "insert into projects(buyerid,postdt,ptitle,descr,apptype,technology,delivertime,pamt) values('$_SESSION[buyerid]','$postdt','$ptitle','$descr','$apptype','$technology','$delivertime','$pamt')");
    echo "<div class='center'>Project Posted Successfully...!<br><a href='buyerhome.php'>Back</a></div>";
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