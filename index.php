<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user input
    $username = htmlspecialchars(trim($_POST["username"]));
    $password = htmlspecialchars(trim($_POST["password"]));
    $email = htmlspecialchars(trim($_POST["email"]));

    // Initialize error array
    $errors = [];

    // Check if username is empty
    if (empty($username)) {
        $errors[] = "Username is required.";
    }

    // Check if password is empty
    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    // Check if email is empty
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Validate email format
        $errors[] = "Invalid email format.";
    }

    // Display errors or success message
    if (count($errors) > 0) {
        // Display errors
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    } else {
        echo "<p style='color:green;'>Form submitted successfully!</p>";
        // Process the data (e.g., save to database)
    }
}
?>

<!-- HTML Form -->
<form method="POST" action="">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username"><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email"><br><br>

    <input type="submit" value="Submit">
</form>
