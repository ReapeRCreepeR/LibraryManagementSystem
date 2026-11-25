
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Appointment</title>
<style>
body{
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background-image: url('img/library.jpg');
  overflow: hidden;
}
</style>
  </head>

  <body>
    <div class="contact">
      <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3862.588325522624!2d121.28498571411765!3d14.508306483223066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ea15cf4536b1%3A0xee7af8110eb4f1c9!2sSTI%20College%20Tanay!5e0!3m2!1sen!2sph!4v1677166320141!5m2!1sen!2sph"
        width="600" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <div class="form">
        <h1 style="color:black;font-weight:400;">Contact Us</h1>
        <form action="https://formsubmit.co/3e5abc791383868dd1a00431692800dc" method="POST"><!-- email where to send the contact-->
          <input type="text" name="name" required placeholder="Name">
          <input type="email" name="email" required placeholder="Email">
          <input type="text" name="phone" required placeholder="Phone No"><br>
          <input type="text" name="date of walk-in" required placeholder="Date of Walk-in"><br>
          <textarea name="message" required placeholder="Message"></textarea>

          <input type="hidden" name="_template" value="table">
          <input type="hidden" name="_blacklist" value="spammy pattern, banned term, phrase">
          <input type="text" name="_honey" style="display:none">
          <input type="hidden" name="_next" value="http://localhost/Library/login/visitor/thank.php">




          <button type="submit">Submit</button>

        </form>

      </div>
    </div>



  </body>
</html>
