<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="get">
  <label>First Name: <input type="text" name="fmail" id="fmail" required="required" placeholder="your 
   first name"></label><br><br>
  <label>Last Name: <input type="text" name="lmail" id="lmail" required="required" placeholder="your 
   last name"></label><br><br>
  <label>E-mail: <input type="text" name="email" id="email" required="required" placeholder="your 
   email"></label><br><br>
  <label for="comments">Comments:</label><br>
  <textarea name="comments" id="comments" rows="4" cols="40" required="required"></textarea>

  <br><br>

  <form action="contact2.html" method="post">
    <input type="submit" value="Contact" />
  </form>

  <form action="contactus.html">
    <input type="reset">
  </form>

</form> 
</body>
</html>