<?php
    // Display error message if it exists
    if (isset($_GET['errors'])) {
        // Check if 'errors' is an array or a string
        $errors = is_array($_GET['errors']) ? $_GET['errors'] : [$_GET['errors']];

        echo "<div class='alert alert-danger' role='alert'><ul>";

        foreach ($errors as $err) {
            $err = htmlspecialchars($err); // Sanitize output to prevent XSS
            echo "<li>Error: $err</li>";
        }

        echo "</ul></div>";
    }
?>
