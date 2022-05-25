<?php
include './buyersheader.php';
if(!isset($_GET['pid']) && !isset($_POST['sub1'])) {
$result = mysqli_query($link, "select p.id,postdt,ptitle,descr,apptype,technology,p.coderid,codername,country,allotdt from projects p,coders c where p.coderid=c.userid and p.buyerid='$_SESSION[buyerid]'");
echo "<div class='f-center'><h2>ALLOTTED PROJECTS</h2></div>";
echo "<div class='disp'>";
echo "<table class='user_view'><thead><tr><th>Post Date<th>Title<th>Description<th>Type<th>Technology<th>Coder Id<th>Name<th>Country<th>Allot Date<th>Task<tbody>";
while($row = mysqli_fetch_row($result)) {
    echo "<tr>";
    foreach($row as $k=>$r) {
        if($k!=0)
        echo "<td>$r";        
    }
    echo "<td><a href='bviewallot.php?pid=$row[0]&coderid=$row[6]' onclick=\"javascript:return confirm('Are You Sure to Give Review ?')\">Review</a>";
}
mysqli_free_result($result);
echo "</tbody></table>";
echo "</div>";
} else if(isset ($_GET['pid'])) {
    extract($_GET);
?>
<form name="f" action="bviewallot.php" method="post">
    <table class="center_tab">
	<thead>
	    <tr>
                <th colspan="2">YOUR REVIEW ON CODER</th>
	    </tr>
	</thead>
	<tbody>
                    <tr>
		<th>Your Review</th>
                                <td>
                                    <textarea name="cmnt" style="width:300px" rows="5" autofocus></textarea>
                                    <input type="hidden" name="coderid" value="<?php echo $coderid;?>">
                                    <input type="hidden" name="pid" value="<?php echo $pid;?>">
                                </td>
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
    $cmnt = addslashes($cmnt);
    $b = mysqli_query($link, "insert into coderreview(dt,buyerid,coderid,projid,cmnt) values('$dt','$_SESSION[buyerid]','$coderid','$pid','$cmnt')");
    if($b)
    echo "<div class='center'>Comment Stored Successfully...!<br><a href='bviewallot.php'>Back</a></div>";
    else
        echo "<div class='center'>".mysqli_error($link)."<br><a href='bviewallot.php'>Back</a></div>";
}
include './footer.php';
?>