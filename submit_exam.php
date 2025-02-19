<?php
// Database connection variables
$host = "localhost"; // Server name (use "localhost" if the database is on the same server)
$username = "root"; // MySQL username
$password = ""; // MySQL password
$database = "ju_exams"; // Database name

// Connect to MySQL
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$student_id = $_POST['student_id'];
$name = $_POST['name'];
$department = $_POST['department'];
$semester = $_POST['semester'];
$exam_type = $_POST['exam_type'];
$course_codes = $_POST['course_codes'];
$exam_date = $_POST['exam_date'];

// Prepare SQL query to insert data into the database
$sql = "INSERT INTO exam_registrations (student_id, name, department, semester, exam_type, course_codes, exam_date) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

// Prepare statement to avoid SQL injection
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $student_id, $name, $department, $semester, $exam_type, $course_codes, $exam_date);

// Execute the statement
if ($stmt->execute()) {
    // If insertion is successful, display the question paper
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Paper</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="question-paper">
        <h2>Jahangirnagar University Examination</h2>
        <h3>Department: <?php echo htmlspecialchars($department); ?></h3>
        <h3>Semester: <?php echo htmlspecialchars($semester); ?></h3>
        <h3>Exam Type: <?php echo htmlspecialchars($exam_type); ?></h3>
        <h3>Exam Date: <?php echo htmlspecialchars($exam_date); ?></h3>

        <hr>
        
        <!-- Example question paper content -->
        <h4>Question 1: Describe the fundamentals of computer science.</h4>
        <p>(10 marks)</p>
        
        <h4>Question 2: Explain the concept of object-oriented programming with examples.</h4>
        <p>(15 marks)</p>

        <h4>Question 3: Discuss the key differences between relational and non-relational databases.</h4>
        <p>(20 marks)</p>

        <hr>

        <p>Good luck with your exam!</p>
    </div>
</body>
</html>
<?php
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
