<?php
/**
 * @author     mediahof, Kiel-Germany
 * @link       http://www.mediahof.de
 * @copyright  Copyright (C) 2013 mediahof. All rights reserved.
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

class plgSystemAdminer extends JPlugin
{

    private $layout = array(
        'width' => '100%',
        'height' => '500',
        'style' => 'border: 0;',
        'onload' => 'this.height=this.contentWindow.document.body.scrollHeight'
    );
    
    private $styles = array(
    	'.icon-48-adminer{background-image:url(../media/adminer/adminer.png);}',
        'body.com_admin .page-title{background:url(../media/adminer/adminer.png) no-repeat 0 50%;padding-left:48px;}',
        '#toolbar{display:none;}'
    );
        
    public function onBeforeRender()
    {
        $app = JFactory::getApplication();
        $doc = JFactory::getDocument();
        
        if ($app->isSite()) {
            return;
        }
        
        if ($app->input->get('adminer') && $app->input->get('option') == 'com_admin' && $app->input->get('view') == 'sysinfo') {
            JToolbarHelper::title(JText::_('Adminer'), 'adminer');
            
            $doc->setTitle(JText::_('Adminer'));
            $doc->setBuffer('', 'modules', 'submenu');
            
            $doc->addStyleDeclaration(implode($this->styles));
            
            $iframe = JHtml::_('iframe', JUri::root(true) . '/media/adminer/loader.php', 'adminer', $this->layout);
            
            $doc->setBuffer($iframe, 'component');
        }
    }

    public function onGetIcons()
    {
        return array(
            array(
                'link' => 'index.php?option=com_admin&view=sysinfo&adminer=true',
                'image' => (version_compare(JVERSION, '3', '>=') ? 'tools' : JUri::root() . 'media/adminer/adminer.png'),
                'text' => JText::_('Adminer'),
                'id' => 'plg_system_adminer',
                'access' => array(
                    'core.manage',
                    'com_config',
                    'core.admin',
                    'com_config'
                )
            )
        );
    }
}