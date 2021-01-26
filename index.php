<?php
    include("datos/datos.php");
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
                        <li><a href="index_sb.php">Home</a></li>
                        <li><a href="about_sb.php">About</a></li>
                        <li><a href="contact_sb.php">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <hgroup>
                <h2><a href="index_sb.php/">symblog</a></h2>
                <h3><a href="index_sb.php/">creating a blog in Symfony2</a></h3>
            </hgroup>
        </header>
        <section class="main-col">
        <?php
            foreach ($blogs as $clave => $blog) {
                echo "<article class=\"blog\">";
                echo "<div class=\"date\">";
                echo "<time datetime=\"\"></time>";
                echo "</div>";
                echo "<header>";
                echo "<h2><a href=\"show.php?id=" . $clave . "\">" . $blog->getTitle() ."</a></h2>";
                echo "</header>";
                echo "<img src=\"" . $blog->getImage() . "\" />";
                echo "<div class=\"snippet\">";
                echo "<p>" . $blog->getBlog() . "</p>";
                echo "<p class=\"continue\"><a href=\"show.php?id=" . $clave . "\">Continue reading...</a></p>";
                echo "</div>";
                echo "<footer class=\"meta\">";
                echo "    <p>Comments: <a href=\"#\">" . count($blog->getComments()) . "</a></p>";
                echo "    <p>Posted by <span class=\"highlight\">" . $blog->getAuthor() . "</span> at " . $blog->getCreated()->format('Y-m-d H:i:s') . "</p>";
                echo "    <p>Tags: <span class=\"highlight\">" . $blog->getTags() . "</span></p>";
                echo "</footer>";
                echo "</article>";
            }
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