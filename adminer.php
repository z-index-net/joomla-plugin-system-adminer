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
        'onload' => 'this.height = this.contentWindow.document.body.scrollHeight'
    );

    public function onBeforeRender()
    {
        $app = JFactory::getApplication();
        
        if ($app->isSite()) {
            return;
        }
        
        if ($app->input->get('adminer') && $app->input->get('option') == 'com_admin' && $app->input->get('view') == 'sysinfo') {
            JToolbarHelper::title(JText::_('Adminer'), 'systeminfo.png');
            JFactory::getDocument()->setTitle(JText::_('Adminer'));
            $app->JComponentTitle= 'test';
            $iframe = JHtml::_('iframe', JUri::root(true) . '/media/adminer/loader.php', 'adminer', $this->layout);
            
            JFactory::getDocument()->setBuffer($iframe, 'component');
        }
    }
    
    public function onGetIcons()
    {
        return array(
            array(
                'link' => 'index.php?option=com_admin&view=sysinfo&adminer=true',
                'image' => (version_compare(JVERSION, '3', '>=') ? 'tools' : 'adminer/adminer.png'),
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