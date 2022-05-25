<?php
include './adminheader.php';
if(isset($_GET['did'])) {
    mysqli_query($link, "delete from buyers where userid='$_GET[did]'");
}
$result = mysqli_query($link, "select * from buyers");
echo "<div class='f-center'><h2>BUYERS</h2></div>";
echo "<div class='disp'>";
echo "<table class='user_view'><thead><tr><th>Name<th>Company<th>Country<th>Email<th>Task<tbody>";
while($row = mysqli_fetch_row($result)) {
    echo "<tr>";
    foreach($row as $k=>$r) {
        if($k!=4)
        echo "<td>$r";        
    }
    echo "<td><a href='viewbuyers.php?did=$row[3]' onclick=\"javascript:return confirm('Are You Sure to Delete ?')\">Delete</a>";
}
mysqli_free_result($result);
echo "</tbody></table>";
echo "</div>";
include './footer.php';
?>