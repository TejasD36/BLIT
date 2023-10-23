<?php
$connection = mysqli_connect("localhost", "root", "", "task1") or die("Database is not connected." . mysqli_connect_error());

$sql = "SELECT * FROM user";
$result = mysqli_query($connection, $sql);

echo'<html lang="en">
    <head>
    <link rel="stylesheet" href="register.css">
    <title>Welcome User</title>
    </head>
    <body>
    <form action="#" method="POST">
        <div class="wrapper" style="max-width: 100%;">
        <h2>Welcome Admin</h2>';


if (mysqli_num_rows($result) > 0) {
    echo '<table style="border-collapse: collapse; width: 50%; margin: 0 auto;">';
    echo '
        <tr>
            <th style="border: 2px solid black; padding: 8px; text-align: center;">ID</th>
            <th style="border: 2px solid black; padding: 8px; text-align: center;">Name</th>
            <th style="border: 2px solid black; padding: 8px; text-align: center;">Mobile_No</th>
            <th style="border: 2px solid black; padding: 8px; text-align: center;">Age</th>
            <th style="border: 2px solid black; padding: 8px; text-align: center;">Email</th>
            <th style="border: 2px solid black; padding: 8px; text-align: center;">Password</th>
            <th style="border: 2px solid black; padding: 8px; text-align: center;">Delete</th>
        </tr>
    ';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
            <tr>
                <td style="border: 2px solid black; padding: 8px; text-align: center;">' . $row['id'] . '</td>
                <td style="border: 2px solid black; padding: 8px; text-align: center;">' . $row['name'] . '</td>
                <td style="border: 2px solid black; padding: 8px; text-align: center;">' . $row['mob_no'] . '</td>
                <td style="border: 2px solid black; padding: 8px; text-align: center;">' . $row['age'] . '</td>
                <td style="border: 2px solid black; padding: 8px; text-align: center;">' . $row['email'] . '</td>
                <td style="border: 2px solid black; padding: 8px; text-align: center;">' . $row['password'] . '</td>
                <td style="border: 2px solid black; padding: 8px; text-align: center;">Delete: <input type="checkbox" value="'.$row['id'].'" name="check_list"></td>
            </tr>';
    }
    // if(!empty($_POST['check_list'])){
    // Loop to store and display values of individual checked checkbox.
    //     foreach($_POST['check_list'] as $selected){
    //         echo $selected."</br>";
    //     }
    // }
}
    echo '</table></div></form></body></html>';
    // if(isset($_POST['submit'])){//to run PHP script on submit

?>
