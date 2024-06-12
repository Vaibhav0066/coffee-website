<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Brews Coffee - Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
      body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
  padding: 50px;
  text-align: center;
}

h1 {
  color: #333;
  font-size: 2.5em;
  margin-bottom: 50px;
}

form {
  display: inline-block;
  margin: 0 auto;
  background-color: #fff;
  padding: 30px;
  border-radius: 5px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

label {
  display: block;
  margin-bottom: 10px;
  font-size: 1.2em;
  font-weight: bold;
  color: #333;
}

input[type="text"],
input[type="password"] {
  width: 300px;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 1.1em;
  box-sizing: border-box;
}

button[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 1.1em;
  transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
  background-color: #45a049;
}

a {
  display: block;
  margin-top: 20px;
  color: #4CAF50;
  text-decoration: none;
  font-size: 1.1em;
}
</style>
</head>
<body>
  <h1>Login</h1>
  <form action="process_login.php" method="post">
    <label for="username_email">Username or Email:</label>
    <input type="text" name="username_email" id="username_email" required>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>  <br>
    <button type="submit">Login</button>
    <a href="#">Forgot Password?</a>  </form>
</body>
</html>
