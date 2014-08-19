<?php

class Webiprog_Geo_Block_Content extends Mage_Core_Block_Template
{
    protected function _construct()
    {
        $this->setTemplate('webiprog/geo/view.phtml');
    }

    public function getRowUrl(Webiprog_Geo_Model_Geozone $geozone)
    {
        return $this->getUrl('*/*/view', array('id'=> $geozone->getId()));
    }

    public function getCollection()
    {
        return Mage::getModel('webiprog_geo/geozone')->getCollection();
    }
}