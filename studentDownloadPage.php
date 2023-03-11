<?php
include 'server.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>STUDENT DOWNLOADS</title>
        <link rel="stylesheet" href="static/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="static/bootstrap4/css/bootstrap.min.css">
        <link rel="icon" type="image/webp" sizes="308x303" href="static/images/logo.png">
    </head>
    <body style="background: rgb(216, 210, 210);padding:1%;">
        <header>
            <div class="header-Section">
<!--Navigation Bar section-->
        <nav class="navbar navbar-dark navbar-expand-lg fixed-top">
            <a class="navbar-brand" href="#top"><span class="navTitle">E</span>-Bursary System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link active" href="studentDashboard.php">Home</a>
                <a class="nav-item nav-link active" href="application.php">Application</a>
                <a class="nav-item nav-link active" href="loanStatus.php">Loan Status</a>
                <a class="nav-item nav-link active" href="studentComplaints.php">Complaints</a>
                <a class="nav-item nav-link active" href="studentDownloadPage.php">Downloads</a>
                <a class="nav-item nav-link active" href="logout.php">Logout</a>
              </div>
            </div>
          </nav><!--end of Navigation Bar section-->
          </div>
        </header>
          
        <div class="download-section">
            <div class="download-content">
            <table class="table download-table">
            <tr>
                <th>Attachment Description</th>
                <th>File Name</th>
                <th>Date Uploaded</th>
                <th>View Details</th>
            </tr>
            <?php

            $downloaduploadquery="SELECT * FROM downloads ";  
               $downloadUploadResult=mysqli_query($db,$downloaduploadquery);
               if ($downloadUploadResult->num_rows > 0){
                while($row = $downloadUploadResult->fetch_assoc()) {
                  echo "<tr> <td>" . $row["downloadHeading"]. "</td>";
                  echo "<td>" . $row["downloadName"]. "</td>";
                  echo "<td>" . $row["date_posted"]."</td>";

                  $downloadPDF= $row["downloadName"];
               $downloadPath='downloads/'.$downloadPDF;
    
               echo "<td>" ."<a href='$downloadPath' target='_blank' class='btn btn-success'>View Details</a>". "</td>  </tr>";
                } 
               }
            ?>
          </table>
            </div>
        </div>

    <!--Footer section-->
    <footer translate="no" class="footer-section">
    <div class="container">
      <div class="row">
        <div class="col">
          
            <h4 class="footer-menu">MENU</h4>
            <a href="studentDashboard.php" class="footer-menu">Home</a>
            <a href="application.php" class="footer-menu">Application</a>
            <a href="loanStatus.php" class="footer-menu">Loan Status</a>
            <a href="studentComplaints.php" class="footer-menu">Complaints</a>
            <a href="studentDownloadPage.php" class="footer-menu">Downloads</a>
        </div>
        <div class="col-6">
          <h4 class="footer-heading">SIRISIA CONSTITUENCY BURSARY MANAGEMENT</h4>
          <p>Sirisia contituency is offering bursaries to all university students of its contituency.
             It involves a fair process of which every applicant is meant to benefit unless false documents
             are attached during the application process</p>
        </div>
        <div class="col">
         <h3>Social Media</h3>
         <p>Follow us on social media through</p>
         <a class="fa fa-twitter fa-2x" href="https://twitter.com/sirisia" target="_blank"></a>
         <a class="fa fa-facebook fa-2x" href="https://facebook.com/sirisia" target="_blank"></a>
         <a class="fa fa-instagram fa-2x" href="https://instagram.com/sirisia" target="_blank"></a>
        </div>
      </div>
    
  </div>
  <p class="copyright" style="text-align: center;">Maseno University &copy;<span id="currentYear">2022</span></p>
</footer>
<!--end footer-->


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>