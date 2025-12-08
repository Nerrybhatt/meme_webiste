<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Just fungi | login Form</title>
    <style>
        * {
            background-color: rgb(217, 217, 217);
            font-family: Arial, sans-serif;
        }

        #login_bar {
            background-color: rgb(255, 255, 255);
            width: 440px;
            height: 250px;
            margin: auto;
            margin-top: 100px;
            padding: 50px;
            padding-top: 30px;
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            border-radius: 7px;
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

        #forgot_password {
            background-color: white;
        }

        #forgot_password a {
            background-color: white;
            font-size: 13px;
            text-decoration: none;
            color: rgb(105, 122, 234);
            padding-right: 5px;

        }
    </style>
</head>

<body>
    <div id="login_bar">
        Log in<br><br>
        <input type="text" name="uname" id="text" placeholder="Email"><br>
        <input type="password" name="upassword" id="text" placeholder=" Password"><br>
        <input type="submit" id="button" value="login"><br>
        <div id="forgot_password">
            <a href="/">Forgot account?</a>
            <a href="sign_up.php">Sign up</a>
        </div>
    </div>

</body>

</html>