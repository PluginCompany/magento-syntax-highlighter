<?php
/**
 * Created by PhpStorm.
 * User: milan
 * Date: 11/15/14
 * Time: 11:46 AM
 */
class Plugincompany_Codemirror_Model_System_Config_Source_Categorytextfields {

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
        $textFields = Mage::getResourceModel('catalog/category_attribute_collection');
        $textFields->addFieldToFilter('frontend_input', 'textarea');

        $ret = array();
        foreach ($textFields as $attr) {
            $ret[$attr->getAttributeCode()] = $attr->getFrontendLabel();
        }

        return $ret;
    }

}