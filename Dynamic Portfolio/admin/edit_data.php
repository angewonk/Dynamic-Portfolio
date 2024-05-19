<!DOCTYPE html>
<head>
    <title>Edit Portfolio</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
</head>
<body>
    <div class="container">
        <h1><center>Edit Portfolio<center></h1>
        <form action="controller.php" method="POST" enctype="multipart/form-data">
            <?php 
                getTableById($_GET['id']);
            ?>
            <button type="submit" class="btn btn-primary" name="update_anytable_content">Update Portfolio</button>
        </form>
    </div>
</body>
</html>

<?php
    function getTableById($recno) {
        include("includes/sqlconnection.php");
        $sql = "SELECT * FROM anytable WHERE id='$recno'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "
                    <input type='hidden' name='txtid' value='".$row['id']."'>
                    <div class='form-group'>
                        <label>Name of Page:</label>
                        <input type='text' name='txtdata' class='form-control' value='".$row['firstData']."'>
                    </div>
                    <input type='hidden' name='txtid' value='".$row['id']."'>
                    <div class='form-group'>
                        <label>Profile Picture:</label>
                        <input type='file' name='txtonePic'>";
                        if ($row['pic'] !== null && !empty($row['pic'])) {
                            echo "<img src='uploads/".$row['pic']."' width='200'>";
                        }
                
                        echo "
                        </div>
                        <input type='hidden' name='txtname' value='".$row['id']."'>
                        <div class='form-group'>
                            <label>Name:</label>
                            <input type='text' name='txtname' class='form-control' value='".$row['name']."'>
                        </div>
                        ";
                
                         echo"

                    <div class='form-group'>
                        <label>My Works: </label>
                        <input type='file' name='txtmultiPic[]' multiple>";
                        $multiPic = explode(',', $row['multiPic']);
                        foreach ($multiPic as $image) {
                            if ($image !== null && !empty($image)) {
                                echo "<img src='uploads/".$image."' class='img-thumbnail' alt='Image' style='width: 200px;'>";
                            }
                        }
                echo "
                    </div>
                    <input type='hidden' name='txtaboutMe' value='".$row['id']."'>
                    <div class='form-group'>
                        <label>About Me:</label>
                        <input type='text' name='txtaboutMe' class='form-control' value='".$row['aboutMe']."'>
                    </div>
                    ";
            }
        } else {
            echo "no record found";
        }

        $conn->close();
    }
?>