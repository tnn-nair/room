<?php

$installer = $this;
$installer->startSetup();

$installer->run("
CREATE TABLE `{$this->getTable('webiprog_geo/geozone')}` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `name` varchar(255) NOT NULL,
 `dscr` mediumtext NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8");

$installer->endSetup();