<?php

class Webiprog_Geo_Block_Geozone_Content extends Mage_Core_Block_Template
{
    protected function _construct()
    {
        $this->setTemplate('webiprog/geo/geozone/view.phtml');
    }

    public function getGeozone()
    {
        return Mage::getModel('webiprog_geo/geozone')->load($this->getGeozoneId());
    }
}