<?php
use App\Models\Blog;

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" ; charset="utf-8" />
    <link href='http://fonts.googleapis.com/css?family=Irish+Grover' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=La+Belle+Aurore' rel='stylesheet' type='text/css'>
    <link href="css/screen.css" type="text/css" rel="stylesheet" />
    <link href="css/sidebar.css" type="text/css" rel="stylesheet" />
    <link href="css/blog.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" href="img/favicon.ico" />
</head>

<body>
    <section id="wrapper">
        <header id="header">
        <div class="top">
                <nav>
                    <ul class="navigation">
                        <li><a href="/">Home</a></li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/contact">Contact</a></li>
                        <li><a href="/blogs/add">Add blog</a></li>
                    </ul>
                </nav>
            </div>
            <hgroup>
                <h2><a href="/">symblog</a></h2>
                <h3><a href="/">creating a blog in Symfony2</a></h3>
            </hgroup>
        </header>
        <section class="main-col">
        <?php
                echo "<article class=\"blog\">";
                echo "<div class=\"date\">";
                echo "<time datetime=\"\"></time>";
                echo "</div>";
                echo "<header>";
                echo "<h2><a href=\"show.php?id=\"#\">" . $theBlog->titulo ."</a></h2>";
                echo "</header>";
                echo "<img src=\"" . $theBlog->imagen . "\" />";
                echo "<div class=\"snippet\">";
                echo "<p>" . $theBlog->blog . "</p>";
                echo "</div>";
                echo "<footer class=\"meta\">";
                echo "    <p>Posted by <span class=\"highlight\">" . $theBlog->autor . "</span> at " . $theBlog->created_at->format('Y-m-d H:i:s') . "</p>";
                echo "    <p>Tags: <span class=\"highlight\">" . $theBlog->tags . "</span></p>";
                echo "</footer>";
                echo "<div class=\"comments\">";
                echo "<h3>Comments</h3>";
                foreach (Blog::find($theBlog->id)->comments as $comentario) {
                    echo "<div class=\"comment\">";
                    echo "<p>" . $comentario->user . " comentó el " . $comentario->created_at->format('Y-m-d H:i:s') . "</p>";
                    echo "<p>" . $comentario->comment . "</p>";
                    echo "</div>";
                }
                echo "</div>";
                echo "</article>";
        ?>
        </section>
        <aside class="sidebar">
            <section class="section">
                <header>
                    <h3>Tag Cloud</h3>
                </header>
                <p class="tags">
                    <span class="weight-1">magic</span>
                    <span class="weight-5">symblog</span>
                    <span class="weight-4">movie</span>
                </p>
            </section>
            <section class="section">
                <header>
                    <h3>Latest Comments</h3>
                </header>
                <article class="comment">
                    <header>
                        <p class="small"><span class="highlight">Carlos Aguilera</span> commented on
                            <a href="#">A day with Symfony2</a>
                        </p>
                    </header>
                    <p>Comentario Usuario</p>
                </article>
            </section>
        </aside>
        <div id="footer">
            dwes symblog - created by <a href="#">dwes</a>
        </div>
    </section>
</body>

</html>