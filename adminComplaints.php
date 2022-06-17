<?php
include 'server.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Complaints Section</title>
        <link rel="stylesheet" href="static/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="static/bootstrap4/css/bootstrap.min.css">
        <link rel="icon" type="image/webp" sizes="308x303" href="static/images/logo.png">
        
    </head>
    <body class="body">
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
                <a class="nav-item nav-link active" href="adminDashboard.php">Home</a>
                <a class="nav-item nav-link active" href="disbursement.php">Disbursement</a>
                <a class="nav-item nav-link active" href="adminComplaints.php">Complaints</a>
                <a class="nav-item nav-link active" href="beneficiariesPDF.php">Beneficiaries</a>
                <a class="nav-item nav-link active" href="adminDownloadPage.php">Downloads</a>
                <a class="nav-item nav-link active" href="logout.php">Logout</a>
              </div>
            </div>
          </nav><!--end of Navigation Bar section-->
          </div>
          </header>

          <table class="table admin-complaint-table">
            <tr>
            <th>Complaint ID</th>
            <th>Complaint Date</th>
                <th>Registration Number</th>
                <th>Email Address</th>
                <th>Phone Number</th>
                <th>Complaint</th>
                <th>Complaint Description</th>
                <th>Complaint Response</th>
                <th>Action</th>
            </tr>

            <?php
   $admin_complaint_query="SELECT * FROM complaints";
   $admin_query_result=mysqli_query($db, $admin_complaint_query);
   if ($admin_query_result->num_rows > 0){
    while($row = $admin_query_result->fetch_assoc()) {
        $id=$row['complaintID'];
        $admNO=$row['regNumber'];
        $email=$row['emailAddress'];
        $phonenumber=$row['phone'];
        $complaintType=$row['TypeofComplaint'];
        $description=$row['complaintDescription'];
        $date_received=$row['complaint_received_date'];
        $response=$row['complaintResponse'];

        echo "<tr> <td>" . $row["complaintID"]. "</td>";
        $complaintid=$row["complaintID"];
        echo "<td>" .$row["complaint_received_date"]. "</td>";
        echo "<td>" .$row["regNumber"]."</td>";
        $admissionNO=$row["regNumber"];
        echo "<td>" .$row["emailAddress"]."</td>";
        echo "<td>" .$row["phone"]."</td>";
        echo "<td>" .$row["TypeofComplaint"]."</td>";
        echo "<td>" .$row["complaintDescription"]."</td>";
        echo "<td>" .$row["complaintResponse"]."</td>";
        echo "<td> .  <form method ='POST' action=''>
        <input type='text' name='hidden_complaintid' value='$complaintid' hidden>
        <input type='text' name='hidden_adm' value='$admissionNO' hidden>
        <textarea name='response' placeholder='Type your response here' cols='30' rows='3'></textarea>
        <input type='submit' class='btn btn-success complaint-btn' name='complaint_response_btn'>
        </form>
        </td> </tr>";
      

        if (isset($_POST['complaint_response_btn'])) {
          $response=$_POST['response'];
          $admissionNumber=$_POST['hidden_adm'];
          $ComplaintID=$_POST['hidden_complaintid'];

          $complaint_query = "UPDATE complaints SET complaintResponse='$response' where regNumber='$admissionNumber' and complaintID='$ComplaintID' ";
          $complaint_query_result = mysqli_query($db, $complaint_query );

          $row = mysqli_fetch_assoc($complaint_query_result);
        }
    }
   }
            ?>
          </table>
        
 <!--Footer section-->
 <footer translate="no" class="footer-section">
    <div class="container">
      <div class="row">
        <div class="col">
          
            <h4 class="footer-menu">MENU </h4>
            <a href="adminDashboard.php" class="footer-menu">Home</a>
            <a class="footer-menu" href="disbursement.php">Disbursment</a>
            <a class="footer-menu" href="adminComplaints.php">Complaints</a>
            <a href="adminDownloadPage.php" class="footer-menu">Downloads</a>
        </div>
        <div class="col-6">
          <h4 class="footer-heading">MASENO UNIVERSITY</h4>
          <p>Maseno University is a public university based in the Maseno district of the city of Kisumu, Kenya, 
            situated along the Equator. It was fully  fledged as a university in 2001, after being a constituent 
            college of Moi University for a decade. It is one of public universities in Kenya.</p>
        </div>
        <div class="col">
         <h3>Social Media</h3>
         <p>Maseno University social media handles include:</p>
         <a class="fa fa-twitter fa-2x" href="https://twitter.com/maseno_uni" target="_blank"></a>
         <a class="fa fa-facebook fa-2x" href="https://facebook.com/MasenoUniversity" target="_blank"></a>
         <a class="fa fa-instagram fa-2x" href="https://instagram.com/maseno_university_" target="_blank"></a>
        </div>
      </div>
      
    </div>
    <p class="copyright" style="text-align: center;">Maseno University &copy;<span id="currentYear">2021</span></p>
  </footer>
  <!--end footer-->





    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
    </html>