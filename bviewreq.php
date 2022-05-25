<?php
include './buyersheader.php';
if(!isset($_GET['ciid']) && !isset($_POST['sub1'])) {
    $result = mysqli_query($link, "select id,ptitle from projects where buyerid='$_SESSION[buyerid]' and coderid=''");
?>
<form name="f" action="bviewreq.php" method="post">
    <table class="center_tab">
	<thead>
	    <tr>
                <th colspan="2">CODERS REQUEST</th>
	    </tr>
	</thead>
	<tbody>
                    <tr>
		<th>Select Project</th>
	<td>
                    <select name="projid">
                        <?php
                        while ($row = mysqli_fetch_row($result)) {
                            echo "<option value='$row[0]'>$row[0] - $row[1]</option>";
                        }
                        mysqli_free_result($result);
                        ?>
                    </select>
                </td>
	    </tr>            
	</tbody>
	<tfoot>
	    <tr>
		<td colspan="2" class="center">
		    <input type="submit" name="sub1" value="View Request">
		</td>
	    </tr>
	</tfoot>
    </table>
</form>
<?php
} else if(isset($_POST['sub1'])) {
    extract($_POST);
    
    $result = mysqli_query($link, "select c.id,c.postid,c.dt,r.codername,r.country,r.expr,c.coderamt,p.pamt,r.userid from coderinterest c,coders r,projects p where c.coderid=r.userid and c.postid=p.id and c.postid='$projid'");
echo "<div class='f-center'><h2>CODERS INFORMATION</h2></div>";
echo "<div class='disp'>";
echo "<table class='user_view'><thead><tr><th>Date<th>Coder Name<th>Country<th>Experience<th>Coder Amount<th>Your Amount<th>Task<tbody>";
while($row = mysqli_fetch_row($result)) {
    echo "<tr>";
    foreach($row as $k=>$r) { 
        if($k!=0&&$k!=1&&$k!=8)
        echo "<td>$r";        
    }
    echo "<td><a href='bviewreq.php?ciid=$row[0]&postid=$row[1]&coderid=$row[8]' onclick=\"javascript:return confirm('Are You Sure to Delete ?')\">Sanction</a> | <a href='viewreviews.php?coderid=$row[8]' target='_blank'>Review about Coder</a>";
}
mysqli_free_result($result);
echo "</tbody></table>";
echo "</div>";
} else if(isset($_GET['ciid'])) {
    extract($_GET);
    $b = mysqli_query($link, "update coderinterest set accept='accept' where id='$ciid'");
    if($b) {
        mysqli_query($link, "update coderinterest set accept='reject' where postid='$postid' and id!='$ciid'");
        $dt = date('Y-m-d',time());
        mysqli_query($link, "update projects set coderid='$coderid',allotdt='$dt' where id='$postid'");
        echo "<div class='center'>Project Sanctioned Successfully...!<br><a href='bviewreq.php'>Back</a></div>";
    } else {
        echo "<div class='center'>".mysqli_error($link)."<br><a href='bviewreq.php'>Back</a></div>";
    }
}
include './footer.php';
?>