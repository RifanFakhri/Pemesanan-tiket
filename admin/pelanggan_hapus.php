<?php
require 'functions.php';

// Periksa apakah parameter 'id' disediakan di URL
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    // queri delete
    $sql = "DELETE FROM pembayaran WHERE id = $id";
    $exe = mysqli_query($conn, $sql);

    if ($exe) {
        $success = 'true';
        $title = 'Berhasil';
        $message = 'Menghapus Data';
        $type = 'success';
        header('location: pelanggan.php?crud=' . $success . '&msg=' . $message . '&type=' . $type . '&title=' . $title);
    } else {
        // Handle the case where the query execution fails
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Handle the case where 'id' parameter is not provided
    echo "Error: ID parameter not provided.";
}
?>
