<?php

include 'dbconnect.php';
// Make sure $conn is set up

$user = null;
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Step 1: Get and validate user input
    $id = trim($_POST['id']);
    $name = trim($_POST['name']);

// trim to remove whitespace


    // Simple validation
    if (!is_numeric($id) || empty($name)) {
        $error = "Please enter a valid numeric ID and a name.";
    } else {
        // Step 2: Unsafe SQL query directly with user input
        // ⚠️ THIS IS VULNERABLE TO SQL INJECTION
        $query = "SELECT * FROM user_table WHERE id = $id AND name = '$name'";
        $result = mysqli_query($conn, $query); // Execute the query(make the query)
        // result is the result of the query(an object)


        if ($result && mysqli_num_rows($result) > 0) {  //how many rows are returned
            // Step 3: Fetch the user data
            $user = mysqli_fetch_assoc($result);
        } else {
            $error = "No matching user found with ID $id and name '$name'.";
        }
    }

    mysqli_close($conn);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Find User by ID and Name</title>
</head>
<body>
    <h2>Find User Details</h2>

    <form method="POST" action="">
        <label for="id">Enter User ID:</label>
        <input type="text" name="id" id="id" required>
        <br><br>
        <label for="name">Enter User Name:</label>
        <input type="text" name="name" id="name" required>
        <br><br>
        <button type="submit">Search</button>
    </form>

    <hr>

    <?php if ($error): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php elseif ($user): ?>
        <h3>User Found:</h3>
        <p><strong>ID:</strong> <?php echo htmlspecialchars($user['id']); ?></p>   <!--returning the id of the selected user-->
        <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>

    <?php endif; ?>
</body>
</html>
