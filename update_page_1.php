<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the SELECT statement
    $stmt = $connection->prepare("SELECT * FROM `students` WHERE `id` = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        die("No student found with the given ID");
    } else {
        $row = $result->fetch_assoc();
    }

    $stmt->close();
}

if (isset($_POST['update_students'])) {
    if(isset($_GET['id'])){
        $idnew=$_GET['id'];
    }
    
    
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $age = $_POST['age'];

    // Prepare the UPDATE statement
    $stmt = $connection->prepare("UPDATE `students` SET `first_name` = ?, `last_name` = ?, `age` = ? WHERE `id` = ?");
    $stmt->bind_param("ssii", $f_name, $l_name, $age, $idnew);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header('Location: index.php?update_message=Updated successfully!');
    } else {
        die("Update Failed");
    }

    $stmt->close();
    $connection->close();
}
?>

<form action="update_page_1.php?id=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label for="f_name">First Name</label>
        <input type="text" name="f_name" class="form-control" value="<?php echo htmlspecialchars($row['first_name']); ?>">
    </div>
    <div class="form-group">
        <label for="l_name">Last Name</label>
        <input type="text" name="l_name" class="form-control" value="<?php echo htmlspecialchars($row['last_name']); ?>">
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="text" name="age" class="form-control" value="<?php echo htmlspecialchars($row['age']); ?>">
    </div>
    <input type="submit" class="btn btn-success" name="update_students" value="Update">
</form>

<?php include('footer.php'); ?>
