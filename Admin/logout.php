<?php
// Start the session
session_start();

// Destroy the session
session_destroy();

// Redirect to the index page with a success message
header("Location: ../index.php?message=logout_successful");
exit();
