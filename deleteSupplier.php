<?php

require_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $supplier_id = $_POST["supplierId"];

    $checkSql = "SELECT * FROM supplier WHERE Supplier_ID = '$supplier_id'";
    $checkResult = $conn->query($checkSql);

    if ($checkResult->num_rows > 0) {
        
        $deleteSql = "DELETE FROM supplier WHERE Supplier_ID = '$supplier_id'";
        if ($conn->query($deleteSql) === TRUE) {
            echo "<script>alert('Supplier deleted successfully')</script>";
            echo "<script>window.location.href = 'index.php';</script>";
        } else {
            echo "<script>alert('Delete process unsuccessfull')</script>";
        }
    } else {
        echo "<script>alert('Supplier cannot be found!')</script>";
    }

    $conn->close();
}
?>
