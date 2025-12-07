<?php
include "database_connection.php";

$successMessage = ""; // Default is empty

// ONLY run this if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $category = trim($_POST['category']);
    $caption = trim($_POST['caption']);

    if (!empty($category) && !empty($caption) && isset($_FILES['file'])) {

        $imageName = $_FILES['file']['name'];
        $tempPath = $_FILES['file']['tmp_name'];
        $folder = "uploads/";

        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        $uniqueName = time() . "_" . $imageName;
        $targetPath = $folder . $uniqueName;

        if (move_uploaded_file($tempPath, $targetPath)) {

            $sql = "INSERT INTO post (category, image_url, caption)
                    VALUES ('$category', '$targetPath', '$caption')";

            if (mysqli_query($conn, $sql)) {
                // $successMessage = "✅ Meme posted successfully!";
            }
        }
    }

    mysqli_close($conn);
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make a Post</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: "Segoe UI", sans-serif;
            margin-top: 0px;
        }

        body {
            background-color: #cfd3d7;
            color: #333;
            padding: 40px 20px;
            margin: 0;
        }

        /* Navbar */
        .navbar {
            background-color: rgb(105, 122, 234);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            border-radius: 5px;
            position: sticky;
            top: 0;
            z-index: 1000;
            min-height: 60px;
            flex-wrap: wrap;
        }

        #logo {
            font-size: 22px;
            color: rgb(59, 55, 44);
            font-weight: bolder;
            border: 2px solid rgb(90, 95, 90);
            padding: 5px 12px;
            background-color: rgb(203, 222, 191);
            border-radius: 5px;
            white-space: nowrap;
        }

        #logo a {
            text-decoration: none;
        }

        .nav-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex: 1;
            flex-wrap: wrap;
            gap: 15px;
        }

        .nav-links {
            display: flex;
            list-style: none;
            align-items: center;
            gap: 10px;
            margin: 0;
            padding: 0;
            flex-wrap: wrap;
        }

        .nav-links a {
            text-decoration: none;
            color: white;
            font-size: 16px;
            padding: 8px 12px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .nav-links a:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .search-bar {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .search-bar input {
            padding: 8px 12px;
            border: none;
            border-radius: 3px;
            font-size: 14px;
            width: 160px;
            outline: none;
        }

        .search-bar button {
            padding: 8px 15px;
            background-color: rgb(90, 110, 220);
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 14px;
            white-space: nowrap;
        }

        .user img {
            width: 24px;
            height: 24px;
            border-radius: 50%;
        }

        /* Post Container */
        .post-container {
            background-color: #e2e6eb;
            max-width: 600px;
            margin: 50px auto;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 5px rgba(86, 86, 86, 0.3);
        }

        h2 {
            color: #222;
            border-bottom: 1px solid #aaa;
            padding-bottom: 10px;
            font-size: 22px;
        }

        label {
            font-weight: 500;
            display: block;
            margin-top: 15px;
            margin-bottom: 6px;
            color: #333;
        }

        .upload-box {
            background-color: #fdf4f4;
            border: 2px solid #bbb;
            border-radius: 10px;
            text-align: center;
            padding: 40px 20px;
            color: #444;
        }

        .upload-box img {
            width: 60px;
            opacity: 0.6;
        }

        .upload-box input[type="file"] {
            display: none;
        }

        .upload-box label {
            background-color: #6e78f7;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 10px;
            display: inline-block;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 6px;
            background-color: #f8f8f8;
        }

        .post-btn {
            background-color: #6e78f7;
            color: white;
            padding: 10px 30px;
            border: none;
            border-radius: 8px;
            margin-top: 20px;
            float: right;
            cursor: pointer;
            transition: 0.2s;
        }

        .post-btn:hover {
            background-color: #5b66e6;
        }

        .footer {
            clear: both;
            text-align: center;
            color: #777;
            margin-top: 15px;
            font-size: 14px;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
                padding: 15px;
            }

            .nav-content {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .search-bar input {
                width: 100%;
            }

            .post-container {
                width: 100%;
                margin: 20px auto;
            }

            h2 {
                font-size: 20px;
            }

            .post-btn {
                width: 100%;
                margin-top: 15px;
            }
        }

        @media (max-width: 480px) {
            #logo {
                font-size: 18px;
            }

            .nav-links a {
                font-size: 14px;
                padding: 6px 10px;
            }

            .search-bar button {
                padding: 6px 10px;
            }

            .upload-box {
                padding: 30px 10px;
            }

            .upload-box label {
                padding: 8px 16px;
            }

            .post-container {
                padding: 15px;
            }
        }
    </style>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar">
        <div id="logo"><a href="index.php">🍄 Just fungi</a></div>
        <div class="nav-content">
            <ul class="nav-links">
                <li><a href="#">Top</a></li>
                <li><a href="#">Trending</a></li>
                <li><a href="#">Comics</a></li>
                <li><a href="#">Account</a></li>
            </ul>

            <div class="nav-right">
                <div class="search-bar">
                    <input type="text" placeholder="Search---">
                    <button>Submit</button>
                </div>
                <div class="user">
                    <a href="account.php"><img src="account.png" style="filter: invert(1);"></a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Post Form -->
    <div class="post-container">
        <h2>Make a Post</h2>
        <form method="POST" enctype="multipart/form-data">
            <label>Images & Video</label>
            <div class="upload-box">
                <img src="pic.PNG" alt="upload icon" id="uploadIcon">
                <p>Choose a photo or video to upload</p>
                <label for="file">Choose file</label>
                <input type="file" id="file" name="file" accept="image/*,video/*" required>

                <!-- Preview container -->
                <div id="previewContainer" style="margin-top:10px;">
                    <img id="previewImg" src=""
                        style="max-width:100%; display:none; border-radius:10px; margin-top:10px;">
                </div>
            </div>

            <label>Caption</label>
            <input type="text" name="caption" placeholder="Enter meme title" required>

            <label>Category</label>
            <input type="text" name="category" placeholder="like Entertainment ...." required>

            <button class="post-btn" type="submit">Post</button>
        </form>

        <script>
            const fileInput = document.getElementById('file');
            const previewImg = document.getElementById('previewImg');
            const uploadIcon = document.getElementById('uploadIcon');

            fileInput.addEventListener('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        previewImg.src = e.target.result;
                        previewImg.style.display = "block";
                        uploadIcon.style.display = "none"; // hide original icon when preview shows
                    }

                    reader.readAsDataURL(file);
                } else {
                    previewImg.src = "";
                    previewImg.style.display = "none";
                    uploadIcon.style.display = "block";
                }
            });
        </script>

        <div class="footer">Promote your local meme!</div>
    </div>


</body>

</html>