<?php
include './adminheader.php';
if(isset($_GET['did'])) {
    mysqli_query($link, "delete from coders where userid='$_GET[did]'");
}
$result = mysqli_query($link, "select * from coders");
echo "<div class='f-center'><h2>CODERS</h2></div>";
echo "<div class='disp'>";
echo "<table class='user_view'><thead><tr><th>Name<th>Gender<th>Country<th>Currency<th>Email<th>Experience<br>(Years)<th>Languages<th>Task<tbody>";
while($row = mysqli_fetch_row($result)) {
    echo "<tr>";
    foreach($row as $k=>$r) {
        if($k!=5)
        echo "<td>$r";        
    }
    echo "<td><a href='adminhome.php?did=$row[4]' onclick=\"javascript:return confirm('Are You Sure to Delete ?')\">Delete</a>";
}
mysqli_free_result($result);
echo "</tbody></table>";
echo "</div>";
include './footer.php';
?>