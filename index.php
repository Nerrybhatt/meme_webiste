<?php
include "database_connection.php";

if (isset($_POST['submit_comment'])) {
    $post_id = $_POST['post_id'];
    $comment_text = mysqli_real_escape_string($conn, $_POST['comment_text']);

    $sql_insert = "INSERT INTO comments (post_id, comment_text) VALUES ('$post_id', '$comment_text')";
    mysqli_query($conn, $sql_insert);

    // Avoid form resubmission
    header("Location: " . $_SERVER['PHP_SELF'] . "#post-" . $post_id);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Just Fungi</title>
    <link rel="stylesheet" href="index.css">
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
                <li><a href="sign_up.php" onclick="filterContent('account')">Account</a></li>
            </ul>


            <div class="nav-right">
                <div class="search-bar">
                    <input type="text" placeholder="Search---" id="searchInput" onkeypress="handleSearch(event)">
                    <!-- <button onclick="performSearch()"><a href="sign_up.php">Submit</a></button> -->
                </div>

                <div class="user">
                    <a href="sign_up.php" onclick="showProfile()">
                        <img src="account.png" style="filter: invert(1);">
                    </a>
                </div>
                <div class="post_button">
                    <a href="upload.php">Post</a>
                </div>
            </div>
        </div>

        <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">☰</button>
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


        <!-- Post Display section-->
        <div class="upload" id="postsContainer">
            <?php
            include "database_connection.php";

            // Fetch latest memes
            $sql = "SELECT id, image_url, caption, category, created_at,
            like_count, dislike_count
             FROM post  ORDER BY created_at DESC";


            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

                    $id = $row['id'];
                    $image = $row['image_url'];
                    $caption = htmlspecialchars($row['caption']);
                    $category = htmlspecialchars($row['category']);
                    $time = date("M d, Y • h:i A", strtotime($row['created_at']));


                    $likes = isset($row['like_count']) ? $row['like_count'] : 0;
                    $dislikes = isset($row['dislike_count']) ? $row['dislike_count'] : 0;
                    ?>

                    <div class="box fade-in-up" style="animation-delay: 0.3s;">

                        <div class="post">
                            <button onclick="showPostDetails(<?php echo $id; ?>)">Posts..</button>

                            <div class="post-time" style="font-size:14px; color:#777; margin-bottom:8px;">
                                <?php echo $time; ?>
                            </div>

                            <p class="caption-text" style="margin-top:10px; font-size:16px; font-weight:500;">
                                <?php echo $caption; ?>
                            </p>

                            <img src="<?php echo $image; ?>" alt="<?php echo $caption; ?>" loading="lazy"
                                style="max-width:100%; max-height:400px; border-radius:8px; margin-top:10px;">



                        </div>

                        <!-- like and dislike -->
                        <ul class="remarks">

                            <li>
                                <a href="like.php?id=<?php echo $id; ?>&type=like" style="text-decoration:none;">
                                    <button>
                                        <span><img src="like.png" width="20px"></span>
                                        <?php echo $likes; ?>
                                    </button>
                                </a>
                            </li>

                            <li>
                                <a href="like.php?id=<?php echo $id; ?>&type=dislike" style="text-decoration:none;">
                                    <button>
                                        <span><img src="dislike.png" width="20px"></span>
                                        <?php echo $dislikes; ?>
                                    </button>
                                </a>
                            </li>

                            <li>
                                <button onclick="toggleCommentSection(<?php echo $id; ?>)" class="margin">
                                    <span><img src="comment.png" width="20px"></span> Commt.
                                </button>
                            </li>

                            <form action="save_post.php" method="POST" style="display:inline;">
                                <input type="hidden" name="post_id" value="<?php echo $id; ?>">
                                <button type="submit" name="save_post">
                                    <span><img src="save.png" width="20px"></span> Save
                                </button>
                            </form>


                            <li><button onclick="shareMeme(<?php echo $id; ?>)" class="share">
                                    <span><img src="share.png" width="20px"></span> Share
                                </button>
                            </li>

                        </ul>


                        <!-- Comments Section -->
                        <div class="comments-section" id="comments-<?php echo $id; ?>" style="display:none; margin-top:10px;">
                            <!-- Comment Form -->
                            <form action="" method="POST" style="margin-bottom:10px;">
                                <input type="hidden" name="post_id" value="<?php echo $id; ?>">
                                <input type="text" name="comment_text" placeholder="Write a comment..." required
                                    style="padding:5px; width:70%;">
                                <button type="submit" name="submit_comment">Comment</button>
                            </form>

                            <!-- Display Comments -->
                            <?php
                            $sql_comments = "SELECT * FROM comments WHERE post_id='$id' ORDER BY created_at ASC";
                            $result_comments = mysqli_query($conn, $sql_comments);

                            $comments = [];
                            while ($row_comment = mysqli_fetch_assoc($result_comments)) {
                                $comments[] = $row_comment;
                            }

                            $total_comments = count($comments);
                            $show_limit = 2;
                            ?>

                            <div class="comment-list" style="margin-top:5px;">
                                <?php
                                $display_comments = array_slice($comments, 0, $show_limit);
                                foreach ($display_comments as $comment) {
                                    echo "<p style='margin:2px 0;'>" . $comment['comment_text'] . "</p>";
                                }
                                ?>

                                <?php if ($total_comments > $show_limit): ?>
                                    <div id="more-comments-<?php echo $id; ?>" style="display:none;">
                                        <?php
                                        $more_comments = array_slice($comments, $show_limit);
                                        foreach ($more_comments as $comment) {
                                            echo "<p style='margin:2px 0;'>" . $comment['comment_text'] . "</p>";
                                        }
                                        ?>
                                    </div>
                                    <button onclick="toggleComments(<?php echo $id; ?>)" id="toggle-btn-<?php echo $id; ?>"
                                        style="margin-top:5px;">View More</button>
                                <?php endif; ?>
                            </div>
                        </div>


                    </div>

                    <?php
                }
            } else {
                echo "<p style='text-align:center;'>No memes found.</p>";
            }

            mysqli_close($conn);
            ?>
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
                <input type="text" id="commentInput" placeholder="Add a comment..."
                    style="flex: 1; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                <button onclick="addComment()"
                    style="background: rgb(105, 122, 234); color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Post</button>
            </div>
        </div>
    </div>

    <!-- share -->
    <div id="shareBox" style="
    display:none;
    position:fixed;
    bottom:20px;
    right:20px;
    background:#fff;
    padding:10px;
    border-radius:8px;
    box-shadow:0 0 10px #0003;
">
        <h4>Share Meme</h4>

        <a id="share_fb" target="_blank">Facebook</a><br>
        <a id="share_wp" target="_blank">WhatsApp</a><br>
        <a id="share_tw" target="_blank">Twitter</a><br>
        <a id="share_tg" target="_blank">Telegram</a><br>
        <a id="share_rd" target="_blank">Reddit</a><br>
        <button onclick="copyShareLink()">Copy Link</button><br><br>

        <button onclick="closeShareBox()">Close</button>
    </div>



    <script>
        function toggleCommentSection(postId) {
            const commentSection = document.getElementById('comments-' + postId);

            if (commentSection.style.display === 'none') {
                commentSection.style.display = 'block';
            } else {
                commentSection.style.display = 'none';
            }
        }

        // View More / View Less for extra comments
        function toggleComments(postId) {
            const moreComments = document.getElementById('more-comments-' + postId);
            const toggleBtn = document.getElementById('toggle-btn-' + postId);

            if (moreComments.style.display === 'none') {
                moreComments.style.display = 'block';
                toggleBtn.innerText = 'View Less';
            } else {
                moreComments.style.display = 'none';
                toggleBtn.innerText = 'View More';
            }
        }


        function shareMeme(id) {
            let url = window.location.origin + "/view_post.php?id=" + id;
            let encoded = encodeURIComponent(url);

            document.getElementById("share_fb").href =
                "https://www.facebook.com/sharer/sharer.php?u=" + encoded;

            document.getElementById("share_wp").href =
                "https://api.whatsapp.com/send?text=" + encoded;

            document.getElementById("share_tw").href =
                "https://twitter.com/intent/tweet?url=" + encoded;

            document.getElementById("share_tg").href =
                "https://t.me/share/url?url=" + encoded;

            document.getElementById("share_rd").href =
                "https://www.reddit.com/submit?url=" + encoded;

            // Show box
            document.getElementById("shareBox").style.display = "block";

            // Save link for copy
            window.currentShareLink = url;
        }

        function copyShareLink() {
            navigator.clipboard.writeText(window.currentShareLink);
            alert("Link copied!");
        }

        function closeShareBox() {
            document.getElementById("shareBox").style.display = "none";
        }







    </script>