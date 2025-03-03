<?php
session_start(); // Start the session

$users = array(
    "user1" => array("email" => "user1@example.com", "phone" => "1234567890", "designation" => "Developer"),
    "user2" => array("email" => "user2@example.com", "phone" => "9876543210", "designation" => "Designer"),
    "user3" => array("email" => "user3@example.com", "phone" => "5555555555", "designation" => "Manager"),
    "user4" => array("email" => "user4@example.com", "phone" => "7777777777", "designation" => "Tester"),
    "user5" => array("email" => "user5@example.com", "phone" => "9999999999", "designation" => "Analyst")
);

if (isset($_POST['username'])) {
    $username = $_POST['username'];

    if (array_key_exists($username, $users)) {
        $response = $users[$username];
        
        // Store username in session
        $_SESSION['username'] = $username;

        echo json_encode($response);
    } else {
        // If the username is not in the database, add it
        $newUserDetails = array("email" => "newuser@example.com", "phone" => "1234567890", "designation" => "New User");
        $users[$username] = $newUserDetails;

        // Store username in session
        $_SESSION['username'] = $username;

        $response = array("message" => "Not in database but added now.", "userDetails" => $newUserDetails);
        echo json_encode($response);
    }
} else {
    echo "Invalid request";
}
?>
