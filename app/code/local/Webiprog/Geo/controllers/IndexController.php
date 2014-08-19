<?php

class Webiprog_Geo_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout()
            ->renderLayout();
    }

    public function viewAction()
    {
        $geozone_id = (int) $this->getRequest()->getParam('id');
        if(!$geozone_id)
        {
            $this->_forward('noRoute');
        }
        $this->loadLayout();
        $this->getLayout()
            ->getBlock('geozone.item')
            ->setGeozoneId($geozone_id);
        $this->renderLayout();
    }
}