<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Resume</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>My Resume</h1>
        <?php
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "my_resume_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch resume data from database
        $sql = "SELECT * FROM resume_data";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<h2>" . $row["name"] . "</h2>";
                echo "<p>Email: " . $row["email"] . "</p>";
                echo "<p>Phone: " . $row["phone"] . "</p>";
                echo "<p>Address: " . $row["address"] . "</p>";
                echo "<p>Summary: " . $row["summary"] . "</p>";
                echo "<p>Experience: " . $row["experience"] . "</p>";
                echo "<p>Education: " . $row["education"] . "</p>";
            }
        } else {
            echo "No resume data found.";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
