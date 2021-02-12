DROP TABLE IF EXISTS "blog";

CREATE TABLE "blog" (
  "id" integer NOT NULL,
  "titulo" varchar(255) DEFAULT NULL,
  "autor" varchar(100) DEFAULT NULL,
  "blog" text DEFAULT NULL,
  "imagen" varchar(100) DEFAULT NULL,
  "tags" text DEFAULT NULL,
  "created_at" timestamp DEFAULT current_timestamp,
  "updated_at" timestamp DEFAULT current_timestamp,
  PRIMARY KEY ("id")
);

INSERT INTO "blog" VALUES (1,'A day with Symfony2','dsyph3r','Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify de-nim vel ports.\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velo-city magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat con-gue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mau-ris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae vive-rra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elemen-tum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitu-din, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tor-tor ac nunc. Donec pharetra eleifend enim vel porta.','img/beach.jpg','symfony2, php, paradise, symblog','2021-01-27 20:54:34','2021-01-27 20:54:34'),(2,'The pool on the roof must have a leak','Zero Cool','Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo sceleris-que. Na. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elemen-tum lobortis.','img/pool_leak.jpg','pool, leaky, hacked, movie, hacking, symblog','2021-01-27 20:54:34','2021-01-27 20:54:34'),(3,'Misdirection. What the eyes see and the ears hear, the mind believes','Gabriel','Lorem ipsumvehicula nunc non leo hendrerit commodo. Vestibulum vulputate mau-ris eget erat congue dapibus imperdiet justo scelerisque.','img/misdirection.jpg','misdirection, magic, movie, hacking, symblog','2021-01-27 20:54:34','2021-01-27 20:54:34'),(4,'The grid - A digital frontier','Kevin Flynn','Lorem commodo. Vestibulum vulputate mauris eget erat congue dapibus imper-diet justo scelerisque. Nulla consectetur tempus nisl vitae viverra.','img/the_grid.jpg','grid, daftpunk, movie, symblog','2021-01-27 20:54:34','2021-01-27 20:54:34'),(5,'You re either a one or a zero. Alive or dead','Gary Winston','Lorem ipsum dolor sit amet, consectetur adipiscing elittibulum vulputate mau-ris eget erat congue dapibus imperdiet justo scelerisque.','img/one_or_zero.jpg','binary, one, zero, alive, dead, !trusting, movie, symblog','2021-01-27 20:54:34','2021-01-27 20:54:34');

DROP TABLE IF EXISTS "comment";
CREATE TABLE "comment" (
  "id" integer NOT NULL,
  "blog_id" integer DEFAULT NULL,
  "user" varchar(255) DEFAULT NULL,
  "comment" text DEFAULT NULL,
  "approved" smallint DEFAULT NULL,
  "created_at" timestamp DEFAULT current_timestamp,
  "updated_at" timestamp DEFAULT current_timestamp,
  PRIMARY KEY ("id"),
  CONSTRAINT "comment_ibfk_1" FOREIGN KEY ("blog_id") REFERENCES "blog" ("id") ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO "comment" VALUES (1,1,'symfony','To make a long story short. You can t go wrong by choosing Sym-fony! And no one has ever been fired for using Symfony.',1,'2021-01-27 20:54:34','2021-01-27 20:54:34'),(2,1,'David','To make a long story short. Choosing a frame-work must not be taken lightly; it is a long-term commitment. Make sure that you make the right se-lection!',1,'2021-01-27 20:54:34','2021-01-27 20:54:34'),(3,2,'Dade','Anything else, mom? You want me to mow the lawn? Oops! I for-got, New York, No grass.',1,'2021-01-27 20:54:34','2021-01-27 20:54:34'),(4,2,'Kate','Are you challenging me? ',1,'2021-01-27 20:54:34','2021-01-27 20:54:34'),(5,2,'Dade','Name your stakes.',1,'2021-01-27 20:54:35','2021-01-27 20:54:35'),(6,2,'Kate','If I win, you become my slave.',1,'2021-01-27 20:54:35','2021-01-27 20:54:35'),(7,2,'Dade','Your SLAVE?',1,'2021-01-27 20:54:35','2021-01-27 20:54:35'),(8,2,'Kate','You wish! You ll do shitwork, scan, crack copyrights...',1,'2021-01-27 20:54:35','2021-01-27 20:54:35'),(9,2,'Dade','And if I win?',1,'2021-01-27 20:54:35','2021-01-27 20:54:35'),(10,2,'Kate','Make it my first-born!',1,'2021-01-27 20:54:35','2021-01-27 20:54:35'),(11,2,'Dade','Make it our first-date!',1,'2021-01-27 20:54:35','2021-01-27 20:54:35'),(12,2,'Kate','I don t DO dates. But I don t lose either, so you re on!',1,'2021-01-27 20:54:35','2021-01-27 20:54:35'),(13,3,'Stanley','It s not gonna end like this.',1,'2021-01-27 20:54:35','2021-01-27 20:54:35'),(14,3,'Gabriel','Oh, come on, Stan. Not everything ends the way you think it should. Besi-des, audiences love happy endings.',1,'2021-01-27 20:54:35','2021-01-27 20:54:35'),(15,5,'Mile','Doesn t Bill Gates have something like that?',1,'2021-01-27 20:54:35','2021-01-27 20:54:35'),(16,5,'Gary','Bill Who?',1,'2021-01-27 20:54:35','2021-01-27 20:54:35'),(17,1,'Rafa','a',1,'2021-02-12 12:34:36','2021-02-12 12:34:36'),(18,1,'Rafa','Un comentario!',1,'2021-02-12 12:40:22','2021-02-12 12:40:22'),(19,1,'Rafa','fafaf',1,'2021-02-12 12:40:42','2021-02-12 12:40:42');


DROP TABLE IF EXISTS "users";
CREATE TABLE "users" (
  "id" integer NOT NULL,
  "email" varchar(128) NOT NULL,
  "password" varchar(128) NOT NULL,
  "created_at" timestamp NOT NULL,
  "updated_at" timestamp NOT NULL,
  PRIMARY KEY ("id")
);

INSERT INTO "users" VALUES (1,'rafa@gmail.com','$2y$10$Nha1AdoAd5JFfAZ0F./ht..OCaLgsJl4bX0AH8Q.3m1.qUfG9ZBaK','2021-02-09 09:36:58','2021-02-09 09:36:58'),(2,'admin@symblog.local','$2y$10$x4nFgwkFvwu83N3D547uNurzDamF/StcXw0UmuHrkwI5NvU66ZBjG','2021-02-11 11:08:36','2021-02-11 11:08:36');

