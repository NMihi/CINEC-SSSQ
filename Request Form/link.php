<!DOCTYPE html>
<html>
  <head>
    <title>Email Button</title>
  </head>
  <body>
    <h1>Contact Us</h1>
    <p>Click the button below to send us an email:</p>
    <button id="sendEmailButton">Send Email</button>

    <script>
      document
        .getElementById("sendEmailButton")
        .addEventListener("click", function () {
          var subject = "Regarding your website";
          var body =
            "Hello,\n\nI would like to get in touch regarding your website.\n\n";

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
