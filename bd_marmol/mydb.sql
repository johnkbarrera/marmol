-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-08-2017 a las 06:00:41
-- Versión del servidor: 10.1.22-MariaDB
-- Versión de PHP: 7.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blockchain_credentials`
--

CREATE TABLE `blockchain_credentials` (
  `idBlockchain_Credentials` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cryptocurrency`
--

CREATE TABLE `cryptocurrency` (
  `idCryptocurrency` int(11) NOT NULL,
  `nameCryptocurrency` varchar(100) DEFAULT NULL,
  `codCryptocurrency` varchar(40) DEFAULT NULL,
  `detailCryptocurrency` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='	';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fiats`
--

CREATE TABLE `fiats` (
  `idFiats` int(11) NOT NULL,
  `nameFiats` varchar(100) DEFAULT NULL,
  `codFiats` varchar(40) DEFAULT NULL,
  `countryFiats` varchar(45) DEFAULT NULL,
  `detailFiats` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fiats_has_users`
--

CREATE TABLE `fiats_has_users` (
  `Fiats_idFiats` int(11) NOT NULL,
  `Users_idUsers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `information`
--

CREATE TABLE `information` (
  `Users_idUsers` int(11) NOT NULL,
  `pinTX` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modules`
--

CREATE TABLE `modules` (
  `idModules` int(11) NOT NULL,
  `codeModules` varchar(45) DEFAULT NULL,
  `nameModules` varchar(45) DEFAULT NULL,
  `dateModules` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `idPermissions` int(11) NOT NULL,
  `Roles_idRoles` int(11) NOT NULL,
  `Prolifes_idProlifes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prolifes`
--

CREATE TABLE `prolifes` (
  `idProlifes` int(11) NOT NULL,
  `codeProlifes` varchar(45) DEFAULT NULL,
  `nameProlifes` varchar(45) DEFAULT NULL,
  `dateProlifes` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prolifes`
--

INSERT INTO `prolifes` (`idProlifes`, `codeProlifes`, `nameProlifes`, `dateProlifes`) VALUES
(1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRoles` int(11) NOT NULL,
  `codeRoles` varchar(45) DEFAULT NULL,
  `nameRoles` varchar(45) DEFAULT NULL,
  `dateRoles` datetime DEFAULT NULL,
  `Modules_idModules` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporal`
--

CREATE TABLE `temporal` (
  `pin` varchar(100) DEFAULT NULL,
  `ipTemporal` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transactions`
--

CREATE TABLE `transactions` (
  `idTransactions` int(11) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `message` varchar(100) DEFAULT NULL,
  `tx_hash` varchar(100) DEFAULT NULL,
  `notice` varchar(45) DEFAULT NULL,
  `amount` varchar(10) DEFAULT NULL,
  `fee` varchar(45) DEFAULT NULL,
  `idWBlockchain` int(11) NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `transactions`
--

INSERT INTO `transactions` (`idTransactions`, `address`, `message`, `tx_hash`, `notice`, `amount`, `fee`, `idWBlockchain`, `date`) VALUES
(1, '18gofQ4RE63XZ546keAaGw43tzJgh6c821', 'Payment Sent', '89b7f1ef66a8509dfec237a6fdf43df35b74c26bf2f8c2ee566f392793fddaa1', NULL, '0.00005324', '0.0001', 8, '2017-08-28 22:56:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `fnameUsers` varchar(100) DEFAULT NULL,
  `lnameUsers` varchar(100) DEFAULT NULL,
  `emailUsers` varchar(100) DEFAULT NULL,
  `nickUsers` varchar(100) NOT NULL,
  `passUsers` varchar(200) NOT NULL,
  `stateUsers` varchar(45) DEFAULT NULL,
  `dateUsers` datetime DEFAULT NULL,
  `auxUsers` varchar(50) DEFAULT NULL,
  `Prolifes_idProlifes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idUsers`, `fnameUsers`, `lnameUsers`, `emailUsers`, `nickUsers`, `passUsers`, `stateUsers`, `dateUsers`, `auxUsers`, `Prolifes_idProlifes`) VALUES
(3, 'name ', 'lname', 'kevin-tk@hotmail.es', 'name ', '827ccb0eea8a706c4c34a16891f84e7b', 'CONFIRMADO', '2017-08-25 09:08:59', '0', 1),
(5, 'jhghjg', 'hgjhg', 'edson@gmail.com', 'jhghjg', '827ccb0eea8a706c4c34a16891f84e7b', 'CONFIRMADO', '2017-08-26 00:07:06', '0', 1),
(6, 'arakata', 'arakata', 'lf.rosalesm@up.edu.pe', 'arakata', 'c056f9da32cc07329634622b3dec4450', 'CONFIRMADO', '2017-08-26 00:11:12', '0', 1),
(7, 'Joel', 'HUILLCA', 'ed@gmail.com', 'Joel', '827ccb0eea8a706c4c34a16891f84e7b', 'CONFIRMADO', '2017-08-26 19:29:03', '0', 1),
(8, 'jo', 'ha', 'jo@gmail.com', 'jo', '827ccb0eea8a706c4c34a16891f84e7b', 'CONFIRMADO', '2017-08-26 19:42:35', '0', 1),
(9, 'pedro', 'Blanco', 'pedro@gmail.com', 'pedro', '827ccb0eea8a706c4c34a16891f84e7b', 'CONFIRMADO', '2017-08-27 07:03:42', '0', 1),
(10, 'xa', 'po', 'xa@gmail.com', 'xa', '827ccb0eea8a706c4c34a16891f84e7b', 'CONFIRMADO', '2017-08-28 19:55:30', '0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wallets`
--

CREATE TABLE `wallets` (
  `idWallet` int(11) NOT NULL,
  `Users_idUsers` int(11) NOT NULL,
  `founds` varchar(45) DEFAULT NULL,
  `Fiats_idFiats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wblockchain`
--

CREATE TABLE `wblockchain` (
  `idWBlockchain` int(11) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `guid` varchar(100) DEFAULT NULL,
  `key` varchar(60) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `label` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `wblockchain`
--

INSERT INTO `wblockchain` (`idWBlockchain`, `email`, `guid`, `key`, `address`, `label`) VALUES
(1, 'kevin-tk@hotmail.es', 'fef2d423-5952-4fc4-bc3b-c8fc0564be19', 'bl0ckm@rbl3UP', '1G56pfBZGs8WaVsU9RMoWJzjkcnyBc2p52', NULL),
(3, 'edson@gmail.com', 'c85560e0-77d0-4b13-aa7e-d6d539ce25dd', '123456789', '1DKy5UKPfcybxGRfavurE8artFvtLraBzW', NULL),
(4, 'lf.rosalesm@up.edu.pe', 'c879da74-5719-4387-b551-46e509406052', '123456789', '1NkyfG2JL36a5kCMVyXrThwzZXfMkdJH39', NULL),
(5, 'ed@gmail.com', '32a615a1-c94b-4d48-b75a-f88cd11ebf37', '123456789', '1FXWBjTQTrtcfRLaBHTh33rEvXNbiKjXxa', NULL),
(6, 'jo@gmail.com', 'c879da74-5719-4387-b551-46e509406052', '123456789', '1NkyfG2JL36a5kCMVyXrThwzZXfMkdJH39', NULL),
(7, 'pedro@gmail.com', 'de00bb9a-2ecf-40d8-9788-6e5eb3419983', '123456789', '12WDhaokcyNfSxMpATwwEYj8qifZJU49rQ', NULL),
(8, 'xa@gmail.com', '2824efcb-91ef-43cd-b0db-723d530b1f5c', '123456789', '1LMFJ5shycXfd91h5gBuV18qp4ksHizSss', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `blockchain_credentials`
--
ALTER TABLE `blockchain_credentials`
  ADD PRIMARY KEY (`idBlockchain_Credentials`);

--
-- Indices de la tabla `cryptocurrency`
--
ALTER TABLE `cryptocurrency`
  ADD PRIMARY KEY (`idCryptocurrency`);

--
-- Indices de la tabla `fiats`
--
ALTER TABLE `fiats`
  ADD PRIMARY KEY (`idFiats`);

--
-- Indices de la tabla `fiats_has_users`
--
ALTER TABLE `fiats_has_users`
  ADD PRIMARY KEY (`Fiats_idFiats`,`Users_idUsers`),
  ADD KEY `fk_Fiats_has_Users_Users1_idx` (`Users_idUsers`),
  ADD KEY `fk_Fiats_has_Users_Fiats1_idx` (`Fiats_idFiats`);

--
-- Indices de la tabla `information`
--
ALTER TABLE `information`
  ADD KEY `fk_Information_Users1_idx` (`Users_idUsers`);

--
-- Indices de la tabla `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`idModules`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`idPermissions`),
  ADD KEY `fk_Permisos_Roles1_idx` (`Roles_idRoles`),
  ADD KEY `fk_Permisos_Prolifes1_idx` (`Prolifes_idProlifes`);

--
-- Indices de la tabla `prolifes`
--
ALTER TABLE `prolifes`
  ADD PRIMARY KEY (`idProlifes`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRoles`),
  ADD KEY `fk_Roles_Modules1_idx` (`Modules_idModules`);

--
-- Indices de la tabla `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`idTransactions`),
  ADD KEY `fk_Transactions_WBlockchain1_idx` (`idWBlockchain`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`),
  ADD KEY `fk_Users_Prolifes1_idx` (`Prolifes_idProlifes`);

--
-- Indices de la tabla `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`idWallet`),
  ADD KEY `fk_Wallet_fiats_Users1_idx` (`Users_idUsers`),
  ADD KEY `fk_Wallets_Fiats1_idx` (`Fiats_idFiats`);

--
-- Indices de la tabla `wblockchain`
--
ALTER TABLE `wblockchain`
  ADD PRIMARY KEY (`idWBlockchain`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `fiats`
--
ALTER TABLE `fiats`
  MODIFY `idFiats` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `modules`
--
ALTER TABLE `modules`
  MODIFY `idModules` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `idPermissions` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `prolifes`
--
ALTER TABLE `prolifes`
  MODIFY `idProlifes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRoles` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `transactions`
--
ALTER TABLE `transactions`
  MODIFY `idTransactions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `wblockchain`
--
ALTER TABLE `wblockchain`
  MODIFY `idWBlockchain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fiats_has_users`
--
ALTER TABLE `fiats_has_users`
  ADD CONSTRAINT `fk_Fiats_has_Users_Fiats1` FOREIGN KEY (`Fiats_idFiats`) REFERENCES `fiats` (`idFiats`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Fiats_has_Users_Users1` FOREIGN KEY (`Users_idUsers`) REFERENCES `users` (`idUsers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `information`
--
ALTER TABLE `information`
  ADD CONSTRAINT `fk_Information_Users1` FOREIGN KEY (`Users_idUsers`) REFERENCES `users` (`idUsers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `fk_Permisos_Prolifes1` FOREIGN KEY (`Prolifes_idProlifes`) REFERENCES `prolifes` (`idProlifes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Permisos_Roles1` FOREIGN KEY (`Roles_idRoles`) REFERENCES `roles` (`idRoles`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `fk_Roles_Modules1` FOREIGN KEY (`Modules_idModules`) REFERENCES `modules` (`idModules`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_Transactions_WBlockchain1` FOREIGN KEY (`idWBlockchain`) REFERENCES `wblockchain` (`idWBlockchain`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_Users_Prolifes1` FOREIGN KEY (`Prolifes_idProlifes`) REFERENCES `prolifes` (`idProlifes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `fk_Wallet_fiats_Users1` FOREIGN KEY (`Users_idUsers`) REFERENCES `users` (`idUsers`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Wallets_Fiats1` FOREIGN KEY (`Fiats_idFiats`) REFERENCES `fiats` (`idFiats`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
