<?php
function make_table($rows)
{
    if (!empty($rows)) {
        echo "<table border=1>";
        echo "<tr>";
        foreach ($rows[0] as $key => $value) {
            if ($key == "P_Name") {
                echo "<th>Product</th>";
            }
            else {
                echo "<th>Price</th>";
            }
        }
        echo "</tr>";
        foreach ($rows as $row) {
            echo "<tr>";
            foreach ($row as $item) {
                echo "<td>$item</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<br>Empty table";
    }
}

function reg_table($rows)
{
    if (!empty($rows)) {
        echo "<table border=1>";
        echo "<tr>";
        foreach ($rows[0] as $key => $value) {
            echo "<th>$key</th>";
        }
        echo "</tr>";
        foreach ($rows as $row) {
            echo "<tr>";
            foreach ($row as $item) {
                echo "<td>$item</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<br>Empty...";
    }
}
?>
