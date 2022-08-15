-- Test database schema.
--
-- If you are not using CakePHP migrations you can put
-- your application's schema in this file and use it in tests.


CREATE TABLE `additionalcosts` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `amount` float NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `comment` varchar(50) DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `factories` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `currency` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `number` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `currency_of_origin` varchar(20) NOT NULL,
  `currency_rate` double(10,0) NOT NULL,
  `gst`float DEFAULT NULL,
  `factory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `invoices_skus` (
  `invoice_id` int(11) NOT NULL,
  `sku_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `skus` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` float NOT NULL,
  `type_id` int(11) NOT NULL,
  `factory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `additionalcosts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_id` (`invoice_id`);

ALTER TABLE `factories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `factory_id` (`factory_id`);

ALTER TABLE `invoices_skus`
  ADD PRIMARY KEY (`invoice_id`,`sku_id`),
  ADD KEY `invoice_id` (`invoice_id`,`sku_id`),
  ADD KEY `sku_id` (`sku_id`);

ALTER TABLE `skus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`type_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `factory_id` (`factory_id`);

ALTER TABLE `types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);


ALTER TABLE `additionalcosts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `factories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `skus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `additionalcosts`
  ADD CONSTRAINT `additionalcosts_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`);

ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`factory_id`) REFERENCES `factories` (`id`);

ALTER TABLE `invoices_skus`
  ADD CONSTRAINT `invoices_skus_ibfk_1` FOREIGN KEY (`sku_id`) REFERENCES `skus` (`id`),
  ADD CONSTRAINT `invoices_skus_ibfk_2` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`);

ALTER TABLE `skus`
  ADD CONSTRAINT `skus_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`),
  ADD CONSTRAINT `skus_ibfk_2` FOREIGN KEY (`factory_id`) REFERENCES `factories` (`id`);