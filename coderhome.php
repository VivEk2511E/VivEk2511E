<?php
include './coderheader.php';
if(!isset($_GET['did']) && !isset($_POST['sub1'])) {
$result = mysqli_query($link, "select p.id,buyername,cmp,country,postdt,ptitle,descr,apptype,technology,delivertime,pamt  from projects p,buyers b where p.buyerid=b.userid and allotdt='0000-00-00' order by postdt");
echo "<div class='f-center'><h2>AVAILABLE PROJECTS</h2></div>";
echo "<div class='disp'>";
echo "<table class='user_view'><thead><tr><th>Buyer<th>Company<th>Country<th>Posted On<th>Title<th>Description<th>Type<th>Technology<th>Delivery On<th>Amount<th>Task<tbody>";
while($row = mysqli_fetch_row($result)) {
    echo "<tr>";
    foreach($row as $k=>$r) {
        if($k!=0)
        echo "<td>".nl2br($r);        
    }
    echo "<td><a href='coderhome.php?did=$row[0]&tech=$row[8]' onclick=\"javascript:return confirm('Are You Sure to Send Interest ?')\">Send Interest</a>";
}
mysqli_free_result($result);
echo "</tbody></table>";
echo "</div>";
} else if(isset($_GET['did']) && !isset($_POST['sub1'])) {
    $postid = $_GET['did'];
    $result = mysqli_query($link, "select lang from coders where userid='$_SESSION[coderid]'");
    $row = mysqli_fetch_row($result);
    mysqli_free_result($result);
    $pos = stripos($row[0], $_GET['tech']);
    if(is_bool($pos)) {
        echo "<div class='center'>Project Technology not match your known Languages...!<br><a href='coderhome.php'>Back</a></div>";
        include './footer.php';
        return;
    }
?>
<form name="f" action="coderhome.php" method="post">
    <table class="center_tab">
	<thead>
	    <tr>
                <th colspan="2">YOUR AMOUNT</th>
	    </tr>
	</thead>
	<tbody>
                    <tr>
		<th>Quote Amount</th>
		<td><input type="text" name="coderamt" required autofocus pattern="\d+"><input type="hidden" name="postid" value="<?php echo $postid;?>"></td>
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
} else if(isset($_POST['sub1'])) {
    extract($_POST);
    $dt = date('Y-m-d',time());
    $b = mysqli_query($link, "insert into coderinterest(coderid,dt,postid,coderamt) values('$_SESSION[coderid]','$dt','$postid','$coderamt')");
    if($b) {
        echo "<div class='center'>Your Interest Send Successfully...!<br><a href='coderhome.php'>Back</a></div>";
    } else {
        echo "<div class='center'>You have already Send Interest for this Project...!<br><a href='coderhome.php'>Back</a></div>";
    }
}
include './footer.php';
?>