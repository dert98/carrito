-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-03-2024 a las 21:13:04
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Relojes inteligentes'),
(2, 'Parlantes Bluetooth'),
(3, 'Auricular Inalámbrico'),
(4, 'Auriculares (Estilos populares)'),
(5, 'Fundas Celulares');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `categoria_id`, `imagen`) VALUES
(1, 'Reloj inteligente S300ultar', 'S300ultar\r\nel reloj\r\nCorrea\r\ncaja de empaque\r\nmanuales\r\ncable de energía', 120.00, 1, 'p_1/1.webp'),
(2, 'tcl c34500', 'jkh lkjhlh lk', 9999.00, 4, 'p_1/4.webp'),
(3, 'Reloj inteligente S9 max', 'reloj inteligente\r\nS9 max\r\n\r\nel reloj\r\nCorrea\r\ncaja de empaque\r\nmanuales\r\ncable de energía\r\nCarga inalámbrica, batería de buena calidad, correa de reloj única', 80.00, 1, 'p_2/2.webp'),
(7, 'Reloj inteligente S9PRO', 'Reloj inteligente S9PRO nuevo set dos en uno con Watch9 + auriculares de 5ª generación + carga inalámbrica, pantalla grande de alta definición 2.3, correas con doble hebilla', 90.00, 1, 'p_1/1.webp'),
(8, 'Xiaomi Redmi Note11Pro 4G', 'Redmi Note11Pro 4G\r\nFundas 1.8mm TPU imitacion de silicona liquida', 25.00, 5, 'p_1/5.webp'),
(9, 'Teclado mecánico Corsair K70', 'Teclado mecánico Corsair K70 con retroiluminación RGB y switches Cherry MX Brown', 149.99, 3, 'p_2/2.webp'),
(10, 'producto modificar categoria', 'Mouse inalámbrico Logitech MX Master 3 con sensor de alta precisión y botón de desplazamiento rápido', 99.99, 5, 'p_1/4.webp'),
(11, 'Disco duro externo Samsung Portable SSD T5', 'Disco duro externo Samsung Portable SSD T5 con capacidad de 1TB y conexión USB-C', 149.99, 4, 'p_1/4.webp'),
(12, 'Samsung A03 164 (universal)', 'Samsung A03 164 (universal)\r\nFundas 1.8mm TPU imitacion de silicona liquida', 25.00, 5, ''),
(13, 'iPhone 12 Pro', 'iPhone 12 Pro\r\nFundas 1.8mm TPU imitacion de silicona liquida', 25.00, 5, '/img/p1/WhatsApp Image 2024-02-06 at 12.12.21 PM.jpeg'),
(14, 'Nuevo Z87Ultra', 'Reloj inteligente\r\nNuevo Z87Ultra\r\nUltra 2 agrega un nuevo dial de zoom infinito, gestos para contestar llamadas y apagar el despertador. La última esfera de escaneo de radar, se enviaron tres pares de correas de reloj (correa de acero ➕ silicona trenzada ➕ correa marina)asas', 120.00, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`) VALUES
(1, 'dert', '123456');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
