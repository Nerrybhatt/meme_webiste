
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Just Fungi</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        body {
            background-color: rgb(200, 206, 211);
        }

        /* Navigation */
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
            margin: 5px;
            min-height: 60px;
        }

        #logo {
            font-size: 22px;
            color: rgb(59, 55, 44);
            font-weight: bolder;
            border: 2px solid rgb(90, 95, 90);
            padding: 5px 12px;
            background-color:rgb(248, 249, 250);
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
        .post_button{
            background-color: rgba(187, 222, 166, 1);
            padding: 5px 15px;
            border-radius: 10px;
            border: 3px solid black;
        }
         .post_button a{
             color:rgba(15, 27, 7, 1);
             text-decoration: none;
             font-weight:bold;
         }
         .post_button:hover {
            background-color:  rgba(165, 222, 132, 1);
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

        /* Container */
        .container {
            display: grid;
            grid-template-columns: 280px 1fr 220px;
            gap: 20px;
            margin-top: 20px;
            padding: 0 20px;
            max-width: 1400px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Categories */
        .categories {
            background: rgba(255, 255, 255, 0.95);
            border: 2px solid rgb(79, 76, 76);
            border-radius: 10px;
            padding: 20px;
            height: fit-content;
        }

        .sticky_sides {
            position: sticky;
            top: 100px;
        }

        .sticky_sides h3 {
            font-family: Arial, Helvetica, sans-serif;
            padding-left: 2px;
            color: rgb(120, 120, 116);
            padding-bottom: 10px;
            text-decoration: underline;
            margin-bottom: 15px;
            font-size: 18px;
        }

        .cato {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .cato li {
            margin-bottom: 15px;
            padding: 12px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .cato li:hover {
            background-color: rgb(200, 206, 211);
        }

        .cato a {
            text-decoration: none;
            color: rgb(2, 4, 4);
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-weight: 500;
            font-size: 15px;
        }

        /* Posts Section */
        .upload {
            display: flex;
            flex-direction: column;
            gap: 25px;
            width: 100%;
        }

        .box, .box_2, .box_3 {
            background: rgb(222, 226, 230);
            border: 2px solid rgb(79, 76, 76);
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            width: 100%;
        }

        .box:hover, .box_2:hover, .box_3:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .post {
            padding: 15px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .post button {
            align-self: flex-start;
            padding: 8px 15px;
            background-color: rgb(105, 122, 234);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .post button:hover {
            background-color: rgb(90, 110, 220);
        }

        .post img {
            width: 100%;
            height: 380px;
            object-fit: cover;
            border-radius: 5px;
            display: block;
        }

        .remarks {
            list-style: none;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding: 15px;
            background: rgb(240, 240, 240);
            gap: 10px;
            flex-wrap: wrap;
        }

        .remarks li {
            display: flex;
        }

        .remarks li button {
            background: none;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 14px;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .remarks li button:hover {
            background-color: rgb(105, 122, 234);
            color: white;
        }

        .remarks li button.active {
            background-color: rgb(105, 122, 234);
            color: white;
        }

        .remarks .margin {
            margin-left: 80px;
        }

        .remarks .save {
            margin-left: 15px;
        }

        .remarks .share {
            margin-left: 15px;
        }

        /* Tags Section */
        .tags {
            background: rgba(255, 255, 255, 0.95);
            border: 2px solid rgb(79, 76, 76);
            border-radius: 10px;
            padding: 20px;
            height: fit-content;
            position:sticky;
        }

        .tags h3 {
            font-family: Arial, Helvetica, sans-serif;
            color: rgb(120, 120, 116);
            padding-bottom: 10px;
            text-decoration: underline;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .T, .P, .A, .G, .S {
            list-style: none;
            display: flex;
            flex-wrap: wrap;
            padding: 0;
            margin: 0 0 12px 0;
            gap: 6px;
        }

        .T button, .P button, .A button, .G button, .S button {
            background-color: rgb(105, 122, 234);
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 11px;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .T button:hover, .P button:hover, .A button:hover, .G button:hover, .S button:hover {
            background-color: rgb(90, 110, 220);
            transform: scale(1.05);
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .container {
                grid-template-columns: 240px 1fr 200px;
                gap: 15px;
                padding: 0 15px;
            }

            .search-bar input {
                width: 150px;
            }

            #logo {
                font-size: 20px;
            }
        }

        @media (max-width: 1024px) {
            .container {
                grid-template-columns: 220px 1fr 180px;
                gap: 12px;
            }

            .remarks .margin {
                margin-left: 40px;
            }

            .post img {
                height: 320px;
            }
        }

        @media (max-width: 968px) {
            .navbar {
                flex-wrap: wrap;
                padding: 8px 15px;
            }

            .nav-content {
                width: 100%;
                order: 3;
                margin-left: 0;
                margin-top: 10px;
            }

            .nav-links {
                display: none;
                width: 100%;
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background-color: rgb(105, 122, 234);
                padding: 15px;
                border-radius: 0 0 10px 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                z-index: 1000;
            }

            .nav-links.active {
                display: flex;
            }

            .nav-links li {
                width: 100%;
                text-align: center;
                margin-bottom: 8px;
            }

            .nav-links a {
                display: block;
                width: 100%;
                padding: 12px;
            }

            .mobile-menu-toggle {
                display: block;
                order: 2;
            }

            .nav-right {
                order: 1;
                margin-left: auto;
            }

            .search-bar {
                width: 100%;
                justify-content: center;
                margin-top: 10px;
            }

            .search-bar input {
                flex: 1;
                max-width: 300px;
            }

            .container {
                grid-template-columns: 1fr;
                gap: 20px;
                padding: 0 10px;
                margin-top: 15px;
            }

            .categories {
                order: 2;
                position: static;
            }

            .upload {
                order: 1;
            }

            .tags {
                order: 3;
                position: static;
            }

            .sticky_sides {
                position: static;
            }

            .remarks .margin {
                margin-left: 0;
            }

            .remarks .save, .remarks .share {
                margin-left: 0;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 8px 12px;
                margin: 3px;
            }

            #logo {
                font-size: 18px;
                padding: 4px 10px;
            }

            .container {
                padding: 0 8px;
                gap: 15px;
            }

            .categories, .tags {
                padding: 15px;
            }

            .post {
                padding: 12px;
            }

            .post img {
                height: 280px;
            }

            .remarks {
                flex-direction: column;
                gap: 8px;
                padding: 12px;
            }

            .remarks li {
                width: 100%;
            }

            .remarks li button {
                justify-content: center;
                width: 100%;
                padding: 10px;
            }

            .cato li {
                padding: 10px;
                margin-bottom: 12px;
            }

            .T, .P, .A, .G, .S {
                justify-content: center;
                gap: 4px;
                margin-bottom: 8px;
            }
        }

        @media (max-width: 640px) {
            .navbar {
                padding: 6px 10px;
            }

            #logo {
                font-size: 16px;
                padding: 3px 8px;
            }

            .search-bar input {
                font-size: 12px;
                padding: 6px 8px;
            }

            .search-bar button {
                font-size: 12px;
                padding: 6px 10px;
            }

            .container {
                gap: 12px;
                padding: 0 5px;
            }

            .categories, .tags {
                padding: 12px;
            }

            .post img {
                height: 240px;
            }

            .remarks li button {
                font-size: 12px;
                padding: 8px;
            }

            .cato a {
                font-size: 14px;
            }

            .T button, .P button, .A button, .G button, .S button {
                font-size: 10px;
                padding: 4px 8px;
            }
        }

        @media (max-width: 480px) {
            .navbar {
                padding: 5px 8px;
            }

            #logo {
                font-size: 14px;
                padding: 2px 6px;
            }

            .container {
                gap: 10px;
                padding: 0 3px;
                margin-top: 10px;
            }

            .categories, .tags {
                padding: 10px;
            }

            .post {
                padding: 8px;
            }

            .post img {
                height: 200px;
            }

            .remarks {
                padding: 8px;
            }

            .remarks li button {
                font-size: 11px;
                padding: 6px;
            }

            .cato li {
                padding: 8px;
                margin-bottom: 10px;
            }

            .cato a {
                font-size: 13px;
            }

            .sticky_sides h3 {
                font-size: 16px;
            }

            .tags h3 {
                font-size: 14px;
            }
        }

        /* Loading Animation */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 2px solid #f3f3f3;
            border-top: 2px solid rgb(105, 122, 234);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Fade in animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 30px;
            border-radius: 20px;
            width: 90%;
            max-width: 500px;
            position: relative;
            animation: fadeInUp 0.3s ease-out;
        }

        .close {
            position: absolute;
            right: 20px;
            top: 15px;
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .close:hover {
            color: rgb(105, 122, 234);
        }

        /* Notification */
        .notification {
            position: fixed;
            top: 100px;
            right: 20px;
            background: rgb(105, 122, 234);
            color: white;
            padding: 15px 25px;
            border-radius: 10px;
            z-index: 3000;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
            animation: fadeInUp 0.3s ease-out;
        }

        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div id="logo"><a href="index.php" >🍄 Just fungi</a></div>
        
        <div class="nav-content">
            <ul class="nav-links" id="navLinks">
                <li><a href="#" onclick="filterContent('top')">Top</a><span class="line">|</span></li>
                <li><a href="#" onclick="filterContent('trending')">Trending</a><span class="line">|</span></li>
                <li><a href="#" onclick="filterContent('comics')">Comics</a><span class="line">|</span></li>
                <li><a href="sign_up.php" onclick="filterContent('account')">Account</a></li>
            </ul>

            <div class="nav-right">
                <div class="search-bar">
                    <input type="text" placeholder="Search---" id="searchInput" onkeypress="handleSearch(event)">
                    <button onclick="performSearch()"><a href="sign_up.php">Submit</a></button>
                </div>

                <div class="user">
                    <a href="account.php" onclick="showProfile()">
                        <img src="account.png" style="filter: invert(1);">
                    </a>
                </div>
                <div class="post_button">
                    <a href="upload.php">Post</a>
                </div>
            </div>
        </div>

        <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">☰</button> 
    </nav>

    <!-- Main Container -->
    <div class="container">
        <!-- Categories -->
        <div class="categories">
            <div class="sticky_sides">
                <h3>Categories</h3>
                <ul class="cato">
                    <li onclick="filterByCategory('entertainment')">
                        <span>📺</span>
                        <a href="#">Entertainment</a>
                    </li>
                    <li onclick="filterByCategory('sports')">
                        <span>🏆</span>
                        <a href="#">Sports</a>
                    </li>
                    <li onclick="filterByCategory('politics')">
                        <span>🗣️</span>
                        <a href="#">Politics</a>
                    </li>
                    <li onclick="filterByCategory('knowledge')">
                        <span>🧠</span>
                        <a href="#">Knowledge</a>
                    </li>
                    <li onclick="filterByCategory('business')">
                        <span>💼</span>
                        <a href="#">Business</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Posts Upload Section -->
        <div class="upload" id="postsContainer">
            <div class="box fade-in-up" style="animation-delay: 0.3s;">
                <div class="post">
                    <button onclick="showPostDetails(1)">Posts..</button>
                    <img src="/" alt="Batman Robin Social Media Meme" loading="lazy">
                </div>
                <ul class="remarks">
                    <li><button onclick="toggleLike(1)" id="like-1"><span><img src="like.png" width="20px"> </span></button></li>
                    <li><button onclick="toggleDislike(1)" id="dislike-1"><span><img src="dislike.png" width="20px"></span></button></li>
                    <li><button onclick="openComments(1)" class="margin"><span><img src="comment.png" width="20px"> </span> Commt.</button></li>
                    <li><button onclick="toggleSave(1)" id="save-1" class="save"><span><img src="save.png" width="20px"> </span> Save</button></li>
                    <li><button onclick="shareMeme(1)" class="share"><span><img src="share.png" width="20px"> </span> Share</button></li>
                </ul>
            </div>

            <div class="box_2 fade-in-up" style="animation-delay: 0.4s;">
                <div class="post">
                    <button onclick="showPostDetails(2)">Posts..</button>
                    <img src="/" alt="Fry Decision Making Meme" loading="lazy">
                </div>
                <ul class="remarks">
                    <li><button onclick="toggleLike(1)" id="like-1"><span><img src="like.png" width="20px"> </span></button></li>
                    <li><button onclick="toggleDislike(1)" id="dislike-1"><span><img src="dislike.png" width="20px"></span></button></li>
                    <li><button onclick="openComments(1)" class="margin"><span><img src="comment.png" width="20px"> </span> Commt.</button></li>
                    <li><button onclick="toggleSave(1)" id="save-1" class="save"><span><img src="save.png" width="20px"> </span> Save</button></li>
                    <li><button onclick="shareMeme(1)" class="share"><span><img src="share.png" width="20px"> </span> Share</button></li>
                </ul>
            </div>

            <div class="box_3 fade-in-up" style="animation-delay: 0.2s;">
                <div class="post">
                    <button onclick="showPostDetails(3)">Posts..</button>
                    <img src="https://via.placeholder.com/460x380/FF6B6B/ffffff?text=Funny+Meme+8" alt="Meme 8" loading="lazy">
                </div>
                <ul class="remarks">
                    <li><button onclick="toggleLike(1)" id="like-1"><span><img src="like.png" width="20px"> </span></button></li>
                    <li><button onclick="toggleDislike(1)" id="dislike-1"><span><img src="dislike.png" width="20px"></span></button></li>
                    <li><button onclick="openComments(1)" class="margin"><span><img src="comment.png" width="20px"> </span> Commt.</button></li>
                    <li><button onclick="toggleSave(1)" id="save-1" class="save"><span><img src="save.png" width="20px"> </span> Save</button></li>
                    <li><button onclick="shareMeme(1)" class="share"><span><img src="share.png" width="20px"> </span> Share</button></li>
                </ul>
            </div>

            <div class="box_3 fade-in-up" style="animation-delay: 0.3s;">
                <div class="post">
                    <button onclick="showPostDetails(4)">Posts..</button>
                    <img src="" alt="Amal Special Meme" loading="lazy">
                </div>
                <ul class="remarks">
                    <li><button onclick="toggleLike(1)" id="like-1"><span><img src="like.png" width="20px"> </span></button></li>
                    <li><button onclick="toggleDislike(1)" id="dislike-1"><span><img src="dislike.png" width="20px"></span></button></li>
                    <li><button onclick="openComments(1)" class="margin"><span><img src="comment.png" width="20px"> </span> Commt.</button></li>
                    <li><button onclick="toggleSave(1)" id="save-1" class="save"><span><img src="save.png" width="20px"> </span> Save</button></li>
                    <li><button onclick="shareMeme(1)" class="share"><span><img src="share.png" width="20px"> </span> Share</button></li>
                </ul>
            </div>

            <div class="box_3 fade-in-up" style="animation-delay: 0.4s;">
                <div class="post">
                    <button onclick="showPostDetails(5)">Posts..</button>
                    <img src="/" alt="Capture Moment" loading="lazy">
                </div>
                <ul class="remarks">
                    <li><button onclick="toggleLike(1)" id="like-1"><span><img src="like.png" width="20px"> </span></button></li>
                    <li><button onclick="toggleDislike(1)" id="dislike-1"><span><img src="dislike.png" width="20px"></span></button></li>
                    <li><button onclick="openComments(1)" class="margin"><span><img src="comment.png" width="20px"> </span> Commt.</button></li>
                    <li><button onclick="toggleSave(1)" id="save-1" class="save"><span><img src="save.png" width="20px"> </span> Save</button></li>
                    <li><button onclick="shareMeme(1)" class="share"><span><img src="share.png" width="20px"> </span> Share</button></li>
                </ul>
            </div>

            <div class="box_3 fade-in-up" style="animation-delay: 0.5s;">
                <div class="post">
                    <button onclick="showPostDetails(6)">Posts..</button>
                    <img src="https://via.placeholder.com/460x380/FFB74D/ffffff?text=Meme+9" alt="Meme 9" loading="lazy">
                </div>
                <ul class="remarks">
                    <li><button onclick="toggleLike(1)" id="like-1"><span><img src="like.png" width="20px"> </span></button></li>
                    <li><button onclick="toggleDislike(1)" id="dislike-1"><span><img src="dislike.png" width="20px"></span></button></li>
                    <li><button onclick="openComments(1)" class="margin"><span><img src="comment.png" width="20px"> </span> Commt.</button></li>
                    <li><button onclick="toggleSave(1)" id="save-1" class="save"><span><img src="save.png" width="20px"> </span> Save</button></li>
                    <li><button onclick="shareMeme(1)" class="share"><span><img src="share.png" width="20px"> </span> Share</button></li>
                </ul>
            </div>
        </div>

        <!-- Tags -->
        <div class="tags">
            <div class="sticky_sides">
                <h3>Recommended tags</h3>
                <ul class="T">
                    <li><button onclick="searchByTag('2025')">#2025</button></li>
                    <li><button onclick="searchByTag('February')">#February</button></li>
                    <li><button onclick="searchByTag('trump')">#trump</button></li>
                </ul>
                <ul class="P">
                    <li><button onclick="searchByTag('Russia')">#Russia</button></li>
                    <li><button onclick="searchByTag('Politics')">#Politics</button></li>
                    <li><button onclick="searchByTag('Ronaldo')">#Ronaldo</button></li>
                </ul>
                <ul class="A">
                    <li><button onclick="searchByTag('US_gov')">#US_gov</button></li>
                    <li><button onclick="searchByTag('Daily')">#Daily</button></li>
                    <li><button onclick="searchByTag('Country')">#Country</button></li>
                </ul>
                <ul class="G">
                    <li><button onclick="searchByTag('Birds')">#Birds</button></li>
                    <li><button onclick="searchByTag('Cricket')">#Cricket</button></li>
                    <li><button onclick="searchByTag('Messi')">#Messi</button></li>
                </ul>
                <ul class="S">
                    <li><button onclick="searchByTag('champ_trop')">#champ_trop</button></li>
                    <li><button onclick="searchByTag('Saudi')">#Saudi</button></li>
                    <li><button onclick="searchByTag('Nature')">#Nature</button></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Comment Modal -->
    <div id="commentModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 style="color: rgb(105, 122, 234); margin-bottom: 20px;">Comments</h2>
            <div id="commentsList" style="max-height: 300px; overflow-y: auto; margin-bottom: 20px;"></div>
            <div style="display: flex; gap: 10px;">
                <input type="text" id="commentInput" placeholder="Add a comment..." style="flex: 1; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                <button onclick="addComment()" style="background: rgb(105, 122, 234); color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Post</button>
            </div>
        </div>
    </div>

    <script>
        // State management
        let currentPostId = null;
        let postStates = {};

        // Initialize post states
        for (let i = 1; i <= 6; i++) {
            postStates[i] = {
                liked: false,
                disliked: false,
                saved: false,
                comments: []
            };
        }

        // Mobile menu toggle
        function toggleMobileMenu() {
            const navLinks = document.getElementById('navLinks');
            navLinks.classList.toggle('active');
        }

        // Search functionality
        function handleSearch(event) {
            if (event.key === 'Enter') {
                performSearch();
            }
        }

        function performSearch() {
            const query = document.getElementById('searchInput').value.trim();
            if (query) {
                showNotification(`Searching for: "${query}"`);
                // Here you would implement actual search logic
            }
        }

        // Filter content
        function filterContent(type) {
            showNotification(`Filtering by: ${type}`);
            // Here you would implement filtering logic
        }

        function filterByCategory(category) {
            showNotification(`Showing ${category} memes`);
            // Scroll to posts
            document.getElementById('postsContainer').scrollIntoView({ behavior: 'smooth' });
        }

        function searchByTag(tag) {
            document.getElementById('searchInput').value = tag;
            showNotification(`Searching for tag: #${tag}`);
            performSearch();
        }

        // Post interactions
        function toggleLike(postId) {
            const state = postStates[postId];
            const likeBtn = document.getElementById(`like-${postId}`);
            const dislikeBtn = document.getElementById(`dislike-${postId}`);

            if (state.disliked) {
                state.disliked = false;
                dislikeBtn.classList.remove('active');
            }

            state.liked = !state.liked;
            likeBtn.classList.toggle('active', state.liked);
            
            showNotification(state.liked ? 'Liked!' : 'Like removed');
        }

        function toggleDislike(postId) {
            const state = postStates[postId];
            const likeBtn = document.getElementById(`like-${postId}`);
            const dislikeBtn = document.getElementById(`dislike-${postId}`);

            if (state.liked) {
                state.liked = false;
                likeBtn.classList.remove('active');
            }

            state.disliked = !state.disliked;
            dislikeBtn.classList.toggle('active', state.disliked);
            
            showNotification(state.disliked ? 'Disliked!' : 'Dislike removed');
        }

        function toggleSave(postId) {
            const state = postStates[postId];
            const saveBtn = document.getElementById(`save-${postId}`);
            
            state.saved = !state.saved;
            saveBtn.classList.toggle('active', state.saved);
            
            if (state.saved) {
                saveBtn.innerHTML = '<span>❤️</span> Saved';
            } else {
                saveBtn.innerHTML = '<span>💾</span> Save';
            }
            
            showNotification(state.saved ? 'Meme saved!' : 'Meme unsaved');
        }