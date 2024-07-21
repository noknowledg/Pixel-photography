<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
  <link rel="stylesheet" href="style.css">
  
</head>
<style>
body {
            font-family: Arial, sans-serif;
            background-color: #333;
            color: white;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
}
        h1 {
            margin-top: 20px;
            color: #fff;
        }
        .gallery-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            padding: 20px;
        }
        .gallery-item {
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        .gallery-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        .gallery-item:hover {
            transform: scale(1.05);
        }
        .img-fluid-logo{
          width: 60px;
          height: 50px;
        }
        .navbar{
          background-color: black;
        }
        .contact-section {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .contact-content {
      padding: 2rem;
    }

    .contact-form {
      padding: 2rem;
      background: #f8f9fa;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .form-label{
      color:black
    }
    .skill-bar {
            height: 25px;
            background-color: #ddd;
            border-radius: 5px;
            overflow: hidden;
        }
        .skill-bar-fill {
            height: 100%;
            background-color: #007bff;
            border-radius: 5px;
        }
        .content-left {
            margin-bottom: 50px;
        }
   
    </style>
<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="90">

  <header class="header_wrap">
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="logo.jpg" class="img-fluid-logo" alt="logo" >
        </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        
        <i class="far fa-stream navbar-toggler-icon " style="color: rgb(181, 181, 21);"></i>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">  
         
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="#Home">Home</a>
          </li>
          <li class="nav-item"><a class="nav-link" href="#about">About us</a>
          </li>
         
          <li class="nav-item"><a class="nav-link" href="#Gallery">Gallery</a>
          </li>

          <li class="nav-item"><a class="nav-link" href="#skills">skills/Experience</a>
          </li>
    
          <li class="nav-item">
            <a class="nav-link " href="#contact">Contact us</a>
          </li>
        </ul>
        </div>
      </div>
    </div>
  </nav>
</header>
 

<!-- Banner section -->
<section id="Home" class="banner_wrap">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 order-lg-1 order-2 banner-content">
      
       
        <h1 class="text-uppercase">
        <?php
          include 'connect.php';
          $query = "SELECT title, description FROM home";
          
          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
            
            while ($row = mysqli_fetch_assoc($result)) {
                
              echo $row['title'];
            }
          } 
        ?>
        </h1>
        <h5 class="text-uppercase"><?php
          include 'connect.php';
          $query = "SELECT title, description FROM home";
          
          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
            
            while ($row = mysqli_fetch_assoc($result)) {
                
              echo $row['description'];
            }
          } 
        ?></h5>
      </div>
     
    </div>
  </div>
</section>



<!-- About us section -->

<section id="about" class="about_wrap">
  <div class="container">
    <div class="row align-items-center ">
            <div class="col-lg-7 mb-4 mb-lg-0">
      
          <img src="d.jpg" style="height: 600px; width: 800px;" class="img-fluid"  alt="about us">
        </div> 
      
    <div class=" col-lg-5 mb-5 mb-lg-0">
      <h3>You <br> may know!</h3>
      <p style="font-size: 15px; font-style: italic;"> Pixel, a renowned platform for exploring photography works for capturing your memory. </p>
      <p style=" font-size: 15px; font-style: italic;"> Currently, this baranch is loacted at Butwal.</p><br> <br>
      <div class="client-info">
    <div class="d-flex">
      <span class="large">2</span>
      <span class="small">Years <br> Eperience <br> Working</span>
    </div>
    </div>
  </div>
</div>
</div>

</section>


<section id="Gallery" >
<h1>Our Gallery</h1>
    <div class="gallery-container">
        <?php
            include 'connect.php';
            $query = "SELECT img_name FROM gallery";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="gallery-item">';
                    echo '<img src="upload/' . $row['img_name'] . '" alt="Image">';
                    echo '</div>';
                }
            } else {
                echo '<p>No images found in the database.</p>';
            }
        ?>
    </div>
</section>

   

<!-- portfolio -->
<section id="skills" class="portfolio_wrap">
 
 <div class="container section">
        <div class="row">
            <div class="col-md-6 content-left">
                <h2 style="color: white;">Experience</h2>
                <h4 style="font-style: italic;">With over 2 years of experience in professional photography, Photographers have worked on various projects ranging from portrait sessions to landscape photography. </h4><br>
                <ul>
                    <h4> <li>Wedding Photography</li>
                    <li>Portrait Photography</li>
                    <li>Event Photography</li>
                    <li>Landscape Photography</li></h4>
                </ul>
            </div>
            <div class="col-md-6">
                <h2 style="color: white;">Skills</h2>
                <div class="mb-3">
                    <h5>Photography</h5>
                    <div class="skill-bar">
                        <div class="skill-bar-fill" style="width: 90%;"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <h5>Photo Editing</h5>
                    <div class="skill-bar">
                        <div class="skill-bar-fill" style="width: 80%;"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <h5>Lighting Techniques</h5>
                    <div class="skill-bar">
                        <div class="skill-bar-fill" style="width: 85%;"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <h5>Adobe Photoshop</h5>
                    <div class="skill-bar">
                        <div class="skill-bar-fill" style="width: 75%;"></div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>

    

</section>



<!-- contact section -->
 <section id="contact" class="contact_wrap">
 
  
   
   
 
 <div class="container contact-section">
    <div class="row w-100">
      <div class="col-md-6 contact-content">
        <h2 style="color: #fff;">Get <span style="color: red;">U</span>pdated</h2><br>
        <h3>Working For Satisfying You ! </h3><br>
        <h4>stay connected with us</h4>
      </div>
      <div class="col-md-6">
        <div class="contact-form">
          <h2>Contact Us</h2>
          <form id="contactForm">
            <div class="mb-3">
              <label for="fullName" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="fullName" placeholder="Enter your full name">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" placeholder="Enter your email">
            </div>
            <div class="mb-3">
              <label for="message" class="form-label"></label>
              <textarea class="form-control" id="message" rows="3" placeholder="Enter your message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>


</section>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>