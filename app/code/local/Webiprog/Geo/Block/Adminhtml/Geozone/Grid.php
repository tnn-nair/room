<?php

class Webiprog_Geo_Block_Adminhtml_Geozone_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    protected function _construct()
    {
        $this->setId('geozoneGrid');
        $this->_controller = 'adminhtml_geozone';
        $this->setUseAjax(true);

        $this->setDefaultSort('id');
        $this->setDefaultDir('desc');
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('webiprog_geo/geozone')->getCollection();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('id', array(
            'header' => Mage::helper('webiprog_geo')->__('ID'),
            'align' => 'right',
            'width' => '20px',
            'filter_index' => 'id',
            'index' => 'id',
        ));

        $this->addColumn('name', array(
            'header' => Mage::helper('webiprog_geo')->__('Title'),
            'align' => 'left',
            'filter_index' => 'name',
            'index' => 'name',
            'truncate' => 50,
            'escape' => true,
        ));

        $this->addColumn('action', array(
            'header'    => Mage::helper('webiprog_geo')->__('Action'),
            'width'     => '50px',
            'type'      => 'action',
            'getter'     => 'getId',
            'actions'   => array(
                array(
                    'caption' => Mage::helper('webiprog_geo')->__('Edit'),
                    'url'     => array(
                        'base'=>'*/*/edit',
                    ),
                    'field'   => 'id'
                )
            ),
            'filter'    => false,
            'sortable'  => false,
            'index'     => 'id',
        ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($geozone)
    {
        return $this->getUrl('*/*/edit', array(
            'id' => $geozone->getId(),
        ));
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }
}