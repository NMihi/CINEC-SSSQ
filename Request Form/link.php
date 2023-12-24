<!DOCTYPE html>
<html>
  <head>
    <title>Email Button</title>
  </head>
  <body>
    <h1>CINEC SSSQ Form</h1>
    <p>Click the button below to send the form link via email:</p>
    <button id="sendEmailButton">Send Email</button>

    <?php 
      $userID = $_GET['id'];
      session_start();
    ?>

    <script>
      document
        .getElementById("sendEmailButton")
        .addEventListener("click", function () {
          var subject = "Regarding your website";
          var body =
            "<?php echo'http://localhost/CINEC-SSSQ/Student%20Form/StudentForm.php?id='.$userID;?>";

          // Encode the email address, subject, and body
          subject = encodeURIComponent(subject);
          body = encodeURIComponent(body);

          // Create the mailto link
          var mailtoLink = "mailto:" + "?subject=" + subject + "&body=" + body;

          // Open the user's email client
          window.location.href = mailtoLink;
        });
    </script>
  </body>
</html>
