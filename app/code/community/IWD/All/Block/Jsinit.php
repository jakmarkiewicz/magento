<?php
class IWD_All_Block_Jsinit extends Mage_Adminhtml_Block_Template{


	/**
     * Include JS in head if section is moneybookers
     */
    protected function _prepareLayout()
    {
        $section = $this->getAction()->getRequest()->getParam('section', false);
        if ($section == 'iwdstore') {
            $this->getLayout()
                ->getBlock('head')
                ->addJs('mage/adminhtml/moneybookers.js');
        }
        parent::_prepareLayout();
    }

    /**
     * Print init JS script into body
     * @return string
     */
    protected function _toHtml()
    {
        $section = $this->getAction()->getRequest()->getParam('section', false);
        if ($section == 'iwdstore') {
            return parent::_toHtml();
        } else {
            return '';
        }
    }
    
    
    
    public function getExtensions(){
    	$data = array();
    	try{
	    	$file = 'http://dg8i44zfacfed.cloudfront.net/featured_product.csv';
	    	$content = file_get_contents($file);
	    	
	    	$path = Mage::getBaseDir('media') . DS . 'featured_product.csv';
	    	file_put_contents($path, $content);
	    	
	    	$csv = new Varien_File_Csv();
	    	$data = $csv->getData($path);
	    	
	    	@unlink($path);
    	}catch(Exception $e){
    		Mage::logException($e);
    	}
    	return $data;
    }


}
 
