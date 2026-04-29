<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fianl Exam</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>
    <nav class="navbar">
        <img src="../images/northhub.svg" id="logo" alt="Logo">
        <button id="createBtn" class="navbarbuttons">Create</button>
        <button id="readBtn" class="navbarbuttons">Read</button>
        <button id="updateBtn" class="navbarbuttons">Update</button>
        <button id="deleteBtn" class="navbarbuttons">Delete</button>
    </nav>

    <section id="home" class="homecontent"> 
        <h1 class="splash">Welcome to Student Management System</h1>
        <h2 class="splash">A Project in Integrative Programming Technologies</h2>
    </section>
    
    <section id="create" class="content">
        <h1 class="contenttitle">Insert New Student</h1>
        <form action="../includes/insert.php" method="POST">
            <label for="surname" class="label">Surname</label>
            <input type="text" name="surname" id="surname" class="field" required><br/>

            <label for="name" class="label">Name</label>
            <input type="text" name="name" id="name" class="field" required><br/>

            <label for="middlename" class="label">Middle name</label>
            <input type="text" name="middlename" id="middlename" class="field"><br/>

            <label for="address" class="label">Address</label>
            <input type="text" name="address" id="address" class="field"><br/>

            <label for="contact_number" class="label">Contact Number</label>
            <input type="text" name="contact_number" id="contact_number" class="field"><br/>

            <div id="btncontainer">
                <button type="button" id="clrbtn" class="btns">Clear Fields</button><br/>
                <button type="submit" id="savebtn" class="btns">Save</button>
            </div>

            <div id="success-toast" class="toast-hidden">
                Registration Successful!
            </div>
        </form>   
    </section>

    <section id="read" class="content">
    <h1 class="contenttitle">View Students</h1>
    <?php
    require_once __DIR__ . '/../includes/db.php';
    try {
        $stmt = $pdo->query("SELECT * FROM student");
        $rows = $stmt->fetchAll();
        if ($rows) {
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Surname</th><th>Name</th><th>Middlename</th><th>Address</th><th>Contact Number</th></tr>";
            foreach ($rows as $row) {
                echo "<tr>";
                echo "<td>".$row['ID']."</td>";
                echo "<td>".$row['Surname']."</td>";
                echo "<td>".$row['Name']."</td>";
                echo "<td>".$row['Middlename']."</td>";
                echo "<td>".$row['Address']."</td>";
                echo "<td>".$row['contact_number']."</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No student records found.</p>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
</section>

    <section id="update" class="content">
        <h1 class="contenttitle">Update Student Records</h1>
        <form action="../includes/update.php" method="POST">
            <label for="id" class="label">Student ID</label>
            <input type="text" name="id" id="id" class="field" required><br/>

            <label for="surname" class="label">New Surname</label>
            <input type="text" name="surname" id="surname" class="field"><br/>

            <label for="name" class="label">New Name</label>
            <input type="text" name="name" id="name" class="field"><br/>

            <label for="middlename" class="label">New Middlename</label>
            <input type="text" name="middlename" id="middlename" class="field"><br/>

            <label for="address" class="label">New Address</label>
            <input type="text" name="address" id="address" class="field"><br/>

            <label for="contact_number" class="label">New Contact Number</label>
            <input type="text" name="contact_number" id="contact_number" class="field"><br/>

            <button type="submit" class="btns">Update</button>
        </form>
    </section>

    <section id="delete" class="content">
        <h1 class="contenttitle">Remove Student Records</h1>
        <form action="../includes/delete.php" method="POST">
            <label for="id" class="label">Student ID</label>
            <input type="text" name="id" id="id" class="field" required><br/>
            <button type="submit" class="btns">Delete</button>
        </form>
    </section>

    <script src="script.js"></script>
</body>
</html>