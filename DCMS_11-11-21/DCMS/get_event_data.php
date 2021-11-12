<?php

include './connection.php';

//echo $_POST['date1'];
if (isset($_POST['date1']) && isset($_POST['date2'])) {
    $min = $_POST['date1'];
    $max = $_POST['date2'];
    $sql = "SELECT * FROM tblevent WHERE event_date BETWEEN '{$min}' AND '{$max}'";
} else {
    $sql = "SELECT * FROM tblevent ORDER BY id asc";
}

$result = mysqli_query($con, $sql);
$output = "";

//echo $_POST['date1'];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $dob = date('yy-mm-dd', strtotime($row['event_date']));
        $output .= "<tr>
                    <td align='center'>{$row['name']}</td>
                        <td>{$row['eventtype']}</td>
                    <td>{$row['event_date']}</td>
                        <td>{$row['venue']}</td>
                                <td>
                                <a href='view_report.php?id=" . $row['id'] . "' target='_blank'>PDF</a>
                                </td>
                  </tr>";
    }
    echo $output;
} else {
    echo "<h2>No Record Found.</h2>";
}

if (isset($_GET['id'])) {
    //header("Location: view_report.php");
}
?>
