<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Portfolio</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css"> <!-- Your custom CSS file -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        background-color: #1f1f1f;  
    }

    html{
            scroll-behavior: smooth;
        }

    a, input, h1, h2 {
        font-weight: bold !important;
        color: white; /* Set font color to white */
    }

    .navbar {
        background-color: transparent;
        backdrop-filter: blur(10px); /* Add a blur effect */
        border-bottom: none; /* Remove the black line under the header */
    }

    .navbar-brand:hover {
        transform: scale(1.1); /* Hover effect: Scale the navbar brand */
    }

    section {
        width: 100%;
        padding: 100px;
    }

    /* Additional CSS styles */
    .container {
        max-width: 1200px; /* Adjust as needed */
        margin: 0 auto; /* Center the content */
    }

    .jumbotron {
        border-radius: 0; /* Remove rounded corners */
    }
    .col-text{
        -webkit-column-count: 3;
        column-count: 3;
        padding: 50px;
    }

    /* Default border style for onePic */
    .onePic {
        border: 10px solid transparent; /* Transparent border initially */
        transition: transform 0.3s ease, border 0.3s ease; /* Smooth transition for transform and border */
    }

    /* Hover effect for onePic */
    .onePic:hover {
        transform: scale(1.2); /* Scale up slightly on hover */
        border: 10px solid #f7655e; /* Add a red border on hover */
    }

    /* Typing effect for name */
    .typing-effect {
        overflow: hidden; /* Hide overflow */
        white-space: nowrap; /* Prevent text wrapping */
    }

    /* Additional styling for the name container */
    .name-container {
        background-color: rgba(0, 0, 0, 0.8); /* Semi-transparent background */
        border-radius: 20px; /* Rounded corners */
        padding: 20px; /* Add padding */
        display: inline-block; /* Display inline */
        margin-top: 20px; /* Add margin at the top */
    }

    /* Add more custom styles here as needed */
</style>
</head>
<body>
    <?php
        include("admin/includes/sqlconnection.php");

        $sql = "SELECT * FROM idtbl idt
        LEFT JOIN anytable dt ON idt.id = dt.id
        LEFT JOIN navbar nb ON idt.id = nb.id";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Arrays to store values
            $firstDataArr = [];
            $onePicArr = [];
            $aboutMeArr=[];
            $multiPicArr = [];
            $nameArr = [];
            $navbar1Arr = [];
            $navbar2Arr = [];
            $navbar3Arr = [];

    

            while ($row = $result->fetch_assoc()) {
                $firstDataArr[]= $row['firstData'];
                $onePicArr[] = $row['pic'];
                $aboutMeArr[] = $row['aboutMe'];
                $multiPicArr[] = $row['multiPic'];
                $nameArr[] =$row['name']; 
                $navbar1Arr[] = $row['navbar1'];
                $navbar2Arr[] = $row['navbar2'];
                $navbar3Arr[] = $row['navbar3'];

                
            }

            echo "
            <nav class='navbar navbar-inverse navbar-fixed-top' style='padding-right: 15px'>
            <div class='navbar-header' style='padding-left: 10px'>
                <a class='navbar-brand'>";
            foreach ($firstDataArr as $firstData) {
                echo "$firstData";
            }
            echo "
                </a>
            </div>
            <ul class='nav navbar-nav navbar-right'>
                <li><a href='#home'>";
                foreach ($navbar1Arr as $navbar1) {
                    echo "$navbar1";
                }
                echo "
                </a></li>
                <li><a href='#knowledge'>";
                foreach ($navbar2Arr as $navbar2) {
                    echo "$navbar2";
                }
                echo "</a></li>
                <li><a href='#about'>";
                foreach ($navbar3Arr as $navbar3) {
                    echo "$navbar3";
                }
                echo "</a></li>";

                echo "</ul>
            </nav>";
        
            echo "
            <!-- ONE PIC -->
            <section id='home' class='jumbotron text-center' style='background-image: url(\"https://images.unsplash.com/photo-1542831371-29b0f74f9713?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8cHJvZ3JhbW1pbmd8ZW58MHx8MHx8fDA%3D\"); background-size: cover; background-position: center;'>
                <div class='container'>
                    <br><br><br><br><br>";
                    foreach ($onePicArr as $onePic) {
                        if ($onePic !== null && !empty($onePic)) {
                            echo "<img src='admin/uploads/$onePic' class='img-circle center-block onePic' width='500px'> ";
                        }
                    }
                    echo"<br>
                    <br><br><br><br>
                    <br>";

                    // Animation for displaying names with typing effect
                    foreach ($nameArr as $name) {
                        echo "<div class='name-container'><h2 class='typing-effect'>Hi I'm </h2></div>";
                    }

                    echo"</p>
                </div>
            </section>";

            // Script to control the typing animation
            echo "<script>";
            echo "var index = 0;";
            echo "var name = '" . implode("", $nameArr) . "';";
            echo "var typingInterval = setInterval(function() {";
            echo "var nameContainer = document.querySelector('.typing-effect');";
            echo "if (index < name.length) {";
            echo "nameContainer.textContent += name.charAt(index);";
            echo "index++;";
            echo "} else {";
            echo "clearInterval(typingInterval);";
            echo "}";
            echo "}, 100);"; // Typing speed in milliseconds
            echo "</script>";

            // Existing code for multi pics
            echo "
            <!-- MULTI PICS -->
            <section id='knowledge' class='container' style='color: #333;'>";
            echo"<h2><center>My Works: <br><br><br><br></center></h2>";
            
            foreach ($multiPicArr as $multiPic) {
                if ($multiPic !== null && !empty($multiPic)) {
                    $images = explode(",", $multiPic);
                    foreach ($images as $image) {
                        echo "<center><img src='admin/uploads/$image' class='img-thumbnail' alt='Image'/></center><br>";
                    }
                }
            }

            echo "
                </div>
            </section>";
            
            echo "
            <!-- ABOUT ME -->
            <section id='about' class='jumbotron text-center'>
            <h1>About Me</h1>    
            <div class='col-text' style='column-gap: 50px;'>";
                    // Concatenate all about me content into a single string
                    $aboutMeContent = '';
                    foreach ($aboutMeArr as $aboutMe) {
                        $aboutMeContent .= $aboutMe . ' ';
                    }
                    echo "<p style='text-align: justify;'>$aboutMeContent</p>";

                echo "
                </div>
            </section>";
            
        } else {
            echo "No records found";
        }
        $conn->close();
    ?>
<footer class="footer text-center" style="color: white;">
    <p>All rights reserved. Developed by Angelo Gerard T. Mallari &copy; 2024</p>
</footer>
</body>
</html>
