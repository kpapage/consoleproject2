<?php
require 'db-res-pdo.php';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


$sql= "SELECT * FROM users";
$statement=$conn->prepare($sql);
$statement->execute();
$result=$statement->fetchAll();
$total_rows= $statement->rowCount();
$output='
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Σημείο</th>
            <th>Είδος Χρήστη</th>
            <th>Διαγραφή</th>
        </tr>
';
if($total_rows>0)
{
    foreach($result as $row)
    {
        $output.='
        <tr>
            <td>'.$row["id"].'</td>
            <td>'.$row["username"].'</td>
            <td>'.$row["email"].'</td>
            <td>'.$row["point_loc"].'</td>
            <td>'.$row["user_type"].'</td>
            <td><button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Διαγραφή</button></td>

        </tr>
        ';
    }
}else
{
    $output.='
    <tr>
        <td colspan="4">No Data Found</td>
    </tr>
    ';
}
$output.='</table></div>';

echo $output;

?>