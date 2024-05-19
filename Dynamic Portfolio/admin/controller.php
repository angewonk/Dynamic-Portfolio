<?php
session_start();
include("includes/sqlconnection.php");

if(isset($_POST['save_navbar_content'])){
    $navbar1 = $_POST['txtnavbar1'];
    $navbar2 = $_POST['txtnavbar2'];
    $navbar3 = $_POST['txtnavbar3'];


    $sql_idtbl  = "INSERT INTO idtbl () VALUES ()";
    $conn->query($sql_idtbl );
    
    $sql_content = "INSERT INTO navbar (navbar1, navbar2, navbar3)
    VALUES ('$navbar1', '$navbar2', '$navbar3')";

    if ($conn->query($sql_content) === TRUE) {
        $id = $conn->insert_id;

        $_SESSION['status'] = "Portfolio Content Record Inserted Successfully";
        header('location:index.php');
    }
    else {
        $_SESSION['status'] = "Error: Insert Failed.....";
        header('location:insert_navbar.php');
    }
    $conn->close();
    
}

// INSERTION OF PORTFOLIO CONTENT
if (isset($_POST['save_anytable_content'])) {
    // Data for anytable
    $name = $_POST['txtname']; // New field
    $firstData = $_POST['txtdata'];
    $pic = $_FILES['txtonePic']['name'];
    $aboutMe = $_POST['txtaboutMe']; // New field

    // Handle file uploads for the pic
    move_uploaded_file($_FILES["txtonePic"]["tmp_name"], "uploads/" . $pic);

    // Insert into anytable for the multi pics
    $Images = [];
    foreach ($_FILES['txtmultiPic']['name'] as $key => $image) {
        $multiPic = $_FILES['txtmultiPic']['name'][$key];
        move_uploaded_file($_FILES['txtmultiPic']['tmp_name'][$key], "uploads/" . $multiPic);
        $Images[] = $multiPic;
    }
    $Images = implode(',', $Images);

    // Prepare the insert query
    $sql_content = "INSERT INTO anytable (name, firstData, pic, multiPic, aboutMe) VALUES (?, ?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql_content);
    $stmt->bind_param("sssss", $name, $firstData, $pic, $Images, $aboutMe);

    // Execute the statement
    if ($stmt->execute()) {
        $id = $conn->insert_id;

        $_SESSION['status'] = "Portfolio Content Record Inserted Successfully";
        header('location:index.php');
    } else {
        $_SESSION['status'] = "Error: Insert Failed.....";
        header('location:insert_data.php');
    }
    $stmt->close();
    $conn->close();
}

if(isset($_POST['update_navbar_content'])){
    $navbar1 = $_POST['txtnavbar1'];
    $navbar2 = $_POST['txtnavbar2'];
    $navbar3 = $_POST['txtnavbar3'];
    $id = $_POST['txtid'];

    
    $sql_content = "UPDATE navbar SET navbar1='$navbar1', navbar2='$navbar2', navbar3='$navbar3' WHERE id='$id'";
    $conn->query($sql_content);

    if ($conn->query($sql_content) === TRUE) {
        $_SESSION['status'] = "Portfolio Content Record Updated Successfully";
        header('location:index.php');
    } else {
        $_SESSION['status'] = "Error: Update Failed";
        header('location:edit_data.php?id=' . $id); // Redirect back to edit page with ID
    }
    
    $conn->close();
    
}

// UPDATE OF PORTFOLIO CONTENT
if (isset($_POST['update_anytable_content'])) {
    include("includes/sqlconnection.php");

    $id = $_POST['txtid'];
    $name = $_POST['txtname']; // New field
    $firstData = $_POST['txtdata'];
    $aboutMe = $_POST['txtaboutMe']; // New field

    // Check if a new first image is uploaded
    if (isset($_FILES['txtonePic']) && $_FILES['txtonePic']['name'] != '') {
        $pic = $_FILES['txtonePic']['name'];
        move_uploaded_file($_FILES["txtonePic"]["tmp_name"], "uploads/" . $_FILES['txtonePic']['name']);
    } else {
        // No new image uploaded, keep the existing image
        $sql_first_pic = "SELECT pic FROM anytable WHERE id=?";
        $stmt = $conn->prepare($sql_first_pic);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result_first_pic = $stmt->get_result();
        if ($result_first_pic->num_rows > 0) {
            $row_first_pic = $result_first_pic->fetch_assoc();
            $pic = $row_first_pic['pic'];
        } else {
            $pic = ''; // No existing image found
        }
        $stmt->close();
    }

    // Check if new images are uploaded for multiPic
    if (isset($_FILES['txtmultiPic']) && $_FILES['txtmultiPic']['name'][0] != '') {
        $multiPic = $_FILES['txtmultiPic']['name'];
        $newMultiPic = [];
        foreach ($multiPic as $key => $image) {
            move_uploaded_file($_FILES['txtmultiPic']['tmp_name'][$key], "uploads/" . $image);
            $newMultiPic[] = $image;
        }
        $multiPic = implode(',', $newMultiPic);
    } else {
        // No new image uploaded, keep the existing images
        $sql_multiPic = "SELECT multiPic FROM anytable WHERE id=?";
        $stmt = $conn->prepare($sql_multiPic);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result_multiPic = $stmt->get_result();
        if ($result_multiPic->num_rows > 0) {
            $row_multiPic = $result_multiPic->fetch_assoc();
            $multiPic = $row_multiPic['multiPic'];
        } else {
            $multiPic = ''; // No existing images found
        }
        $stmt->close();
    }

    // Prepare the update query
    $sql_content = "UPDATE anytable SET name=?, firstData=?, pic=?, multiPic=?, aboutMe=? WHERE id=?";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql_content);
    $stmt->bind_param("sssssi", $name, $firstData, $pic, $multiPic, $aboutMe, $id);

    // Execute the statement
    if ($stmt->execute()) {
        $_SESSION['status'] = "Portfolio Content Record Updated Successfully";
        header('location:index.php');
    } else {
        $_SESSION['status'] = "Error: Update Failed";
        header('location:edit_data.php?id=' . $id); // Redirect back to edit page with ID
    }

    $stmt->close();
    $conn->close();
}

// DELETION
if (isset($_GET['id']) && isset($_GET['table'])) {
    include("includes/sqlconnection.php");

    $id = $_GET['id'];

    // Delete the record from anytable
    $sql_delete = "DELETE FROM anytable WHERE id=?";
    $stmt = $conn->prepare($sql_delete);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $_SESSION['status'] = "Record Deleted Successfully";
    header('location:index.php');

    $stmt->close();
    $conn->close();
} else {
    echo "ID or table parameter missing";
}

if (isset($_GET['id']) && isset($_GET['table'])) {
    include("includes/sqlconnection.php");

    $id = $_GET['id'];
    
    // Delete the record from portfoliocontentbl
    $conn->query("DELETE FROM navbar WHERE id='$id'");

    $_SESSION['status'] = "Record Deleted Successfully";
    header('location:index.php');
    $conn->close();
} else {
    echo "ID or table parameter missing";
}

?>
