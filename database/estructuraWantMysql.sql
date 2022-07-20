# Converted with pg2mysql-1.9
# Converted on Tue, 19 Jul 2022 18:07:04 -0400
# Lightbox Technologies Inc. http://www.lightbox.ca

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone="+00:00";

CREATE TABLE categorias (
    id bigint NOT NULL,
    categoria varchar(255) NOT NULL,
    id_cat_padre bigint,
    estado varchar(255) NOT NULL,
    created_at timestamp(0),
    updated_at timestamp(0)
);

CREATE TABLE clientes (
    id bigint NOT NULL,
    nombre varchar(255) NOT NULL,
    apellido1 varchar(255) NOT NULL,
    apellido2 varchar(255),
    email varchar(255) NOT NULL,
    contacto1 varchar(255) NOT NULL,
    contacto2 varchar(255),
    nacimiento date,
    rol varchar(255) NOT NULL,
    email_verified_at timestamp(0),
    password varchar(255) NOT NULL,
    remember_token varchar(100),
    created_at timestamp(0),
    updated_at timestamp(0)
);

CREATE TABLE colores (
    id bigint NOT NULL,
    color varchar(255) NOT NULL,
    created_at timestamp(0),
    updated_at timestamp(0)
);

CREATE TABLE detalles (
    id bigint NOT NULL,
    id_pedido bigint NOT NULL,
    id_stock varchar(255) NOT NULL,
    cantidad int(11) NOT NULL,
    created_at timestamp(0),
    updated_at timestamp(0)
);

CREATE TABLE failed_jobs (
    id bigint NOT NULL,
    uuid varchar(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) DEFAULT CURRENT_TIMESTAMP NOT NULL
);

CREATE TABLE migrations (
    id int(11) NOT NULL,
    migration varchar(255) NOT NULL,
    batch int(11) NOT NULL
);

CREATE TABLE password_resets (
    email varchar(255) NOT NULL,
    token varchar(255) NOT NULL,
    created_at timestamp(0)
);

CREATE TABLE pedidos (
    id bigint NOT NULL,
    id_cliente bigint,
    estado varchar(255) NOT NULL,
    sesion varchar(255),
    total double precision,
    created_at timestamp(0),
    updated_at timestamp(0)
);

CREATE TABLE personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type varchar(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name varchar(255) NOT NULL,
    token varchar(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0),
    created_at timestamp(0),
    updated_at timestamp(0)
);

CREATE TABLE productos (
    id bigint NOT NULL,
    nombre varchar(255) NOT NULL,
    marca varchar(255) NOT NULL,
    descripcion text NOT NULL,
    id_categoria bigint NOT NULL,
    rebaja int(11),
    rebaja_inicio date,
    rebaja_fin date,
    estado varchar(255) NOT NULL,
    created_at timestamp(0),
    updated_at timestamp(0)
);

CREATE TABLE stock (
    id bigint NOT NULL,
    id_producto bigint NOT NULL,
    id_talla bigint NOT NULL,
    id_color bigint NOT NULL,
    sexo varchar(255),
    precio double precision NOT NULL,
    stock int(11),
    ventas int(11),
    foto1 varchar(255) NOT NULL,
    foto2 varchar(255),
    foto3 varchar(255),
    foto4 varchar(255),
    foto5 varchar(255),
    created_at timestamp(0),
    updated_at timestamp(0)
);

CREATE TABLE tallas (
    id bigint NOT NULL,
    talla varchar(255) NOT NULL,
    created_at timestamp(0),
    updated_at timestamp(0)
);

ALTER TABLE categorias
    ADD CONSTRAINT categorias_pkey PRIMARY KEY (id);
ALTER TABLE clientes
    ADD CONSTRAINT clientes_pkey PRIMARY KEY (id);
ALTER TABLE colores
    ADD CONSTRAINT colores_pkey PRIMARY KEY (id);
ALTER TABLE detalles
    ADD CONSTRAINT detalles_pkey PRIMARY KEY (id);
ALTER TABLE failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
ALTER TABLE migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
ALTER TABLE pedidos
    ADD CONSTRAINT pedidos_pkey PRIMARY KEY (id);
ALTER TABLE personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);
ALTER TABLE productos
    ADD CONSTRAINT productos_pkey PRIMARY KEY (id);
ALTER TABLE stock
    ADD CONSTRAINT stock_pkey PRIMARY KEY (id);
ALTER TABLE tallas
    ADD CONSTRAINT tallas_pkey PRIMARY KEY (id);



INSERT INTO categorias (id, categoria, id_cat_padre, estado, created_at, updated_at) VALUES
('1','Electrónica','','OK','',''),
('4','Iluminación','','OK','',''),
('5','Libros','','OK','','2022-03-01 21:04:00'),
('6','Películas','','OK','',''),
('7','Música','','OK','',''),
('9','Hogar y Jardín','','OK','','2022-03-01 22:27:14'),
('10','Joyería','','OK','',''),
('11','Juguetes y Juegos','','OK','',''),
('12','Oficina y Papelería','','OK','','2022-03-01 22:29:06'),
('15','Consolas y Videojuegos','','OK','','2022-03-01 22:40:53'),
('16','Moda','','OK','',''),
('17','Zapatos y Complementos','16','OK','',''),
('52','Sudaderas','16','OK','2022-03-01 13:06:24','2022-03-01 13:06:24'),
('58','Fútbol','65','OK','2022-03-01 18:14:24','2022-03-02 00:41:55'),
('61','Ping Pong','65','OK','2022-03-01 19:43:29','2022-03-02 00:42:02'),
('65','Deportes','','OK','2022-03-02 00:41:04','2022-03-02 00:41:04'),
('66','Informática','1','OK','2022-03-02 00:42:28','2022-03-02 00:42:28'),
('67','Ordenadores Portátiles','66','OK','2022-03-02 00:42:35','2022-03-03 17:23:08'),
('68','Cableado','1','OK','2022-03-02 00:51:22','2022-03-03 17:24:19'),
('69','PlayStation','72','OK','2022-03-02 12:19:16','2022-03-02 12:23:57'),
('70','Xbox','72','OK','2022-03-02 12:19:33','2022-03-02 12:24:05'),
('73','Videojuegos','15','OK','2022-03-02 12:20:48','2022-03-02 12:20:48'),
('74','Televisores','3','OK','2022-03-02 13:43:00','2022-03-02 13:43:06'),
('79','Oro','10','OK','2022-04-14 14:22:38','2022-04-14 14:22:38'),
('80','Plata','10','OK','2022-04-14 14:22:45','2022-04-14 14:22:45'),
('57','Baloncesto','65','OK','2022-03-01 18:13:55','2022-03-03 17:24:17'),
('3','Audio y TV','1','OK','','2022-03-03 17:24:13'),
('13','Productos para Mascotas','','OK','',''),
('51','CD','7','OK','2022-03-01 12:41:29','2022-03-03 17:24:28'),
('60','Tenis','65','OK','2022-03-01 18:22:39','2022-03-02 00:42:08'),
('72','Consolas','15','OK','2022-03-02 12:20:41','2022-03-03 17:24:31');


--
-- TOC entry 3411 (class 0 OID 22461)
-- Dependencies: 212
-- Data for Name: clientes; Type: TABLE DATA; Schema: public; Owner: admin
--

INSERT INTO clientes (id, nombre, apellido1, apellido2, email, contacto1, contacto2, nacimiento, rol, email_verified_at, password, remember_token, created_at, updated_at) VALUES
('1','admin','admin','admin','admin@admin.com','123456789','987654321','2020-03-10','admin','','$2y$10$ofYkrjGKsVAqoeP21We.reUsUDmUFsZ7eusry7lAPcA66kmcHa.7u','','2022-04-11 20:23:28','2022-04-11 20:23:28'),
('3','Pepe','Gómez','Ruiz','pepe@gmail.com','695134812','878545656','1995-04-04','cliente','','$2y$10$cHEVNePzJB.mJXgx3FwWfu6dodnCEbGRZC.yr6u3ttxPs9Nkpqx12','','2022-04-15 14:35:27','2022-04-15 14:35:27'),
('2','Javier','Agut','Ruiz','javi@gmail.com','695134812','933812742','2000-12-12','cliente','','$2y$10$yu.MxB5Ioi2ApsCiWe67Ru5.jwcZ22NIyBET4CLKp/ewIlxAAwHhS','','2022-04-15 14:23:22','2022-04-15 16:28:57');


--
-- TOC entry 3420 (class 0 OID 22520)
-- Dependencies: 221
-- Data for Name: colores; Type: TABLE DATA; Schema: public; Owner: admin
--

INSERT INTO colores (id, color, created_at, updated_at) VALUES
('1','Blanco','',''),
('2','Negro','',''),
('3','Azul','',''),
('4','Rojo','',''),
('5','Amarillo','',''),
('6','Rosa','',''),
('7','Lila','',''),
('8','Verde','',''),
('9','Naranja','',''),
('10','Marrón','','');


--
-- TOC entry 3428 (class 0 OID 22578)
-- Dependencies: 229
-- Data for Name: pedidos; Type: TABLE DATA; Schema: public; Owner: admin
--

INSERT INTO pedidos (id, id_cliente, estado, sesion, total, created_at, updated_at) VALUES
('77','2','Llegando','qDy2WJBBxChbyHRQfUxPavueA8r1Z3SfJNGJVd79','66.95','2022-04-17 23:28:50','2022-04-24 23:24:19'),
('84','2','Preparando','M8H05NY4ZsXJFpsXhBCD5Lr08kB06aCqIPztcFuK','169.99','2022-04-19 11:48:31','2022-04-24 23:24:19'),
('101','2','Realizado','woEzfs7kh5TPhQcIDR3q6nXJTzJBaqmvbsb2L9pG','24.99','2022-04-21 08:37:33','2022-04-24 23:24:19'),
('134','2','Realizado','67P59nsgy4QbZTwGBxBOvGW9xVeuJhlkKbLgBaPn','51.96','2022-04-23 02:04:06','2022-04-24 23:24:19'),
('135','2','Enviado','67P59nsgy4QbZTwGBxBOvGW9xVeuJhlkKbLgBaPn','69.98','2022-04-23 02:05:34','2022-04-24 23:24:19'),
('142','2','Realizado','Hz6xYrUrwKg9sm1NAfZl79gMyNKupdVk3ijAa07b','39.98','2022-04-23 13:05:46','2022-04-24 23:24:19'),
('145','2','Pendiente','Oombze6tykpJ3eRZuXTZiThJUgC2ygky75MAPW1O','13.98','2022-04-25 08:51:50','2022-05-02 20:22:28');


--
-- TOC entry 3430 (class 0 OID 22594)
-- Dependencies: 231
-- Data for Name: detalles; Type: TABLE DATA; Schema: public; Owner: admin
--

INSERT INTO detalles (id, id_pedido, id_stock, cantidad, created_at, updated_at) VALUES
('200','101','11','1','2022-04-21 08:37:33','2022-04-21 08:37:33'),
('156','77','10','2','2022-04-17 23:28:50','2022-04-17 23:29:31'),
('157','77','11','1','2022-04-17 23:29:35','2022-04-17 23:29:35'),
('158','77','17','1','2022-04-17 23:29:39','2022-04-17 23:29:39'),
('159','77','19','1','2022-04-17 23:29:42','2022-04-17 23:29:42'),
('170','84','7','1','2022-04-19 11:48:36','2022-04-19 11:48:36'),
('236','134','9','4','2022-04-23 02:04:06','2022-04-23 02:04:06'),
('237','135','13','2','2022-04-23 02:05:34','2022-04-23 02:05:39'),
('246','142','1','2','2022-04-23 13:06:49','2022-04-23 13:06:49'),
('250','145','17','2','2022-04-25 08:51:50','2022-05-02 20:22:28');


--
-- TOC entry 3414 (class 0 OID 22480)
-- Dependencies: 215
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: admin
--



--
-- TOC entry 3409 (class 0 OID 22006)
-- Dependencies: 210
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: admin
--

INSERT INTO migrations (id, migration, batch) VALUES
('34','2014_10_12_000000_create_users_table','1'),
('35','2014_10_12_100000_create_password_resets_table','1'),
('36','2019_08_19_000000_create_failed_jobs_table','1'),
('37','2019_12_14_000001_create_personal_access_tokens_table','1'),
('38','2022_03_12_121057_create_categorias_table','1'),
('39','2022_03_12_121208_create_colores_table','1'),
('40','2022_03_12_121507_create_tallas_table','1'),
('41','2022_03_13_121243_create_productos_table','1'),
('42','2022_03_13_121315_create_stocks_table','1'),
('43','2022_04_15_092915_create_pedidos_table','1'),
('44','2022_04_16_004411_create_detalles_table','1');


--
-- TOC entry 3412 (class 0 OID 22473)
-- Dependencies: 213
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: admin
--

-- TOC entry 3424 (class 0 OID 22536)
-- Dependencies: 225
-- Data for Name: productos; Type: TABLE DATA; Schema: public; Owner: admin
--

INSERT INTO productos (id, nombre, marca, descripcion, id_categoria, rebaja, rebaja_inicio, rebaja_fin, estado, created_at, updated_at) VALUES
('15','Canasta de baloncesto B700 Pro. 2,40 a 3,05 m.','Tarmak','Canasta de baloncesto B700 PRO adecuada para jóvenes y adultos, para jugar al baloncesto en exterior.Se ajusta fácilmente y sin herramientas de 2,40 m a 3,05 m. Esta canasta de baloncesto ofrece una excelente calidad de juego gracias a la rueda de ajuste. Ajustable en 7 alturas de 2,40 m a 3,05 m. Concebida para los mates, con aro basculante.','57','','','','OK','2022-04-14 18:04:42','2022-04-14 18:04:42'),
('2','Raqueta de Tenis Artengo TR100 Adulto (265 GR)','Artengo','Nuestros equipos de diseño han creado este producto para que descubras el tenis de forma económica. Su gran tamiz aporta tolerancia, el mango ovalado es más cómodo y el cuadro de aluminio garantiza una buena resistencia. Por todo ello, la TR100 es ideal para la iniciación en el tenis.','60','','','','OK','2022-04-14 15:01:28','2022-04-14 15:01:28'),
('3','Raqueta de tenis Graphene 360 Extrem MP','Head','Raqueta concebida para jugadores y jugadoras de tenis expertos que buscan toma de efectos y estabilidad. La Head Graphene 360 Extreme MP, la raqueta de Matteo Berrettini y Richard Gasquet, es una raqueta ideal para jugadores liftadores que buscan toma de efecto, estabilidad y potencia.','60','','','','OK','2022-04-14 15:11:04','2022-04-14 15:11:04'),
('1','RAQUETA DE TENIS NIÑOS TR130 25"','Artengo','Nuestros diseñadores han desarrollado esta raqueta para jóvenes jugadores de tenis nivel iniciación, de 126 a 140 cm de estatura. Gracias a los 6 conceptos desarrollados en colaboración con múltiples entrenadores y niños, la TR130 Jr ha sido diseñada para ayudar a los niños a progresar desde los primeros intercambios.','60','','','','OK','2022-04-14 14:33:16','2022-04-14 16:26:46'),
('4','Raqueta de Tenis Babolat Pure Drive Lite Adulto','Babolat','Esta raqueta ha sido concebida para los jugadores y las jugadoras de tenis expertos que buscan manejabilidad y potencia. La nueva Babolat Pure Drive Lite está equipada con el sistema HTR (High Torsional Rigidity), una tecnología que aumenta el retorno de la energía para una sensación de potencia explosiva.Versión 270 g.','60','','','','OK','2022-04-14 16:41:24','2022-04-14 16:41:24'),
('5','Raqueta de Tenis Babolat Pure Aero Team Adulto','Babolat','Raqueta concebida para jugadores y jugadoras de tenis de nivel experto, que buscan toma de efectos y manejabilidad. La Pure Aero Team (285 g) es más ligera que la Pure Aero y por lo tanto es más manejable. El cuadro aerodinámico y la FSI Spin Technology favorecen la toma de efectos.¿Estás preparado para jugar como Nadal?','60','','','','OK','2022-04-14 16:43:26','2022-04-14 16:43:26'),
('6','Zapatillas de Tenis TS 100','Artengo','Nuestro equipo de apasionados de tenis ha diseñado este modelo de zapatilla de tenis para jugadoras nivel iniciación que practican en todo tipo de superficies. Zapatillas de tenis concebidas para dar los primeros pasos en la cancha, aportan comodidad y sujeción en todo tipo de superficies gracias a la suela específica.','60','','','','OK','2022-04-14 16:45:33','2022-04-14 16:50:06'),
('7','Zapatillas de Tenis Artengo TS530','Artengo','Nuestros ingenieros han diseñado este modelo para niños nivel perfeccionamiento, practicantes regulares de TENIS o DEPORTE EN EL COLEGIO en todas superficies. Zapatillas de tenis polivalentes para niños. ¡Ligeras, aireadas, resistentes y con buena amortiguación! Suela de caucho resistente que no deja marcas.¡Ideal para las jornadas deportivas de tus hijos!','60','','','','OK','2022-04-14 16:51:44','2022-04-14 16:51:44'),
('8','ZAPATILLAS DE TENIS ADIDAS NEO ADVANTAGE CLEAN','Adidas','Concebidas para niños de nivel iniciación o practicantes ocasionales de TENIS y deporte en el colegio, en todo tipo de superficies. Una versión moderna y cómoda de las zapatillas de tenis retro. Provistas de un exterior de piel sintética (PU) y realzada con 3 franjas perforadas, tienen un logotipo en relieve en el talón.','60','','','','OK','2022-04-14 16:56:33','2022-04-14 16:56:33'),
('9','CAJÓN PELOTAS TENIS ARTENGO TB920 18 TUBOS x4','Artengo','Nuestros diseñadores han desarrollado esta pelota de competición para jugadores de tenis que practican en terrenos duros o tierra batida. 18 tubos de 4 pelotas. Durabilidad y control. Pelota oficial del torneo de la ATP 250 Moselle Open, la TB920 se recomienda por su calidad de rebote y por su control.Nuevo empaquetado y nuevo logotipo pero pelotas idénticas.','60','15','2022-04-14','2022-06-20','OK','2022-04-14 16:58:44','2022-04-14 16:58:44'),
('10','PELOTAS DE TENIS WILSON US OPEN x4 CONTROL','Wilson','Pelota de tenis ideal para jugadores que buscan una pelota de competición duradera para jugar en terrenos duros o en tierra batida. Tubo de 4 pelotas. La pelota de tenis Wilson US OPEN ofrece un mejor rendimiento y control gracias a la incorporación de la tecnología Tex/Tech.','60','','','','OK','2022-04-14 17:00:04','2022-04-14 17:00:04'),
('11','PELOTA DE TENIS ARTENGO MEDIUM BALL','Artengo','Nuestros diseñadores han desarrollado esta pelota de tenis para acompañar la iniciación al baby tenis de los niños de 3 a 5 años. Pelota para minitenis.','60','','','','OK','2022-04-14 17:01:30','2022-04-14 17:01:30'),
('12','Polo de Tenis Artengo DRY 100','Artengo','Nuestros equipos de diseño han creado este polo para que juegues al tenis cómodamente. Este polo clásico está diseñado para jugar al tenis. Tejido ligero y transpirable para una máxima comodidad durante la práctica deportiva','60','','','','OK','2022-04-14 17:03:37','2022-04-14 17:03:37'),
('13','CALCETINES DE DEPORTE MEDIA CAÑA ADIDAS RS 160','Adidas','Para jugadores PRINCIPIANTES de tenis que buscan unos calcetines cómodos, resistentes y adaptados para la práctica. Estos calcetines de deporte son mayoritariamente de algodón, aseguran sujeción, resistencia y comodidad. Para la iniciación al tenis y también para otros deportes de raqueta. Se venden en lote de 3','60','','','','OK','2022-04-14 17:05:56','2022-04-14 17:05:56'),
('14','Gorra de Tenis Artengo TC 900 T58','Artengo','Para jugadores de tenis que buscan una gorra ligera, cómoda y muy técnica para absorber el sudor y bloquearlo durante la práctica. Esta gorra de deporte Artengo TC 900 protege la cara del sol durante el juego, sin molestarte, absorbe y bloquea el sudor de la frente y de la visera para que no penetre en los ojos.','60','','','','OK','2022-04-14 17:07:50','2022-04-14 17:07:50');
;


--
-- TOC entry 3422 (class 0 OID 22529)
-- Dependencies: 223
-- Data for Name: tallas; Type: TABLE DATA; Schema: public; Owner: admin
--

INSERT INTO tallas (id, talla, created_at, updated_at) VALUES
('1','Talla única','',''),
('2','XXS','',''),
('3','XS','',''),
('4','S','',''),
('5','M','',''),
('6','L','',''),
('7','XL','',''),
('8','XXL','',''),
('9','35','',''),
('10','36','',''),
('11','37','',''),
('12','38','',''),
('13','39','',''),
('14','40','',''),
('15','41','',''),
('16','42','',''),
('17','43','',''),
('18','44','',''),
('19','45','',''),
('20','46','',''),
('21','47','',''),
('22','48','',''),
('23','49','',''),
('24','50','','');



--
-- TOC entry 3426 (class 0 OID 22552)
-- Dependencies: 227
-- Data for Name: stock; Type: TABLE DATA; Schema: public; Owner: admin
--
INSERT INTO stock (id, id_producto, id_talla, id_color, sexo, precio, stock, ventas, foto1, foto2, foto3, foto4, foto5, created_at, updated_at) VALUES
('20','15','1','2','','329.99','50','41','foto1.jpg','foto2.jpg','foto3.jpg','foto4.jpg','foto5.jpg','2022-04-14 18:06:35','2022-04-14 18:06:35'),
('6','3','1','5','','19.99','50','80','foto1.jpg','foto2.jpg','foto3.jpg','fotoextra.jpg','','2022-04-14 15:53:14','2022-04-14 16:32:36'),
('8','5','1','5','','169.99','25','1600','foto1.jpg','foto2.jpg','','','','2022-04-14 16:44:08','2022-04-14 16:44:08'),
('10','6','15','2','M','12.99','50','90','foto1.jpg','foto2.jpg','foto3.jpg','foto4.jpg','foto5.jpg','2022-04-14 16:49:26','2022-04-14 16:49:26'),
('12','7','12','2','','24.99','30','50','foto1.jpg','foto2.jpg','foto3.jpg','foto4.jpg','foto5.jpg','2022-04-14 16:54:29','2022-04-14 16:54:29'),
('14','9','1','5','','89.99','200','77','foto.jpg','','','','','2022-04-14 16:59:22','2022-04-14 16:59:22'),
('15','10','1','5','','5.99','300','53','foto.jpg','','','','','2022-04-14 17:00:35','2022-04-14 17:00:35'),
('17','12','5','1','','6.99','120','56','foto1.jpg','foto2.jpg','foto3.jpg','foto4.jpg','foto5.jpg','2022-04-14 17:04:31','2022-04-14 17:04:31'),
('18','13','1','1','','4.99','200','85','FOTO1.jpg','FOTO2.jpg','FOTO3.jpg','FOTO4.jpg','','2022-04-14 17:06:39','2022-04-14 17:06:39'),
('19','14','1','2','','8.99','60','12','foto1.jpg','foto2.jpg','foto3.jpg','foto4.jpg','foto5.jpg','2022-04-14 17:08:35','2022-04-14 17:08:35'),
('11','7','12','3','','24.99','59','60','foto1.jpg','foto.jpg','foto2.jpg','foto4.jpg','foto5.jpg','2022-04-14 16:52:56','2022-04-21 14:18:02'),
('9','6','10','1','F','12.99','49','20','foto1.jpg','foto2.jpg','foto3.jpg','foto4.jpg','foto5.jpg','2022-04-14 16:46:19','2022-04-23 01:36:45'),
('16','11','1','5','','7.99','404','35','foto1.jpg','foto2.jpg','foto3.jpg','foto4.jpg','','2022-04-14 17:02:11','2022-04-23 01:38:14'),
('2','2','1','2','','9.99','87','20','foto1.jpg','foto2.jpg','foto3.jpg','foto4.jpg','foto5.jpg','2022-04-14 15:02:24','2022-04-23 01:55:24'),
('13','8','12','1','','34.99','142','40','foto1.jpg','foto2.jpg','foto3.jpg','foto4.jpg','foto5.jpg','2022-04-14 16:57:18','2022-04-23 02:05:51'),
('7','4','1','3','','169.99','2','50','foto1.jpg','foto2.jpg','foto3.jpg','','','2022-04-14 16:42:13','2022-04-22 11:45:26'),
('1','1','1','5','','19.99','42','10','foto1.jpg','foto2.jpg','foto3.jpg','foto4.jpg','foto5.jpg','2022-04-14 14:52:23','2022-04-23 13:07:27');

