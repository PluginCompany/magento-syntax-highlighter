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
class Plugincompany_Syntaxhighlighter_Block_Syntaxhighlighter extends Mage_Core_Block_Template
{
    /**
     * returns JSON with syntaxhighlighter enabled textarea fields.
     * @return string
     */
    public function getTextAreas()
    {

        $controller = Mage::app()->getRequest()->getControllerName();

        switch($controller){
            case 'cms_page':
                if(Mage::getStoreConfig('plugincompany_syntaxhighlighter/plugincompany_syntaxhighlighter_group/cms_page')){
                    $editorFields = array(
                        array(
                            'title' => 'page_content'
                        ),
                        array(
                            'title' => 'page_layout_update_xml'
                        ),
                        array(
                            'title' => 'page_custom_layout_update_xml'
                        ),
                    );
                }
                break;
            case 'cms_block':
                if(Mage::getStoreConfig('plugincompany_syntaxhighlighter/plugincompany_syntaxhighlighter_group/cms_block')){
                    $editorFields = array(
                        array(
                            'title'=>'block_content'
                        )
                    );
                }
                break;
            case 'catalog_product':
                if(Mage::getStoreConfig('plugincompany_syntaxhighlighter/plugincompany_syntaxhighlighter_group/product')){
                    $editorFields = array();
                    if ($fields = Mage::getStoreConfig('plugincompany_syntaxhighlighter/plugincompany_syntaxhighlighter_group/product_fields')) {
                        foreach(explode(',',$fields) as $field){
                            $editorFields[] = array('title' => $field);
                        }
                    }
                }
                break;
            case 'catalog_category':
                if(Mage::getStoreConfig('plugincompany_syntaxhighlighter/plugincompany_syntaxhighlighter_group/categories')){
                    $editorFields = array();
                    if ($fields = Mage::getStoreConfig('plugincompany_syntaxhighlighter/plugincompany_syntaxhighlighter_group/category_fields')) {
                        foreach(explode(',',$fields) as $field){
                            $editorFields[] = array('title' => new Zend_Json_Expr("jQuery('[name*=\\\\[{$field}\\\\]]').eq(0).attr('id')"));
                        }
                    }
                }
                break;
            case 'newsletter_template':
                if(Mage::getStoreConfig('plugincompany_syntaxhighlighter/plugincompany_syntaxhighlighter_group/newsletter')){
                    $editorFields = array(
                        array(
                            'title'=>'text'
                        ),
                        array(
                            'title' => 'template_styles',
                            'type' => 'css'
                        )
                    );
                }
                break;
            case 'system_email_template':
                if(Mage::getStoreConfig('plugincompany_syntaxhighlighter/plugincompany_syntaxhighlighter_group/transactional')){
                    $editorFields = array(
                        array(
                            'title'=>'template_text'
                        ),
                        array(
                            'title' => 'template_styles',
                            'type' => 'css'
                        )
                    );
                }
                break;
        }
       return Zend_Json::encode($editorFields,false,array('enableJsonExprFinder'=>true));
    }
}