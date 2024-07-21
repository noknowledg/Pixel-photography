<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .admin-panel {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
            overflow: hidden;
        }
        .tab-header-container {
            display: flex;
            justify-content: space-around;
            background: #007BFF;
        }
        .tab-header {
            cursor: pointer;
            padding: 15px;
            color: white;
            text-align: center;
            flex: 1;
            transition: background 0.3s ease;
        }
        .tab-header:hover {
            background: #0056b3;
        }
        .tab-content {
            padding: 20px;
            display: none;
        }
        .tab-content.active {
            display: block;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], textarea, input[type="file"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
        }
        input[type="submit"] {
            padding: 10px;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        input[type="submit"]:hover {
            background: #0056b3;
        }
        h2 {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="admin-panel">
        <div class="tab-header-container">
            <div class="tab-header" onclick="showTab('home')">Home</div>
            <div class="tab-header" onclick="showTab('gallery')">Gallery</div>
            <div class="tab-header" onclick="showTab('skills')">Skills/Experience</div>
        </div>

        <div id="home" class="tab-content">
            <h2>Edit Home Page</h2>
            <form method="POST" >
                <label for="home-title">Title:</label>
                <input type="text" id="home-title" name="title">
                <label for="home-description">Description:</label>
                <textarea id="home-description" name="description"></textarea>
                <input type="submit" value="Save" name="home">
            </form>
        </div>

        <div id="gallery" class="tab-content">
            <h2>Manage Gallery</h2>
            <form method="POST" enctype="multipart/form-data">
                <label for="gallery-image">Upload Image:</label>
                <input type="file" id="gallery-image" name="image">
                <input type="submit" value="Upload" name="submit">
            </form>
            <table class="table mt-5">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Image Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include 'connect.php';
            $query = "SELECT * FROM gallery";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['img_id'] . '</td>';
                echo '<td>' . $row['img_name'] . '</td>';
                echo '<td>
                      <form method="post" style="display:inline;">
                        <input type="hidden" name="delete_id" value="' . $row['img_id'] . '">
                        <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>
                      </form>
                      </td>';
                echo '</tr>';
              }
            } else {
              echo '<tr><td colspan="3">No images found in the database.</td></tr>';
            }
            ?>
          </tbody>
        </table>
        </div>

        <div id="skills" class="tab-content">
            <h2>Add Skills/Experience</h2>
            <form>
                <label for="skill-title">Skill Title:</label>
                <input type="text" id="skill-title"  name="skill-title">
                <label for="skill-description">Description:</label>
                <textarea id="skill-description" name="skill-description"></textarea>
                <input type="submit" name="esubmit" value="Add Skill">
            </form>
        </div>
    </div>

    <script>
        function showTab(tabId) {
            var tabs = document.getElementsByClassName('tab-content');
            for (var i = 0; i < tabs.length; i++) {
                tabs[i].classList.remove('active');
            }
            document.getElementById(tabId).classList.add('active');
        }

        // Default to showing the home tab
        showTab('skills');
    </script>
</body>
</html>

<?php
include 'connect.php';

// Handle image upload
if (isset($_POST['submit'])) {
  if (isset($_FILES['image'])) {
    $image = $_FILES['image'];
    $fileName = $image['name'];
    $size = $image['size'];
    $fileTemp = $image['tmp_name'];
    $type = $image['type'];
    echo "<br>";
    $size_converted = $size / 1048576;
    $date = date("Y-m-d-H-i-s");

    $extension = pathinfo($image["name"], PATHINFO_EXTENSION);
    $newfilename = $date . "." . $extension;
    if ($type == "image/jpeg" || $type == "image/png" || $type == "image/jpg") {
      if ($size_converted < 5) {
        move_uploaded_file($fileTemp, 'upload/' . $newfilename);
        $query = "INSERT INTO gallery(img_name) VALUES('$newfilename')";
        $res = mysqli_query($conn, $query);
        echo "<script>alert('File uploaded successfully');</script>";
        echo "<script>window.location = 'admin.php';</script>";
        
      } else {
        echo "<script>alert('Error: File is too large');</script>";
  echo "<script>window.location = 'admin.php';</script>";
        
      }
    } else {
        echo "<script>alert('Error: File is not supported');</script>";
  echo "<script>window.location = 'admin.php';</script>";
      
    }
  } else {
    echo "<script>alert('No files');</script>";
    echo "<script>window.location = 'admin.php';</script>";
    
  }
}


if (isset($_POST['home'])) {
  $title = ($_POST['title']);
  $description = ($_POST['description']);
  $query2 = "UPDATE home SET title = '$title', description = '$description' WHERE id = 1;";
  $hom = mysqli_query($conn, $query2);
}


if (isset($_POST['delete'])) {
  $delete_id = $_POST['delete_id'];
  $query = "DELETE FROM gallery WHERE img_id = $delete_id";
  mysqli_query($conn, $query);
  echo "<script>alert('Record deleted successfully');</script>";
  echo "<script>window.location = 'admin.php';</script>";
}

// //updating skill and exp
// if(isset($_POST['esubmit'])){
//   $etitle = ($_POST['skill-title']);
//   $edescription = ($_POST['skill-description']);
//   $query3 = "UPDATE exp SET title='$etitle' , description = '$edescription' where exp_id = 1;";
//   $exp = mysqli_query($conn, $query3);
// }
 ?>


