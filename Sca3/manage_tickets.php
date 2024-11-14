<?php
include('db.php'); // Include the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Tickets</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .ticket-list {
            max-width: 900px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-size: 18px;
        }

        td {
            font-size: 16px;
            color: #555;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            color: #4CAF50;
            font-weight: bold;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px;
            background-color: #e0f7e0;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #4CAF50;
            color: white;
        }

        td a {
            text-align: center;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="ticket-list">
        <h2>Customer Support Tickets</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Issue</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

            <?php
            // Fetch all tickets from the database
            $sql = "SELECT * FROM tickets";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["customer_name"] . "</td>
                            <td>" . $row["email"] . "</td>
                            <td>" . $row["issue"] . "</td>
                            <td>" . $row["status"] . "</td>
                            <td>
                                <a href='update_ticket.php?id=" . $row["id"] . "'>Update Status</a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='6' style='text-align:center;'>No tickets found</td></tr>";
            }

            $conn->close(); // Close the connection
            ?>
        </table>
    </div>
</body>
</html>
