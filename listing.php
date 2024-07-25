<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataBase</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php
    require_once('validlogin.php');
    require_once('connection.php');
    $query = 'select * from register';
    $result = mysqli_query($connection, $query);
    $total_record = mysqli_num_rows($result); // total number of rows.
    ?>
    <table class="table table-striped">
        <tr>
            <thead>
                <td>ID</td>
                <td>Name</td>
                <td>Address</td>
                <td>Education</td>
                <td>Gender</td>
                <td>Hobbies</td>
                <td>Email</td>
                <td>Time</td>
                <td>Password</td>
                <td>Action</td>
            </thead>
        </tr>
        <?php
            if(mysqli_num_rows($result) > 0) {
                $i = 1;
                while($d = mysqli_fetch_assoc($result)) {
                    // print_r($d);
        ?>
            <tr>
                <td><?php echo $d['id']; ?></td>
                <td><?php echo $d['name']; ?></td>
                <td><?php echo $d['address']; ?></td>
                <td><?php echo $d['education']; ?></td>
                <td><?php echo $d['gender']; ?></td>
                <td><?php echo $d['hobbies']; ?></td>
                <td><?php echo $d['email']; ?></td>
                <td><?php echo $d['time']; ?></td>
                <td><?php echo str_repeat('*', strlen($d['password'])) ?></td>
                <td><a href="registrationForm.php?id=<?php echo $d['id']; ?>">Edit</a> / <a href="delete.php?id=<?php echo $d['id']; ?>">Delete</a></td>
            </tr>
        <?php
            $i++;
                }
            } else {
                echo "<tr><td colspan='9'>No Record Found</td></tr>";
            }
        ?>
    </table>
    <form action="checklogin.php" method="post">
    <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</body>
</html>