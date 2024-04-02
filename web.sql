-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-04-2024 a las 20:22:38
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
(2, 'Auricular Inalámbrico M28', 'Chip: Jerry 6983\r\nVersión de bluetooth: V5.1\r\nCapacidad de la batería de los auriculares：50mAh\r\nCapacidad de la batería de la caja de almacenamiento: 2000mAh\r\nDistancia de transmisión:>10m \r\nTiempo de llamada: 4H                                                                Tiempo de reproducción: 4-5H                                                     Tiempo de carga: 1-2h\r\nModo de funcionamiento: Táctil\r\nAccesorios: Cable, Tapa del oído, Instrucciones', 110.00, 3, 'p_1/4.webp'),
(3, 'Reloj inteligente S9 max', 'reloj inteligente\r\nS9 max\r\n\r\nel reloj\r\nCorrea\r\ncaja de empaque\r\nmanuales\r\ncable de energía\r\nCarga inalámbrica, batería de buena calidad, correa de reloj única', 80.00, 1, 'p_2/2.webp'),
(7, 'Reloj inteligente S9PRO', 'Reloj inteligente S9PRO nuevo set dos en uno con Watch9 + auriculares de 5ª generación + carga inalámbrica, pantalla grande de alta definición 2.3, correas con doble hebilla', 90.00, 1, 'p_1/1.webp'),
(8, 'Funda Xiaomi Redmi Note11Pro 4G', 'Redmi Note11Pro 4G\r\nFundas 1.8mm TPU imitacion de silicona liquida', 25.00, 1, 'p_1/5.webp'),
(9, 'Parlantes Bluetooth', 'colores negro/rojo/azul/verde\r\nSoporte bluetooth, TF  card , USB, FM, se puede conectar\r\nmaterial del producto: Plástico ABS\r\nespecificaciones bluetooth: Bluetooth 5.0 Jerry\r\nDistancia de transmisión: 10M\r\nEspecificaciones de los altavoces: 52MM*2   4ohmios3vatios*2\r\nespecificación de potencia: 3W*2\r\nespecificación de la batería: 1100mAh 18650\r\ntiempo de funcionamiento: 2-3H', 80.00, 2, 'p_2/2.webp'),
(10, 'Auricular Inalámbrico M32', 'Chip: Jerry 6963\r\nVersión de bluetooth: V5.1\r\nBocina: 8MM\r\nCapacidad de la batería de la caja de almacenamiento: 800MAH\r\nDistancia de transmisión:>10m \r\nTiempo de llamada: 4H                                                                 Tiempo de reproducción: Unos 6H\r\nTiempo de carga: 1-2h\r\nModo de funcionamiento: Táctil\r\nAccesorios: Cable, Tapa del oído, Instrucciones\r\nFunción: interruptor de modo dual, interruptor hacia arriba y hacia abajo, adición de volumen y sustracción, llamada/rechazo/reproducción/pausa. Asistente de voz de convocatoria', 100.00, 3, 'p_1/4.webp'),
(11, 'Parlante (bluetooth)', 'negro/caqui/rosa/azul\r\nAdmite Bluetooth,  tarjeta TF,  AUX USB,  micrófono\r\nMaterial del producto:  ABS,  malla de hierro.\r\nEspecificación de dientes azules:  Bluetooth 5.3 Jerry\r\nDistancia de transmisión:  10M\r\nEspecificación del altavoz:  57 mm 4Ω5W\r\nEspecificación del amplificador de potencia:  5W * 1\r\nEspecificación de la batería:  1200 mAh\r\nTiempo de funcionamiento:  2-3H', 90.00, 2, 'p_1/4.webp'),
(12, 'Funda Samsung A03 164 (universal)', 'Samsung A03 164 (universal)\r\nFundas 1.8mm TPU imitacion de silicona liquida', 25.00, 1, ''),
(13, 'Funda iPhone 12 Pro', 'iPhone 12 Pro\r\nFundas 1.8mm TPU imitacion de silicona liquida', 25.00, 1, '/img/p1/WhatsApp Image 2024-02-06 at 12.12.21 PM.jpeg'),
(14, 'Reloj Inteligente Nuevo Z87Ultra', 'Reloj inteligente\r\nNuevo Z87Ultra\r\nUltra 2 agrega un nuevo dial de zoom infinito, gestos para contestar llamadas y apagar el despertador. La última esfera de escaneo de radar, se enviaron tres pares de correas de reloj (correa de acero ➕ silicona trenzada ➕ correa marina)asas', 120.00, 1, ''),
(16, 'Auricular Popular JR01', 'Chip: Jerry\r\nVersión Bluetooth: 5.3\r\nCuerno: φ8mm\r\nBatería de auriculares: 30mah\r\nBatería de almacenamiento: 300mah\r\nTiempo de espera de apagado: alrededor de 180 días\r\nTiempo de música: 5 horas\r\nTiempo de conversación: 5 horas\r\nTiempo de carga de los auriculares: unos 40 minutos\r\nTiempo de carga de la caja de carga: aproximadamente 1 hora\r\nDistancia de comunicación: 10M\r\nInterfaz de carga: Tipo-C\r\nVoltaje de carga: DC5V/1A', 90.00, 4, NULL),
(17, 'Auricular popular JR03', 'Microprocesador: Jerry 6973D4\r\nVersión Bluetooth: 5.3\r\nCuerno: anillo de cobre real de φ13 mm\r\nBatería de auriculares: 25mah\r\nBatería de almacenamiento: 200mah\r\nTiempo de espera de apagado: alrededor de 180 días\r\nTiempo de música: 3-4 horas\r\nTiempo de conversación: 3-4 horas\r\nTiempo de carga de los auriculares: alrededor de 1 minuto\r\nTiempo de carga del contenedor de carga: alrededor de 1,5 horas\r\nDistancia de comunicación: 10M\r\nInterfaz de carga: Tipo-C\r\nVoltaje de carga: DC5V/1A\r\nColor: negro, blanco', 110.00, 4, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
