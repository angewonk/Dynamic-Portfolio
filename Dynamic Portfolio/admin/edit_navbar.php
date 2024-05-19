<!DOCTYPE html>
<head>
    <title>Edit Portfolio</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
</head>
<body>
    <div class="container">
        <h1>Edit Portfolio</h1>
        <form action="controller.php" method="POST" enctype="multipart/form-data">
            <?php 
                getTableById($_GET['id']);
            ?>
            <button type="submit" class="btn btn-primary" name="update_navbar_content">Update Portfolio</button>
        </form>
    </div>
</body>
</html>

<?php
    function getTableById($recno) {
        include("includes/sqlconnection.php");
        $sql = "SELECT * FROM navbar WHERE id='$recno'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "
                    <input type='hidden' name='txtid' value='".$row['id']."'>
                    <div class='form-group'>
                        <label>Navbar 1:</label>
                        <input type='text' name='txtnavbar1' class='form-control' value='".$row['navbar1']."'>
                    </div>

                    <div class = 'form-group'>
                    <label>Navbar 2:</label>
                    <input type='text' name='txtnavbar2' class='form-control' value='".$row['navbar2']."'>
                    </div>

                    <div class = 'form-group'>
                    <label>Navbar 3:</label>
                    <input type='text' name='txtnavbar3' class='form-control' value='".$row['navbar3']."'>
                    </div>



                    ";
            }
        } else {
            echo "no record found";
        }

        $conn->close();
    }
?>
