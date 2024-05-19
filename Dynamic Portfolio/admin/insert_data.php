<!DOCTYPE html>
<html>
<head>
    <title>Insert Portfolio</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
</head>
<body>

    <div class="container">
        <h1><center>Add Data to Portfolio<center></h1>
        <form action="controller.php" method="POST" enctype="multipart/form-data">
            <h2>Personal Information</h2>
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="txtname" class="form-control">
            </div>
            <h2>Website Name</h2>
            <!-- FIRST INPUT -->
            <div class="form-group">
                <label>Add website Name:</label>
                <input type="text" name="txtdata" class="form-control">
            </div>
            <!-- Add the name field before aboutMe -->
            <h2>About Me</h2>
            <div class="form-group">
                <label>Add text:</label>
                <input type="text" name="txtaboutMe" class="form-control">
            </div>
            <h2>Profile Picture</h2>
            <!-- SECOND INPUT -->
            <div class="form-group">
                <label>Select Image:</label>
                <input type="file" name="txtonePic">
            </div>

            <h2>My Works</h2>
            <!-- THIRD INPUT -->
            <div class="form-group">
                <label>Select Images: </label>
                <input type="file" name="txtmultiPic[]" multiple>
            </div>
            <button type="submit" name="save_anytable_content" class="btn btn-success">Save Portfolio</button>
        </form>
    </div>
</body>
</html>