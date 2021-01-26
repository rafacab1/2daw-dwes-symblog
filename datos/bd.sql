CREATE TABLE blog (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255),
    autor VARCHAR(100),
    blog LONGTEXT,
    imagen VARCHAR(100),
    tags LONGTEXT,
    created DATETIME DEFAULT CURRENT_TIMESTAMP(),
    updated DATETIME DEFAULT CURRENT_TIMESTAMP()
);

CREATE TABLE comment (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    blog_id INT(11),
    user VARCHAR(255),
    comment LONGTEXT,
    approved TINYINT(1),
    created DATETIME DEFAULT CURRENT_TIMESTAMP(),
    updated DATETIME DEFAULT CURRENT_TIMESTAMP(),
    FOREIGN KEY (blog_id) REFERENCES blog(id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Blog 1
-- INSERT INTO blog(titulo, autor, blog, tags) VALUES("A day with Symfony2", "dsyph3r", "Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify de-nim vel ports. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velo-city magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat con-gue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mau-ris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae vive-rra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elemen-tum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitu-din, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tor-tor ac nunc. Donec pharetra eleifend enim vel porta.", "symfony2, php, paradise, symblog");
-- INSERT INTO comment(blog_id, user, comment, approved) VALUES(1, "symfony", "To make a long story short. You can't go wrong by choosing Sym-fony! And no one has ever been fired for using Symfony.", 1);
-- INSERT INTO comment(blog_id, user, comment, approved) VALUES(1, "David", "To make a long story short. Choosing a frame-work must not be taken lightly; it is a long-term commitment. Make sure that you make the right se-lection!", 1);
