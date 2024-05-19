<!DOCTYPE html>
<html>
<head>
    <title>Navbar Contents</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
</head>
<body>
    <div class="container">
        <h1><b>INSERT DATA</b></h1>
        <form action="controller.php" method="POST" enctype="multipart/form-data">
            <h2><b>Navbar Contents</b></h2>
            <!-- FIRST INPUT -->
            <div class="form-group">
                <label>Navbar 1:</label>
                <input type="text" name="txtnavbar1" class="form-control">
            </div>
          
            <!-- SECOND INPUT -->
            <div class="form-group">
                <label>Navbar 2:</label>
                <input type="text" name="txtnavbar2" class="form-control">
            </div>

            <div class = "form-group">
                <label>Navbar 3:</label>
                <input type="text" name="txtnavbar3" class="form-control">
            </div>



            <button type="submit" name="save_navbar_content" class="btn btn-success">Save Navbar</button>
        </form>
    </div>
</body>
</html>