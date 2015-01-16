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