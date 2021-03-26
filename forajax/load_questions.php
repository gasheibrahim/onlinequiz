<?php
session_start();
include "../connection.php";

$question_no="";
$question="";
$opt1="";
$opt2="";
$opt3="";
$opt4="";
$opt5="";
$answer="";
$count=0;
$ans="";

$queno=$_GET["questionno"];

if(isset($_SESSION["answer"][$queno]))
{
    $ans=$_SESSION["answer"][$queno];
}
$res=mysqli_query($con,"select * from questions where category='$_SESSION[exam_category]' && question_no=$_GET[questionno]");
$count=mysqli_num_rows($res);
if($count==0)
{
    echo "over";
}
else{
    while($row=mysqli_fetch_array($res))
    {
        $question_no=$row["question_no"];
        $question=$row["question"];
        $opt1=$row["opt1"];
        $opt2=$row["opt2"];
        $opt3=$row["opt3"];
        $opt4=$row["opt4"];
        $opt5=$row["opt5"];
    }
    ?>
    <br>
         <table>
             <tr>
                 <td style="font-weight:bold;font-size:18px;padding-left:5px;" colspan="2">
                    <?php echo "( ".$question_no ." ) ".$question; ?>
                 </td>
             </tr>
         </table>
         <table style="margin-left:10px;">
             <tr>
                 <td>
                    <strong>A.</strong>
                     <input type="radio" id="r1" name="r1" value="<?php echo $opt1; ?>" onclick="radioclick(this.value,<?php echo $question_no ?>)"
                     <?php
                        if($ans == $opt1)
                        {
                            echo "checked";
                        }
                     ?>>
                     <label><?php echo $opt1; ?></label><br>
                 </td>
             </tr>
             <tr>
                 <td>
                    <strong>B.</strong>
                     <input type="radio" name="r1" id="r1" value="<?php echo $opt2; ?>" onclick="radioclick(this.value,<?php echo $question_no ?>)"
                     <?php
                        if($ans == $opt2)
                        {
                            echo "checked";
                        }
                     ?>>
                     <label><?php echo $opt2; ?></label><br>
                 </td>
             </tr>
             <tr>
                 <td>
                     <strong>C.</strong>
                     <input type="radio" name="r1" id="r1" value="<?php echo $opt3; ?>" onclick="radioclick(this.value,<?php echo $question_no ?>)"
                     <?php
                        if($ans == $opt3)
                        {
                            echo "checked";
                        }
                     ?>>
                     <label><?php echo $opt3; ?></label><br>
                 </td>
             </tr>
             <tr>
                 <td>
                    <strong>D.</strong>
                     <input type="radio" name="r1" id="r1" value="<?php echo $opt4; ?>" onclick="radioclick(this.value,<?php echo $question_no ?>)"
                     <?php
                        if($ans == $opt4)
                        {
                            echo "checked";
                        }
                     ?>>
                     <label><?php echo $opt4; ?></label><br>
                 </td>
             </tr>
             <tr>
                 <td>
                    <strong>E.</strong>
                     <input type="radio" name="r1" id="r1" value="<?php echo $opt5; ?>" onclick="radioclick(this.value,<?php echo $question_no ?>)"
                     <?php
                        if($ans == $opt5)
                        {
                            echo "checked";
                        }
                     ?>>
                     <label><?php echo $opt5; ?></label><br>
                 </td>
             </tr>
         </table>

    <?php
}

?>