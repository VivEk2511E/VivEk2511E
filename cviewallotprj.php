<?php
include './coderheader.php';
if(isset($_GET['did'])) {
    //mysqli_query($link, "delete from buyers where userid='$_GET[did]]'");
}
$result = mysqli_query($link, "select c.dt,p.postdt,ptitle,descr,apptype,technology,delivertime,pamt,c.coderamt from coderinterest c,projects p where c.postid=p.id and c.accept='accept' and c.coderid='$_SESSION[coderid]'");
echo "<div class='f-center'><h2>ALLOTTED PROJECTS</h2></div>";
echo "<div class='disp'>";
echo "<table class='user_view'><thead><tr><th>Req Date<th>Post Date<th>Title<th>Description<th>Type<th>Technology<th>Deliver Time<th>Amount<th>Your Amount<tbody>";
while($row = mysqli_fetch_row($result)) {
    echo "<tr>";
    foreach($row as $k=>$r) {        
        echo "<td>$r";        
    }
    //echo "<td><a href='viewbuyers.php?did=$row[3]' onclick=\"javascript:return confirm('Are You Sure to Delete ?')\">Delete</a>";
}
mysqli_free_result($result);
echo "</tbody></table>";
echo "</div>";
include './footer.php';
?>