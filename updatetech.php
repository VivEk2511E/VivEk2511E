<?php
include './coderheader.php';
if(!isset($_POST['sub1'])) {
    $result = mysqli_query($link, "select tname from newtech");
    $res1 = mysqli_query($link, "select lang from coders where userid='$_SESSION[coderid]'");
    $row1 = mysqli_fetch_row($res1);
    $langs = explode(',',$row1[0]);
    mysqli_free_result($res1);
?>
<form name="f" action="updatetech.php" method="post" onsubmit="return check()">
    <table class="center_tab">
	<thead>
	    <tr>
                <th colspan="2">YOUR KNOWN LANGUAGE</th>
	    </tr>
	</thead>
	<tbody>
                    <tr>
                        <th>Known Languages</th>
                        <td>
                            <?php
                            $c=1;
                            while($row = mysqli_fetch_row($result)) {
                                $b=false;
                                foreach($langs as $v) {
                                    if(strcasecmp($v, $row[0])==0)
                                            $b=true;
                                }
                                if($b)
                                echo "<input type='checkbox' name='lang[]' value='$row[0]' checked>$row[0]&nbsp;&nbsp; ";
                                else 
                                    echo "<input type='checkbox' name='lang[]' value='$row[0]'>$row[0]&nbsp;&nbsp; ";
                                if($c%5==0)
                                    echo "<br>";
                                $c++;                                
                            }
                            mysqli_free_result($result);
                            ?>
                        </td>
                </tbody>
	<tfoot>
	    <tr>
		<td colspan="2" class="center">
		    <input type="submit" name="sub1" value="Update">
		</td>
	    </tr>
	</tfoot>
    </table>
</form>                
<?php
} else {
    extract($_POST);
    $lg="";
    foreach ($lang as $v) {
        $lg.=$v.",";
    }
    $lg = substr($lg, 0,  strlen($lg)-1);
    mysqli_query($link, "update coders set lang='$lg' where userid='$_SESSION[coderid]'");
    echo "<div class='center'>Languages Updated Successfully...!<br><a href='updatetech.php'>Back</a></div>";
}
include './footer.php';
?>
<script>
    function check() {               
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