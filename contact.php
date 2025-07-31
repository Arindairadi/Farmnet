<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars(trim($_POST['name']));
  $email = htmlspecialchars(trim($_POST['email']));
  $message = htmlspecialchars(trim($_POST['message']));

  $to = "iradiarinda63@gmail.com"; // 
  $subject = "FarmNet Contact Form - Message from $name";
  $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
  $headers = "From: $email";

  if (mail($to, $subject, $body, $headers)) {
    $response = "Thanks $name, your message has been sent!";
  } else {
    $response = "Sorry, something went wrong. Please try again later.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact Us - FarmNet</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f9fafb;
    }

    .contact-section {
      padding: 60px 20px;
    }

    .contact-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
      gap: 40px;
      max-width: 1100px;
      margin: auto;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      padding: 30px;
    }

    .contact-info h2 {
      margin-bottom: 10px;
      color: #2e7d32;
    }

    .info-box p {
      margin: 8px 0;
      color: #333;
    }

    .map-container iframe {
      width: 100%;
      height: 200px;
      border: 0;
      margin-top: 15px;
      border-radius: 8px;
    }

    .contact-form h3 {
      margin-bottom: 15px;
      color: #2e7d32;
    }

    .contact-form input,
    .contact-form textarea {
      width: 100%;
      padding: 12px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 8px;
      outline: none;
      font-size: 16px;
    }

    .contact-form button {
      width: 100%;
      background-color: #2e7d32;
      color: white;
      border: none;
      padding: 14px;
      font-size: 16px;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .contact-form button:hover {
      background-color: #1b5e20;
    }

    .message-box {
      margin-top: 10px;
      font-weight: bold;
      color: #2e7d32;
    }
  </style>
</head>
<body>
  <section class="contact-section">
    <div class="contact-container">
      <div class="contact-info">
        <h2>Contact FarmNet</h2>
        <p>We'd love to hear from you. Reach out using the form or contact details below.</p>
        <div class="info-box">
          <p><strong>Email:</strong> support@farmnet.com</p>
          <p><strong>Phone:</strong> +256 750065243</p>
          <p><strong>Location:</strong> Kabale, Uganda</p>
        </div>
        <div class="map-container">
          <iframe src="https://www.google.com/maps?q=Kabale,%20Uganda&output=embed" allowfullscreen></iframe>
        </div>
      </div>
      <div class="contact-form">
        <h3>Send Us a Message</h3>
        <?php if (isset($response)): ?>
          <p class="message-box"><?= $response ?></p>
        <?php endif; ?>
        <form method="POST" action="">
          <input type="text" name="name" placeholder="Your Name" required>
          <input type="email" name="email" placeholder="Your Email" required>
          <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
          <button type="submit">Send Message</button>
        </form>
      </div>
    </div>
  </section>
</body>
</html>
