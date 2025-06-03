<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Claisty's Music Taste</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <style>
        .nav-list a {
            font-weight: bold;
        }
    </style>
</head>
<body class="blog-page">
    <header>
        <div class="navbar">
            <nav class="nav-list">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="gallery.html">Gallery</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <section id="blog">
            <h1>Music</h1>
            <div class="article-container">
                <?php
                // Include database connection file
                include 'db_connect.php';

                // Query to retrieve all posts from the 'posts' table
                $sql = "SELECT id, title, content, image_url FROM posts ORDER BY created_at DESC";
                $result = $conn->query($sql);

                // Check if any data is found
                if ($result->num_rows > 0) {
                    // Loop through each row and display it
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="article-items">';
                        echo '    <article>';
                        echo '        <h2>' . htmlspecialchars($row["title"]) . '</h2>'; // Display title
                        echo '        <img src="' . htmlspecialchars($row["image_url"]) . '" alt="' . htmlspecialchars($row["title"]) . '" width="300" height="400">'; // Display image
                        echo '        <p>' . htmlspecialchars($row["content"]) . '</p>'; // Display content
                        echo '    </article>';
                        echo '</div>';
                    }
                } else {
                    echo "Tidak ada artikel ditemukan."; // Message if no data is found
                }
                // Close database connection (moved after displaying submissions if you choose to display them here)
                // $conn->close(); 
                ?>
            </div>

            <h2 class="form-title">Share your music!</h2>
            <form action="submit_song.php" method="POST" class="song-submission-form">
                <table class="form-table">
                    <tr>
                        <td><label for="your_name">Your Name:</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" id="your_name" name="your_name"></td>
                    </tr>
                    <tr>
                        <td><label for="song_title">Song Recomendation:</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" id="song_title" name="song_title" required></td>
                    </tr>
                        <td><input type="submit" value="Submit" class="btn submit-btn"></td>
                    </tr>
                </table>
            </form>
            <?php
            // Close the database connection after all operations are done
            $conn->close();
            ?>
        </section>
    </main>
    <footer>
        <div class="footer-content">
            <p>&copy; 2025 Music Blog. All rights reserved.</p>
        </div>
    </footer>
    <script src="script.js"></script>
</body>
</html>
