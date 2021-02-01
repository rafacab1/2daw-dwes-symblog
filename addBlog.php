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
    <title>Añadir entrada</title>
</head>

<body>
    <section id="wrapper">
        <header id="header">
        <div class="top">
                <nav>
                    <ul class="navigation">
                        <li><a href="?route=/">Home</a></li>
                        <li><a href="?route=about">About</a></li>
                        <li><a href="?route=contact">Contact</a></li>
                        <li><a href="?route=add">Add blog</a></li>
                    </ul>
                </nav>
            </div>
            <hgroup>
                <h2><a href="?route=/">symblog</a></h2>
                <h3><a href="?route=/">creating a blog in Symfony2</a></h3>
            </hgroup>
        </header>
        <section class="main-col">
        <!-- Formulario -->
        <?php
            echo "<form method=\"POST\" action=\"" . $_SERVER['PHP_SELF'] . "\">";
            echo "<label for=\"titulo\">Título</label>";
            echo "<input type=\"text\" name=\"titulo\" id=\"titulo\">";
            echo "<label for=\"descripcion\">Descripción</label>";
            echo "<textarea name=\"descripcion\" id=\"descripcion\" cols=\"30\" rows=\"10\"></textarea>";
            echo "<label for=\"tags\">Tags</label>";
            echo "<input type=\"text\" name=\"tags\" id=\"tags\">";
            echo "<label for=\"autor\">Autor</label>";
            echo "<input type=\"text\" name=\"autor\" id=\"autor\">";
            echo "<input type=\"submit\" value=\"Guardar blog\" name=\"guardar\">";
            echo "</form>";
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