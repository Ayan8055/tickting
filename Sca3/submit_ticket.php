<?php
include('db.php'); // Include the database connection

if (isset($_POST['submit'])) {
    // Get the form data
    $name = $_POST['customer_name'];
    $email = $_POST['email'];
    $issue = $_POST['issue'];
    $description = $_POST['description'];

    // Prepare and execute the SQL query
    $sql = "INSERT INTO tickets (customer_name, email, issue, description) 
            VALUES ('$name', '$email', '$issue', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: #28a745; text-align: center; font-weight: bold;'>Ticket submitted successfully! We'll get back to you shortly.</p>";
    } else {
        echo "<p style='color: #dc3545; text-align: center; font-weight: bold;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

$conn->close(); // Close the connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Ticket Submission</title>
    <style>
        /* Base Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9fafb;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Header and Footer */
        .header, .footer {
            background-color: #0056b3;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            animation: fadeIn 1.5s ease;
        }

        .footer p {
            margin: 0;
            font-size: 14px;
        }

        /* Form Container */
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            max-width: 600px;
            margin: 30px auto;
            border-radius: 8px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 1s ease-out;
        }

        h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
            animation: slideIn 1.5s ease;
        }

        label {
            display: block;
            margin: 12px 0 6px;
            font-weight: bold;
            color: #555;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            transition: border-color 0.3s ease;
            font-size: 16px;
        }

        input:focus, textarea:focus {
            border-color: #0056b3;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #0056b3;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            font-weight: bold;
            animation: fadeIn 2s ease;
        }

        button:hover {
            background-color: #004494;
        }

        /* Help Section, FAQ, and Animations */
        .help-section, .faq-section {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1.5s ease;
        }

        .faq-section ul {
            padding: 0;
            list-style: none;
            margin: 10px 0;
        }

        .faq-section li {
            margin-bottom: 15px;
        }

        .faq-section li strong {
            display: block;
            color: #333;
            font-size: 16px;
        }

        /* Keyframe Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Customer Support</h1>
    </div>

    <div class="form-container">
        <h2>Submit a Support Ticket</h2>
        <form action="submit_ticket.php" method="POST">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="customer_name" placeholder="Enter your name" required>

            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="issue">Issue Title:</label>
            <input type="text" id="issue" name="issue" placeholder="Brief issue title" required>

            <label for="description">Issue Description:</label>
            <textarea id="description" name="description" placeholder="Provide details about the issue" required></textarea>

            <button type="submit" name="submit">Submit Ticket</button>
        </form>
    </div>

    <div class="help-section">
        <h2>Need Help?</h2>
        <p>Describe your issue in detail so we can assist you as efficiently as possible. Our team will review and get back to you within 24-48 hours.</p>
    </div>

    <div class="faq-section">
        <h2>Frequently Asked Questions</h2>
        <ul>
            <li><strong>How long does it take to get a response?</strong> We typically respond within 24-48 hours.</li>
            <li><strong>Can I edit my ticket after submission?</strong> Currently, tickets cannot be edited after submission. Please submit a new ticket with any updated information.</li>
            <li><strong>Where will I receive my responses?</strong> Responses will be sent to the email address you provided in the form.</li>
        </ul>
    </div>

    <div class="footer">
        <p>Contact us at <strong>support@example.com</strong> or call <strong>1-800-555-HELP</strong> for immediate assistance.</p>
    </div>
    
</body>
</html>
