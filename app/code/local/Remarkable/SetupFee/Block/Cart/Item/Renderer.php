<?php
 
class Remarkable_SetupFee_Block_Cart_Item_Renderer extends Mage_Checkout_Block_Cart_Item_Renderer
{
    public function getLoadedProduct()
    {
 
===== Extend the Sales/Model/Quote/Item.php =====
I want the setup fee to be added to the row amount without multiplying by the quantity.  So I want to override calcRowTotal().  Create the following file:
 
''/Magento/app/code/local/Company/MyModule/Model/Quote/Item.php''
<code php>
<?php
 
class Remarkable_SetupFee_Model_Quote_Item extends Mage_Sales_Model_Quote_Item
{
    public function calcRowTotal()
    {
        parent::calcRowTotal();
        $product = $this->getProduct();
        $product->load($product->getId());
 
        // This is where I add the Setup Fee, more than one fee can be added
        // here if necessary
        $baseTotal = $this->getBaseRowTotal() + $product->getSetupFee();
 
        $total = $this->getStore()->convertPrice($baseTotal);
        $this->setRowTotal($this->getStore()->roundPrice($total));
        $this->setBaseRowTotal($this->getStore()->roundPrice($baseTotal));
        return $this;
    }
}