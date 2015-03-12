<?php
/**
 * ==========================================
 *
 * Created by:  Milan Simek
 * Company:     Plugin Company
 *
 * ==========================================
 *
 *  LICENSE: http://www.gnu.org/licenses/gpl-2.0.html
 *
 *  YOU WILL ALSO FIND A COPY OF THE LICENSE IN THE PROJECT ROOT OR DOWNLOADED ZIP FILE
 *
 *   Magento Syntax Highlighter Extension by Plugin Company
 *
 *   Copyright (C) 2014-2015 Plugin Company
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License along
 *  with this program; if not, write to the Free Software Foundation, Inc.,
 *  51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 *
 * ==========================================
 *
 * FOR QUESTIONS AND SUPPORT
 * PLEASE DON'T HESITATE TO CONTACT US AT:
 *
 * SUPPORT@PLUGIN.COMPANY
 *
 * SHARING IS CARING :-) FEEL FREE TO CONTRIBUTE @ https://github.com/PluginCompany/magento-syntax-highlighter
 *
 * ==========================================
 */
class Plugincompany_Syntaxhighlighter_Model_System_Config_Source_Categorytextfields {

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