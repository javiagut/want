-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 20-07-2022 a las 13:57:41
-- Versión del servidor: 10.5.16-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u630870402_want`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) NOT NULL,
  `categoria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cat_padre` bigint(20) DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `id_cat_padre`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Electrónica', NULL, 'OK', '2022-07-20 13:56:48', '0000-00-00 00:00:00'),
(3, 'Audio y TV', 1, 'OK', '0000-00-00 00:00:00', '2022-03-03 17:24:13'),
(4, 'Iluminación', NULL, 'OK', '2022-07-20 13:56:57', '0000-00-00 00:00:00'),
(5, 'Libros', NULL, 'OK', '2022-07-20 13:56:59', '2022-03-01 21:04:00'),
(6, 'Películas', NULL, 'OK', '2022-07-20 13:57:06', '0000-00-00 00:00:00'),
(7, 'Música', NULL, 'OK', '2022-07-20 13:57:13', '0000-00-00 00:00:00'),
(9, 'Hogar y Jardín', NULL, 'OK', '2022-07-20 13:57:14', '2022-03-01 22:27:14'),
(10, 'Joyería', NULL, 'OK', '2022-07-20 13:57:15', '0000-00-00 00:00:00'),
(11, 'Juguetes y Juegos', NULL, 'OK', '2022-07-20 13:57:17', '0000-00-00 00:00:00'),
(12, 'Oficina y Papelería', NULL, 'OK', '2022-07-20 13:57:11', '2022-03-01 22:29:06'),
(13, 'Productos para Mascotas', NULL, 'OK', '2022-07-20 13:57:10', '0000-00-00 00:00:00'),
(15, 'Consolas y Videojuegos', NULL, 'OK', '2022-07-20 13:57:09', '2022-03-01 22:40:53'),
(16, 'Moda', NULL, 'OK', '2022-07-20 13:57:08', '0000-00-00 00:00:00'),
(17, 'Zapatos y Complementos', 16, 'OK', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'CD', 7, 'OK', '2022-03-01 12:41:29', '2022-03-03 17:24:28'),
(52, 'Sudaderas', 16, 'OK', '2022-03-01 13:06:24', '2022-03-01 13:06:24'),
(57, 'Baloncesto', 65, 'OK', '2022-03-01 18:13:55', '2022-03-03 17:24:17'),
(58, 'Fútbol', 65, 'OK', '2022-03-01 18:14:24', '2022-03-02 00:41:55'),
(60, 'Tenis', 65, 'OK', '2022-03-01 18:22:39', '2022-03-02 00:42:08'),
(61, 'Ping Pong', 65, 'OK', '2022-03-01 19:43:29', '2022-03-02 00:42:02'),
(65, 'Deportes', NULL, 'OK', '2022-07-20 13:57:19', '2022-03-02 00:41:04'),
(66, 'Informática', 1, 'OK', '2022-03-02 00:42:28', '2022-03-02 00:42:28'),
(67, 'Ordenadores Portátiles', 66, 'OK', '2022-03-02 00:42:35', '2022-03-03 17:23:08'),
(68, 'Cableado', 1, 'OK', '2022-03-02 00:51:22', '2022-03-03 17:24:19'),
(69, 'PlayStation', 72, 'OK', '2022-03-02 12:19:16', '2022-03-02 12:23:57'),
(70, 'Xbox', 72, 'OK', '2022-03-02 12:19:33', '2022-03-02 12:24:05'),
(72, 'Consolas', 15, 'OK', '2022-03-02 12:20:41', '2022-03-03 17:24:31'),
(73, 'Videojuegos', 15, 'OK', '2022-03-02 12:20:48', '2022-03-02 12:20:48'),
(74, 'Televisores', 3, 'OK', '2022-03-02 13:43:00', '2022-03-02 13:43:06'),
(79, 'Oro', 10, 'OK', '2022-04-14 14:22:38', '2022-04-14 14:22:38'),
(80, 'Plata', 10, 'OK', '2022-04-14 14:22:45', '2022-04-14 14:22:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacto1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacto2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `rol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido1`, `apellido2`, `email`, `contacto1`, `contacto2`, `nacimiento`, `rol`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@admin.com', '123456789', '987654321', '2020-03-10', 'admin', '0000-00-00 00:00:00', '$2y$10$ofYkrjGKsVAqoeP21We.reUsUDmUFsZ7eusry7lAPcA66kmcHa.7u', '', '2022-04-11 20:23:28', '2022-04-11 20:23:28'),
(2, 'Javier', 'Agut', 'Ruiz', 'javi@gmail.com', '695134812', '933812742', '2000-12-12', 'cliente', '0000-00-00 00:00:00', '$2y$10$yu.MxB5Ioi2ApsCiWe67Ru5.jwcZ22NIyBET4CLKp/ewIlxAAwHhS', '', '2022-04-15 14:23:22', '2022-04-15 16:28:57'),
(3, 'Pepe', 'Gómez', 'Ruiz', 'pepe@gmail.com', '695134812', '878545656', '1995-04-04', 'cliente', '0000-00-00 00:00:00', '$2y$10$cHEVNePzJB.mJXgx3FwWfu6dodnCEbGRZC.yr6u3ttxPs9Nkpqx12', '', '2022-04-15 14:35:27', '2022-04-15 14:35:27'),
(4, 'rais', 'millan', 'pacheco', 'rais-millan@hotmail.com', '635475637', NULL, '1994-12-14', 'cliente', '2022-07-20 12:53:46', '$2y$10$9iKnoDRLvvl7wmzu0Uag3OgC5VkXGCV6IedvnC6J5Lzda3J7/IMKG', NULL, '2022-07-20 14:50:52', '2022-07-20 14:50:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `id` bigint(20) NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`id`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Blanco', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Negro', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Azul', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Rojo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Amarillo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Rosa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Lila', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Verde', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Naranja', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Marrón', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles`
--

CREATE TABLE `detalles` (
  `id` bigint(20) NOT NULL,
  `id_pedido` bigint(20) NOT NULL,
  `id_stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalles`
--

INSERT INTO `detalles` (`id`, `id_pedido`, `id_stock`, `cantidad`, `created_at`, `updated_at`) VALUES
(156, 77, '10', 2, '2022-04-17 23:28:50', '2022-04-17 23:29:31'),
(157, 77, '11', 1, '2022-04-17 23:29:35', '2022-04-17 23:29:35'),
(158, 77, '17', 1, '2022-04-17 23:29:39', '2022-04-17 23:29:39'),
(159, 77, '19', 1, '2022-04-17 23:29:42', '2022-04-17 23:29:42'),
(170, 84, '7', 1, '2022-04-19 11:48:36', '2022-04-19 11:48:36'),
(200, 101, '11', 1, '2022-04-21 08:37:33', '2022-04-21 08:37:33'),
(236, 134, '9', 4, '2022-04-23 02:04:06', '2022-04-23 02:04:06'),
(237, 135, '13', 2, '2022-04-23 02:05:34', '2022-04-23 02:05:39'),
(246, 142, '1', 2, '2022-04-23 13:06:49', '2022-04-23 13:06:49'),
(250, 145, '17', 2, '2022-04-25 08:51:50', '2022-05-02 20:22:28'),
(253, 148, '9', 20, '2022-07-20 14:49:25', '2022-07-20 14:49:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(11) NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(34, '2014_10_12_000000_create_users_table', 1),
(35, '2014_10_12_100000_create_password_resets_table', 1),
(36, '2019_08_19_000000_create_failed_jobs_table', 1),
(37, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(38, '2022_03_12_121057_create_categorias_table', 1),
(39, '2022_03_12_121208_create_colores_table', 1),
(40, '2022_03_12_121507_create_tallas_table', 1),
(41, '2022_03_13_121243_create_productos_table', 1),
(42, '2022_03_13_121315_create_stocks_table', 1),
(43, '2022_04_15_092915_create_pedidos_table', 1),
(44, '2022_04_16_004411_create_detalles_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` bigint(20) NOT NULL,
  `id_cliente` bigint(20) DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sesion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_cliente`, `estado`, `sesion`, `total`, `created_at`, `updated_at`) VALUES
(77, 2, 'Llegando', 'qDy2WJBBxChbyHRQfUxPavueA8r1Z3SfJNGJVd79', 66.95, '2022-07-20 12:53:06', '2022-07-20 14:53:06'),
(84, 2, 'Realizado', 'M8H05NY4ZsXJFpsXhBCD5Lr08kB06aCqIPztcFuK', 169.99, '2022-07-20 12:53:06', '2022-07-20 14:53:06'),
(101, 2, 'Realizado', 'woEzfs7kh5TPhQcIDR3q6nXJTzJBaqmvbsb2L9pG', 24.99, '2022-07-20 12:53:06', '2022-07-20 14:53:06'),
(134, 2, 'Realizado', '67P59nsgy4QbZTwGBxBOvGW9xVeuJhlkKbLgBaPn', 51.96, '2022-07-20 12:53:06', '2022-07-20 14:53:06'),
(135, 2, 'Enviado', '67P59nsgy4QbZTwGBxBOvGW9xVeuJhlkKbLgBaPn', 69.98, '2022-07-20 12:53:06', '2022-07-20 14:53:06'),
(142, 2, 'Realizado', 'Hz6xYrUrwKg9sm1NAfZl79gMyNKupdVk3ijAa07b', 39.98, '2022-07-20 12:53:06', '2022-07-20 14:53:06'),
(145, 2, 'Pendiente', 'Oombze6tykpJ3eRZuXTZiThJUgC2ygky75MAPW1O', 13.98, '2022-04-25 08:51:50', '2022-05-02 20:22:28'),
(148, NULL, 'Pendiente', 'kmNPb3q666HA6sOuTlISdrKlZyH6aJuoN9IuiRa5', 259.8, '2022-07-20 12:49:25', '2022-07-20 14:49:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_categoria` bigint(20) NOT NULL,
  `rebaja` int(11) DEFAULT NULL,
  `rebaja_inicio` date DEFAULT NULL,
  `rebaja_fin` date DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `marca`, `descripcion`, `id_categoria`, `rebaja`, `rebaja_inicio`, `rebaja_fin`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'RAQUETA DE TENIS NIÑOS TR130 25\"', 'Artengo', 'Nuestros diseñadores han desarrollado esta raqueta para jóvenes jugadores de tenis nivel iniciación, de 126 a 140 cm de estatura.\\Gracias a los 6 conceptos desarrollados en colaboración con múltiples entrenadores y niños, la TR130 Jr ha sido diseñada para ayudar a los niños a progresar desde los primeros intercambios.', 60, 0, '0000-00-00', '0000-00-00', 'OK', '2022-04-14 14:33:16', '2022-04-14 16:26:46'),
(2, 'Raqueta de Tenis Artengo TR100 Adulto (265 GR)', 'Artengo', 'Nuestros equipos de diseño han creado este producto para que descubras el tenis de forma económica.\\Su gran tamiz aporta tolerancia, el mango ovalado es más cómodo y el cuadro de aluminio garantiza una buena resistencia. Por todo ello, la TR100 es ideal para la iniciación en el tenis.', 60, 0, '0000-00-00', '0000-00-00', 'OK', '2022-04-14 15:01:28', '2022-04-14 15:01:28'),
(3, 'Raqueta de tenis Graphene 360 Extrem MP', 'Head', 'Raqueta concebida para jugadores y jugadoras de tenis expertos que buscan toma de efectos y estabilidad.\\La Head Graphene 360 Extreme MP, la raqueta de Matteo Berrettini y Richard Gasquet, es una raqueta ideal para jugadores liftadores que buscan toma de efecto, estabilidad y potencia.', 60, 0, '0000-00-00', '0000-00-00', 'OK', '2022-04-14 15:11:04', '2022-04-14 15:11:04'),
(4, 'Raqueta de Tenis Babolat Pure Drive Lite Adulto', 'Babolat', 'Esta raqueta ha sido concebida para los jugadores y las jugadoras de tenis expertos que buscan manejabilidad y potencia.\\La nueva Babolat Pure Drive Lite está equipada con el sistema HTR (High Torsional Rigidity), una tecnología que aumenta el retorno de la energía para una sensación de potencia explosiva.Versión 270 g.', 60, 0, '0000-00-00', '0000-00-00', 'OK', '2022-04-14 16:41:24', '2022-04-14 16:41:24'),
(5, 'Raqueta de Tenis Babolat Pure Aero Team Adulto', 'Babolat', 'Raqueta concebida para jugadores y jugadoras de tenis de nivel experto, que buscan toma de efectos y manejabilidad.\\La Pure Aero Team (285 g) es más ligera que la Pure Aero y por lo tanto es más manejable. El cuadro aerodinámico y la FSI Spin Technology favorecen la toma de efectos.¿Estás preparado para jugar como Nadal?', 60, 0, '0000-00-00', '0000-00-00', 'OK', '2022-04-14 16:43:26', '2022-04-14 16:43:26'),
(6, 'Zapatillas de Tenis TS 100', 'Artengo', 'Nuestro equipo de apasionados de tenis ha diseñado este modelo de zapatilla de tenis para jugadoras nivel iniciación que practican en todo tipo de superficies.\\Zapatillas de tenis concebidas para dar los primeros pasos en la cancha, aportan comodidad y sujeción en todo tipo de superficies gracias a la suela específica.', 60, 0, '0000-00-00', '0000-00-00', 'OK', '2022-04-14 16:45:33', '2022-04-14 16:50:06'),
(7, 'Zapatillas de Tenis Artengo TS530', 'Artengo', 'Nuestros ingenieros han diseñado este modelo para niños nivel perfeccionamiento, practicantes regulares de TENIS o DEPORTE EN EL COLEGIO en todas superficies.\\Zapatillas de tenis polivalentes para niños. ¡Ligeras, aireadas, resistentes y con buena amortiguación! Suela de caucho resistente que no deja marcas.¡Ideal para las jornadas deportivas de tus hijos!', 60, 0, '0000-00-00', '0000-00-00', 'OK', '2022-04-14 16:51:44', '2022-04-14 16:51:44'),
(8, 'ZAPATILLAS DE TENIS ADIDAS NEO ADVANTAGE CLEAN', 'Adidas', 'Concebidas para niños de nivel iniciación o practicantes ocasionales de TENIS y deporte en el colegio, en todo tipo de superficies.\\Una versión moderna y cómoda de las zapatillas de tenis retro. Provistas de un exterior de piel sintética (PU) y realzada con 3 franjas perforadas, tienen un logotipo en relieve en el talón.', 60, 0, '0000-00-00', '0000-00-00', 'OK', '2022-04-14 16:56:33', '2022-04-14 16:56:33'),
(9, 'CAJÓN PELOTAS TENIS ARTENGO TB920 18 TUBOS x4', 'Artengo', 'Nuestros diseñadores han desarrollado esta pelota de competición para jugadores de tenis que practican en terrenos duros o tierra batida. 18 tubos de 4 pelotas.\\Durabilidad y control. Pelota oficial del torneo de la ATP 250 Moselle Open, la TB920 se recomienda por su calidad de rebote y por su control.Nuevo empaquetado y nuevo logotipo pero pelotas idénticas.', 60, 15, '2022-04-14', '2022-06-20', 'OK', '2022-04-14 16:58:44', '2022-04-14 16:58:44'),
(10, 'PELOTAS DE TENIS WILSON US OPEN x4 CONTROL', 'Wilson', 'Pelota de tenis ideal para jugadores que buscan una pelota de competición duradera para jugar en terrenos duros o en tierra batida. Tubo de 4 pelotas.\\La pelota de tenis Wilson US OPEN ofrece un mejor rendimiento y control gracias a la incorporación de la tecnología Tex/Tech.', 60, 0, '0000-00-00', '0000-00-00', 'OK', '2022-04-14 17:00:04', '2022-04-14 17:00:04'),
(11, 'PELOTA DE TENIS ARTENGO MEDIUM BALL', 'Artengo', 'Nuestros diseñadores han desarrollado esta pelota de tenis para acompañar la iniciación al baby tenis de los niños de 3 a 5 años.\\Pelota para minitenis.', 60, 0, '0000-00-00', '0000-00-00', 'OK', '2022-04-14 17:01:30', '2022-04-14 17:01:30'),
(12, 'Polo de Tenis Artengo DRY 100', 'Artengo', 'Nuestros equipos de diseño han creado este polo para que juegues al tenis cómodamente.\\Este polo clásico está diseñado para jugar al tenis. Tejido ligero y transpirable para una máxima comodidad durante la práctica deportiva', 60, 0, '0000-00-00', '0000-00-00', 'OK', '2022-04-14 17:03:37', '2022-04-14 17:03:37'),
(13, 'CALCETINES DE DEPORTE MEDIA CAÑA ADIDAS RS 160', 'Adidas', 'Para jugadores PRINCIPIANTES de tenis que buscan unos calcetines cómodos, resistentes y adaptados para la práctica.\\Estos calcetines de deporte son mayoritariamente de algodón, aseguran sujeción, resistencia y comodidad. Para la iniciación al tenis y también para otros deportes de raqueta. Se venden en lote de 3', 60, 0, '0000-00-00', '0000-00-00', 'OK', '2022-04-14 17:05:56', '2022-04-14 17:05:56'),
(14, 'Gorra de Tenis Artengo TC 900 T58', 'Artengo', 'Para jugadores de tenis que buscan una gorra ligera, cómoda y muy técnica para absorber el sudor y bloquearlo durante la práctica.\\Esta gorra de deporte Artengo TC 900 protege la cara del sol durante el juego, sin molestarte, absorbe y bloquea el sudor de la frente y de la visera para que no penetre en los ojos.', 60, 0, '0000-00-00', '0000-00-00', 'OK', '2022-04-14 17:07:50', '2022-04-14 17:07:50'),
(15, 'Canasta de baloncesto B700 Pro. 2,40 a 3,05 m.', 'Tarmak', 'Canasta de baloncesto B700 PRO adecuada para jóvenes y adultos, para jugar al baloncesto en exterior.Se ajusta fácilmente y sin herramientas de 2,40 m a 3,05 m.\\Esta canasta de baloncesto ofrece una excelente calidad de juego gracias a la rueda de ajuste. Ajustable en 7 alturas de 2,40 m a 3,05 m. Concebida para los mates, con aro basculante.', 57, 0, '0000-00-00', '0000-00-00', 'OK', '2022-04-14 18:04:42', '2022-04-14 18:04:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `id` bigint(20) NOT NULL,
  `id_producto` bigint(20) NOT NULL,
  `id_talla` bigint(20) NOT NULL,
  `id_color` bigint(20) NOT NULL,
  `sexo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio` double NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `ventas` int(11) DEFAULT NULL,
  `foto1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`id`, `id_producto`, `id_talla`, `id_color`, `sexo`, `precio`, `stock`, `ventas`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, '', 19.99, 42, 10, 'foto1.jpg', 'foto2.jpg', 'foto3.jpg', 'foto4.jpg', 'foto5.jpg', '2022-04-14 14:52:23', '2022-04-23 13:07:27'),
(2, 2, 1, 2, '', 9.99, 87, 20, 'foto1.jpg', 'foto2.jpg', 'foto3.jpg', 'foto4.jpg', 'foto5.jpg', '2022-04-14 15:02:24', '2022-04-23 01:55:24'),
(6, 3, 1, 5, '', 19.99, 50, 80, 'foto1.jpg', 'foto2.jpg', 'foto3.jpg', 'fotoextra.jpg', '', '2022-04-14 15:53:14', '2022-04-14 16:32:36'),
(7, 4, 1, 3, '', 169.99, 2, 50, 'foto1.jpg', 'foto2.jpg', 'foto3.jpg', '', '', '2022-04-14 16:42:13', '2022-04-22 11:45:26'),
(8, 5, 1, 5, '', 169.99, 25, 1600, 'foto1.jpg', 'foto2.jpg', '', '', '', '2022-04-14 16:44:08', '2022-04-14 16:44:08'),
(9, 6, 10, 1, 'F', 12.99, 49, 20, 'foto1.jpg', 'foto2.jpg', 'foto3.jpg', 'foto4.jpg', 'foto5.jpg', '2022-04-14 16:46:19', '2022-04-23 01:36:45'),
(10, 6, 15, 2, 'M', 12.99, 50, 90, 'foto1.jpg', 'foto2.jpg', 'foto3.jpg', 'foto4.jpg', 'foto5.jpg', '2022-04-14 16:49:26', '2022-04-14 16:49:26'),
(11, 7, 12, 3, '', 24.99, 59, 60, 'foto1.jpg', 'foto.jpg', 'foto2.jpg', 'foto4.jpg', 'foto5.jpg', '2022-04-14 16:52:56', '2022-04-21 14:18:02'),
(12, 7, 12, 2, '', 24.99, 30, 50, 'foto1.jpg', 'foto2.jpg', 'foto3.jpg', 'foto4.jpg', 'foto5.jpg', '2022-04-14 16:54:29', '2022-04-14 16:54:29'),
(13, 8, 12, 1, '', 34.99, 142, 40, 'foto1.jpg', 'foto2.jpg', 'foto3.jpg', 'foto4.jpg', 'foto5.jpg', '2022-04-14 16:57:18', '2022-04-23 02:05:51'),
(14, 9, 1, 5, '', 89.99, 200, 77, 'foto.jpg', '', '', '', '', '2022-04-14 16:59:22', '2022-04-14 16:59:22'),
(15, 10, 1, 5, '', 5.99, 300, 53, 'foto.jpg', '', '', '', '', '2022-04-14 17:00:35', '2022-04-14 17:00:35'),
(16, 11, 1, 5, '', 7.99, 404, 35, 'foto1.jpg', 'foto2.jpg', 'foto3.jpg', 'foto4.jpg', '', '2022-04-14 17:02:11', '2022-04-23 01:38:14'),
(17, 12, 5, 1, '', 6.99, 120, 56, 'foto1.jpg', 'foto2.jpg', 'foto3.jpg', 'foto4.jpg', 'foto5.jpg', '2022-04-14 17:04:31', '2022-04-14 17:04:31'),
(18, 13, 1, 1, '', 4.99, 200, 85, 'FOTO1.jpg', 'FOTO2.jpg', 'FOTO3.jpg', 'FOTO4.jpg', '', '2022-04-14 17:06:39', '2022-04-14 17:06:39'),
(19, 14, 1, 2, '', 8.99, 60, 12, 'foto1.jpg', 'foto2.jpg', 'foto3.jpg', 'foto4.jpg', 'foto5.jpg', '2022-04-14 17:08:35', '2022-04-14 17:08:35'),
(20, 15, 1, 2, '', 329.99, 50, 41, 'foto1.jpg', 'foto2.jpg', 'foto3.jpg', 'foto4.jpg', 'foto5.jpg', '2022-04-14 18:06:35', '2022-04-14 18:06:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas`
--

CREATE TABLE `tallas` (
  `id` bigint(20) NOT NULL,
  `talla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tallas`
--

INSERT INTO `tallas` (`id`, `talla`, `created_at`, `updated_at`) VALUES
(1, 'Talla única', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'XXS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'XS', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'S', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'M', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'L', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'XL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'XXL', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '35', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '36', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, '39', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '40', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '41', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, '42', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, '43', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, '44', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, '45', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, '46', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, '47', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, '48', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, '49', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, '50', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalles`
--
ALTER TABLE `detalles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tallas`
--
ALTER TABLE `tallas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `detalles`
--
ALTER TABLE `detalles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tallas`
--
ALTER TABLE `tallas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
