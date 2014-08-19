<?php

class Webiprog_Geo_Block_Adminhtml_Geozone extends Mage_Core_Block_Widget_Grid_Container
{
    protected function _construct()
    {
        $this->_addButtonLabel = Mage::helper('webiprog_geo')->__('Add New Geozone');

        $this->_blockGroup = 'webiprog_geo';
        $this->_controller = 'adminhtml_geozone';
        $this->_headerText = Mage::helper('webiprog_geo')->__('Geozones');
    }
}