<?php

class Webiprog_Geo_Adminhtml_GeozoneController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Geozones'));

        $this->loadLayout();
        $this->_setActiveMenu('webiprog_geo');
        $this->_addBreadcrumb(Mage::helper('webiprog_geo/data')
                ->__('Geozones'),
            Mage::helper('webiprog_geo')
                ->__('Geozones'));
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_title($this->__('Add new geozone'));
        $this->loadLayout();
        $this->_setActiveMenu('webiprog_geo');
        $this->_addBreadcrumb(Mage::helper('webiprog_geo')
                ->__('Add new geozone'),
            Mage::helper('webiprog_geo')
                ->__('Add new geozone'));
        $this->renderLayout();
    }

    public function editAction()
    {
        $this->_title($this->__('Edit geozone'));

        $this->loadLayout();
        $this->_setActiveMenu('webiprog_geo');
        $this->_addBreadcrumb(Mage::helper('webiprog_geo')
                ->__('Edit this geozone'),
            Mage::helper('webiprog_geo')
                ->__('Edit this geozone'));
        $this->renderLayout();
    }

    public function deleteAction()
    {
        $tipId = $this->getRequest()->getParam('id', false);

        try
        {
            Mage::getModel('webiprog_geo/geozone')->setId($tipId)->delete();
            Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('webiprog_geo')->__('Geozone edited successfully'));

            return $this->_redirect('*/*/');
        }
        catch(Mage_Core_Exception $e)
        {
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
        }
        catch(Exception $e)
        {
            Mage::logException($e);
            Mage::getSingleton('adminhtml/session')->addError($this->__('Something get wrong'));
        }

        $this->_redirectReferer();
    }

    public function saveAction()
    {
        $data = $this->getRequest()->getPost();

        if(!empty($data))
        {
            try
            {
                Mage::getModel('webiprog_geo/geozone')->setData($data)
                    ->save();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('webiprog_geo')->__('Data of geozone was saved successfully'));
            }
            catch(Mage_Core_Exception $e)
            {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
            catch(Exception $e)
            {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('webiprog_geo')->__('Something went totally wrong!!'));
            }
        }

        return $this->_redirect('*/*/');
    }

    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout->createBlock('webiprog_geo/adminhtml_geozone_grid')->toHtml()
        );
    }
}