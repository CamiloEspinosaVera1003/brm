--
-- Base de datos: `project`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `lote` varchar(100) NOT NULL,
  `cantidad_disponible` numeric(20,0) NOT NULL,
  `precio` numeric(20,0) NOT NULL,
  `fecha_vencimiento` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `facturas` (
  `id` int(11) NOT NULL,
  `cc_cliente` varchar(100) NOT NULL,
  `nombre_cliente` varchar(100) NOT NULL,
  `idproducto` numeric(20,0) NOT NULL,
  `cantidad` numeric(20,0) NOT NULL,
  `valor_total` numeric(20,0) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- datos automaticos para la tabla productos
--

INSERT INTO `productos` (`id`, `producto`, `lote`, `cantidad_disponible`, `precio`, `fecha_vencimiento`) VALUES
(1, 'Xiaomi poco f3', '1000', 10, 1150000 , '2021-07-14 20:16:56'),
(2, 'Samsung s30 256gb', '8005', 13, 2540000 ,'2021-07-14 20:46:15'),
(3, 'Iphone 12 256gb ', '4030', 25, 4570000, '2021-07-14 14:33:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `usuarios` (`id`, `login`, `password`, `nombre`) VALUES
(1, 'BRM', '4b67deeb9aba04a5b54632ad19934f26', 'BRM');

--
-- Indices de la tabla `product`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);


--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;


--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

