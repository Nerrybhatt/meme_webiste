<?php
// Example static user info (replace later with DB data)
$username = "naresh_18";
$followers = 0;
$following = 0;
$ranked = "1,228,630";
$score = 103;
 $bio = "hello!";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $username; ?> | Account</title>
    <style>
        /* ---------- BASIC RESET ---------- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

         body {
            background-color: #cfd3d7;
            color: #333;
            /* display: flex;
            justify-content: center; */
            padding: 40px 20px;
        } 
        .navbar {
            background-color: rgb(105, 122, 234);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            border-radius: 5px;
            font-family: Arial, sans-serif;
            position: sticky;
            top: 0;
            z-index: 1000;
            margin: 0px;
            min-height: 60px;
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
            flex-shrink: 0;
        }
        #logo a{
            text-decoration:none;
        }

        .nav-content {
            display: flex;
            align-items: center;
            gap: 20px;
            flex: 1;
            justify-content: space-between;
            margin-left: 20px;
        }

        .nav-links {
            display: flex;
            list-style: none;
            align-items: center;
            gap: 15px;
            margin: 0;
            padding: 0;
        }

        .nav-links li {
            display: flex;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: white;
            font-size: 16px;
            padding: 8px 12px;
            white-space: nowrap;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .nav-links a:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .line {
            color: rgb(188, 197, 204);
            margin: 0 5px;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 15px;
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
            width: 180px;
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

        .search-bar button:hover {
            background-color: rgb(80, 100, 210);
        }

        .user {
            flex-shrink: 0;
        }

        .user img {
            width: 22px;
            height: 22px;
            border-radius: 50%;
        }

        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
            padding: 5px;
            flex-shrink: 0;
        }

        /* ---------- PROFILE CONTAINER ---------- */
        .profile-container {
            width: 700px;
            background-color: #e2e6eb;
            border: 2px solid #a3a3a3;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
            margin: 0 auto;
            margin-top:50px;
        }

        .cover-photo {
            height: 160px;
            background-color: #6c7efc; /* top bar color like your website */
        }

        .profile-info {
            text-align: center;
            padding: 25px;
        }

        .profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-top: -60px;
            border: 4px solid #e2e6eb;
            background-color: #fff;
        }

        .username {
            font-size: 1.6em;
            color: #1f1f1f;
            margin-top: 10px;
        }

        .bio {
            color: #555;
            font-size: 0.9em;
            margin-bottom: 20px;
        }

        /* ---------- STATS SECTION ---------- */
        .stats {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
            background-color: #d9dee4;
            border-radius: 6px;
            padding: 10px 0;
        }

        .stats div {
            text-align: center;
        }

        .stats strong {
            color: #2d2d2d;
            font-size: 1.1em;
        }

        .stats span {
            display: block;
            color: #555;
            font-size: 0.8em;
        }

        /* ---------- TABS ---------- */
        .tabs {
            display: flex;
            justify-content: center;
            margin-top: 15px;
            background-color: #cfd3d7;
            padding: 10px;
            border-radius: 6px;
        }

        .tabs button {
            background: #6c7efc;
            border: none;
            color: white;
            font-size: 0.9em;
            padding: 8px 20px;
            margin: 0 8px;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.2s;
        }

        .tabs button:hover,
        .tabs button.active {
            background-color: #5865f2;
        }

        /* ---------- CONTENT BOX ---------- */
        .content-box {
            background-color: #dee3e9;
            border-radius: 6px;
            margin: 25px;
            padding: 25px;
            border: 1px solid #b5bcc5;
        }

        .empty-state {
            text-align: center;
            color: #555;
        }

        .empty-state .eyes {
            font-size: 1.6em;
        }

        .empty-state small {
            color: #777;
        }

        /* ---------- RESPONSIVE ---------- */
        @media (max-width: 700px) {
            .profile-container {
                width: 100%;
            }
            .stats {
                flex-direction: column;
                gap: 10px;
            }
            .tabs {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>

<!-- Navigation -->
    <nav class="navbar">
        <div id="logo"><a href="index.php">🍄 Just fungi</a></div>
        
        <div class="nav-content">
            <ul class="nav-links" id="navLinks">
                <li><a href="#" onclick="filterContent('top')">Top</a><span class="line">|</span></li>
                <li><a href="#" onclick="filterContent('trending')">Trending</a><span class="line">|</span></li>
                <li><a href="#" onclick="filterContent('comics')">Comics</a><span class="line">|</span></li>
                <li><a href="#" onclick="filterContent('account')">Account</a></li>
            </ul>

            <div class="nav-right">
                <div class="search-bar">
                    <input type="text" placeholder="Search---" id="searchInput" onkeypress="handleSearch(event)">
                    <button onclick="performSearch()">Submit</button>
                </div>

                <div class="user">
                    <a href="account.php" onclick="showProfile()">
                        <img src="account.png" style="filter: invert(1);">
                    </a>
                </div>
            </div>
        </div>

        <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">☰</button> 
    </nav>

    <div class="profile-container">
        <div class="cover-photo"></div>

        <div class="profile-info">
            <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Profile" class="profile-pic">

            <h2 class="username"><?php echo $username; ?></h2>
            <p class="bio"><?php echo $bio; ?></p>

            <div class="stats">
                <div><strong><?php echo $followers; ?></strong><span>Followers</span></div>
                <!-- <div><strong><?php echo $following; ?></strong><span>Following</span></div> -->
                <div><strong><?php echo $ranked; ?></strong><span>Ranked</span></div>
                <div><strong><?php echo $score; ?></strong><span>Score</span></div>
            </div>

            <div class="tabs">
                <button class="active">Uploads</button>
                <button>Comments</button>
                <button>Stats</button>
            </div>

            <div class="content-box">
                <div class="empty-state">
                    <span class="eyes">👀</span>
                    <p>You don't have any published memes</p>
                    <small>We have millions of memes, but you won't find them here.</small>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
