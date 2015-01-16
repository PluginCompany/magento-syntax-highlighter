<?php
/**
 *
 * Created by:  Milan Simek
 * Company:     Plugin Company
 *
 * LICENSE: http://plugin.company/docs/magento-extensions/magento-extension-license-agreement
 *
 * YOU WILL ALSO FIND A PDF COPY OF THE LICENSE IN THE DOWNLOADED ZIP FILE
 *
 * FOR QUESTIONS AND SUPPORT
 * PLEASE DON'T HESITATE TO CONTACT US AT:
 *
 * SUPPORT@PLUGIN.COMPANY
 *
 */
class Plugincompany_Syntaxhighlighter_Model_System_Config_Source_Producttextfields
{

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        $textFields = $this->toArray();

        $ret = array();

        foreach ($textFields as $code => $title) {
            $ret[] = array('value' => $code, 'label' => $title);
        }

        return $ret;
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        $textFields = Mage::getResourceModel('catalog/product_attribute_collection');
        $textFields->addFieldToFilter('frontend_input', 'textarea');

        $ret = array();
        foreach ($textFields as $attr) {
            $ret[$attr->getAttributeCode()] = $attr->getFrontendLabel();
        }

        return $ret;
    }

}