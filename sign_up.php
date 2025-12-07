<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Just fungi | Sign up Form</title>
    <style>
        * {
            background-color: rgb(217, 217, 217);
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        #login_bar {
            background-color: rgb(255, 255, 255);
            width: 460px;
            height: 350px;
            margin: auto;
            margin-top: 100px;
            padding: 50px;
            padding-top: 50px;
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            border-radius: 8px;
        }

        #text {
            width: 300px;
            height: 30px;
            background-color: white;
            border-radius: 3px;
            border: solid 1px #9d9c9c;
            font-size: 14px;
            margin-bottom: 18px;
        }

        #button {
            background-color: rgb(105, 122, 234);
            border: solid 1px #888;
            color: white;
            border-radius: 3px;
            width: 300px;
            height: 30px;
            font-weight: bold;
        }

        #terms a {
            text-decoration: none;
            background-color: white;
            color: rgb(105, 122, 234);
        }

        #terms {
            background-color: white;
            font-size: 11px;
            text-decoration: none;
            color: rgb(128, 128, 129);
            padding-right: 5px;
            margin-bottom: 5px;
        }

        #login-link a {
            background-color: white;
            color: rgb(105, 122, 234);

        }

        #login-link {
            text-align: center;
            margin-top: 10px;
            font-size: 11px;
            background-color: white;
            color: #717171
        }
    </style>
</head>

<body>
    <div id="login_bar">
        Sign up<br><br>
        <input type="text" name="uname" id="text" placeholder="Username"><br>

        <input type="text" name="uname" id="text" placeholder="Email"><br>
        <input type="password" name="upassword" id="text" placeholder=" Password"><br>
        <input type="password" name="upassword" id="text" placeholder=" Retype Password"><br>
        <div id="terms">
            <input type="checkbox" name="terms" required>
            I agree to the <a href="terms.html" target="_blank">Terms & Conditions</a><br>
        </div>
        <input type="submit" id="button" value="Sign up"><br>
        <div id="login-link">
            Already have an account? <a href="login.php">Log In</a>
        </div>
    </div>

    </div>

</body>

</html>