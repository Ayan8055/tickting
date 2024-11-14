<?php
include('db.php'); // Include the database connection

if (isset($_GET['id'])) {
    $ticket_id = $_GET['id'];

    // Fetch the current ticket details
    $sql = "SELECT * FROM tickets WHERE id = $ticket_id";
    $result = $conn->query($sql);
    $ticket = $result->fetch_assoc();

    if (isset($_POST['update'])) {
        $status = $_POST['status'];

        // Update the ticket status in the database
        $update_sql = "UPDATE tickets SET status = '$status' WHERE id = $ticket_id";
        if ($conn->query($update_sql) === TRUE) {
            header("Location: manage_tickets.php");
        } else {
            echo "Error updating ticket: " . $conn->error;
        }
    }

    $conn->close(); // Close the connection
} else {
    header("Location: manage_tickets.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Ticket Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .update-form {
            background-color: #ffffff;
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .update-form h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            font-size: 18px;
            margin-bottom: 10px;
            display: block;
            color: #555;
        }

        select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        .status-info {
            font-size: 16px;
            margin-bottom: 20px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="update-form">
        <h2>Update Ticket Status</h2>
        <p class="status-info">Current Status: <?php echo $ticket['status']; ?></p>
        <form action="" method="POST">
            <label for="status">Change Status:</label>
            <select name="status" id="status" required>
                <option value="Open">Open</option>
                <option value="In Progress">In Progress</option>
                <option value="Resolved">Resolved</option>
            </select>
            <button type="submit" name="update">Update Status</button>
        </form>
    </div>
</body>
</html>
