<?php

include 'includes/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['edit_id']) && !empty($_POST['edit_id'])) {
        try {

            $conn = connectDB();

            $sql = "DELETE FROM users WHERE user_id = :user_id";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':user_id', $_POST['edit_id']);

            $stmt->execute();

            header("Location: Signup.php");
            exit();
        } catch (PDOException $e) {

            echo "Error: " . $e->getMessage();
        } finally {

            if ($conn) {
                $conn = null;
            }
        }
    } else {

        echo "Invalid request";
    }
} else {

    echo "Invalid request";
}
?>