<!DOCTYPE html>
<html>
<head>
    <title>Portfolio Table</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
    <style>
        .container {
            width: 80%;
            margin: auto;
        }
        /* Limit width of About Me column */
        .table td:nth-child(5),
        .table td:nth-child(6) {
            max-width: 200px; /* Set maximum width */
            overflow: hidden; /* Hide overflow content */
            text-overflow: ellipsis; /* Display ellipsis (...) for overflow content */
            white-space: nowrap; /* Prevent wrapping */
        }
        /* Enable horizontal scrolling for table cells */
        .table td {
            overflow-x: auto;
        }
        /* Optional: Adjust table appearance */
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        .table th {
            background-color: #f2f2f2;
            text-align: left;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">

    <table class="table">
            <br>
            <h3>Navbar</h3>
            <a href="insert_navbar.php" class="btn btn-info">Insert Data</a>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Navbar button 1</th>
                    <th>Navbar button 2</th>
                    <th>Navbar button 3</th>

                    
                </tr>
            </thead>
            <tbody>
                <?php
                include("includes/sqlconnection.php");
                $sql = "SELECT * FROM navbar";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['navbar1']."</td>";
                        echo "<td>".$row['navbar2']."</td>";
                        echo "<td>".$row['navbar3']."</td>";

                        echo "<td>
                                <a href='edit_navbar.php?id=".$row['id']."' class='btn btn-primary'>Edit</a>
                                <a href='controller.php?table=navbar&id=".$row['id']."' class='btn btn-danger'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>No records found</td></tr>"; 
                }
                $conn->close(); ?>
            </tbody>
        </table>




        <!-- Portfolio Content Table -->
        <h2>Edit Portfolio</h2>
        <a href="insert_data.php" class="btn btn-info">Insert Data</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Website Name</th>
                    <th>Profile Picture</th>
                    <th>Name</th>
                    <th>About Me</th>
                    <th>My Works</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("includes/sqlconnection.php");
                $sql = "SELECT * FROM anytable";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo"<center>";
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['firstData']."</td>";
                        echo "<td>".$row['pic']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['aboutMe']."</td>";
                        echo "<td>".$row['multiPic']."</td>";
                        echo "<td>
                                <a href='edit_data.php?id=".$row['id']."' class='btn btn-primary'>Edit</a>
                                <a href='controller.php?table=anytable&id=".$row['id']."' class='btn btn-danger'>Delete</a></td>";
                        echo "</tr>";
                        echo "</center>";
                    }
                } else {
                    echo "<tr><td colspan='10'>No records found</td></tr>"; 
                }
                $conn->close(); ?>
            </tbody>
        </table>
        <a href="../index.php" class="btn btn-success">View Portfolio</a>
    </div>
</body>
</html>