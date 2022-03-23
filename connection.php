<?php
$conn = oci_connect('system', 'system', 'localhost');

if (!$conn) {
    $m = oci_error();
    echo "Koneksi error! " . $m['message'] . "\n";
    exit;
}

function print_query($query)
{
    $cols = oci_num_fields($query);

    echo '<table border="1">';
    echo "<tr>";
    for ($i = 1; $i <= $cols; $i++) {
        $col_name = oci_field_name($query, $i);
        echo "<th><b>" . htmlentities($col_name, ENT_QUOTES) . "</b></th>\n";
    }
    echo "<th>Aksi</th>";
    echo "</tr>";

    while ($row = oci_fetch_array($query, OCI_RETURN_NULLS + OCI_ASSOC)) {
        $key = array_keys($row);
        echo '<tr>';
        foreach ($row as $item) {
            echo '<td>' . ($item !== null ? htmlentities($item, ENT_QUOTES) : '(null)') . '</td>';
        }
        echo "<td>
                <a href='update.php?id=" . $row[$key[0]] . "'>Edit<a/>
                <a href='delete.php?id=" . $row[$key[0]] . "'>Hapus<a/>
            </td>";
        echo '</tr>';
    }
    echo '</table>';
}

function redirect($url) {
    echo "<script>window.location.href='$url';</script>";
}

function showMessage($message) {
    echo "<script>alert('$message');</script>";
}
?>