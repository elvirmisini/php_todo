
<?php include('dbcon.php'); ?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the SELECT statement
    $stmt = $connection->prepare("DELETE FROM `students` WHERE `id` = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($stmt->affected_rows > 0) {
        header('Location: index.php?deleted_student=Deleted successfully!');
    } else {
        die("Delete Failed");
    }

    $stmt->close();
    $connection->close();
}