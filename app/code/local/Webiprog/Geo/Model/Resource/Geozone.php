<?php

class Webiprog_Geo_Model_Resource_Geozone extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init('webiprog_geo/geozone', 'id');
    }
}