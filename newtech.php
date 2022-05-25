<?php
include './adminheader.php';
if(!isset($_POST['sub1'])) {
?>
<form name="f" action="newtech.php" method="post">
    <table class="center_tab">
	<thead>
	    <tr>
                <th colspan="2">NEW TECHNOLOGY</th>
	    </tr>
	</thead>
	<tbody>
                    <tr>
		<th>Technology Name</th>
		<td><input type="text" name="tname" required autofocus></td>
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
if(isset($_GET['tn'])) {
    mysqli_query($link, "delete from newtech where tname='$_GET[tn]'");
}
$result = mysqli_query($link, "select * from newtech");
echo "<div class='f-center'><h2>TECHNOLOGY LIST</h2></div>";
echo "<div class='disp'>";
echo "<table class='user_view'><thead><tr><th>Technology Name<th>Task<tbody>";
while($row = mysqli_fetch_row($result)) {
    echo "<tr>";
    foreach($row as $k=>$r) {
        echo "<td>$r";        
    }
    echo "<td><a href='newtech.php?tn=$row[0]' onclick=\"javascript:return confirm('Are You Sure to Delete ?')\">Delete</a>";
}
mysqli_free_result($result);
echo "</tbody></table>";
echo "</div>";
} else {
    extract($_POST);
    $tname = addslashes($tname);
    mysqli_query($link, "insert into newtech(tname) values('$tname')");
    echo "<div class='center'>Technology Stored Successfully...!<br><a href='newtech.php'>Back</a></div>";
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