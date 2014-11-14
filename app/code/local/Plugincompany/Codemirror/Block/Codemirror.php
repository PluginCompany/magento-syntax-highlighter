<?php
/**
 * Created by PhpStorm.
 * User: milan
 * Date: 11/14/14
 * Time: 4:45 PM
 */
class Plugincompany_Codemirror_Block_Codemirror extends Mage_Core_Block_Template
{
    public function getTextAreas()
    {

        $controller = Mage::app()->getRequest()->getControllerName();

        switch($controller){
            case 'cms_page':
                if(Mage::getStoreConfig('plugincompany_codemirror/plugincompany_codemirror_group/cms_page')){
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
                if(Mage::getStoreConfig('plugincompany_codemirror/plugincompany_codemirror_group/cms_block')){
                    $editorFields = array(
                        array(
                            'title'=>'block_content'
                        )
                    );
                }
                break;
            case 'catalog_product':
                if(Mage::getStoreConfig('plugincompany_codemirror/plugincompany_codemirror_group/product')){
                    $editorFields = array(
                        array(
                            'title'=>'description'
                        ),
                        array(
                            'title' => 'short_description'
                        )
                    );
                }
                break;
            case 'catalog_category':
                if(Mage::getStoreConfig('plugincompany_codemirror/plugincompany_codemirror_group/categories')){
                    $editorFields = array(
                        array(
                            'title'=> new Zend_Json_Expr("jQuery('[name*=\\\\[description\\\\]]').eq(0).attr('id')")
                        ),
                        array(
                            'title'=> new Zend_Json_Expr("jQuery('[name*=\\\\[custom_layout_update\\\\]]').eq(0).attr('id')")
                        ),
                    );
                }
                break;
            case 'newsletter_template':
                if(Mage::getStoreConfig('plugincompany_codemirror/plugincompany_codemirror_group/newsletter')){
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
                if(Mage::getStoreConfig('plugincompany_codemirror/plugincompany_codemirror_group/transactional')){
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