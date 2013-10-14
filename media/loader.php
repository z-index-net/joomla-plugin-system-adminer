<?php
/**
 * @author     mediahof, Kiel-Germany
 * @link       http://www.mediahof.de
 * @copyright  Copyright (C) 2013 mediahof. All rights reserved.
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

define('_JEXEC', 1);

define('DS', DIRECTORY_SEPARATOR);

define('JPATH_BASE', dirname(__FILE__) . '/../../../../'); // TODO

require_once JPATH_BASE . '/includes/defines.php';

require_once JPATH_BASE . '/includes/framework.php';

$app = JFactory::getApplication('administrator');

$app->initialise(array('language' => $app->getUserState('application.lang')));

$user = JFactory::getUser();

if(!$user->id) {
	exit;
}

$lang = JFactory::getLanguage()->getTag();
$lang = explode('-', $lang, 2);
$lang = $lang[0];

$plugin = JPluginHelper::getPlugin('system', 'adminer');
$plugin->params = new JRegistry($plugin->params);

if(!in_array($plugin->params->get('accesslevel'), $user->getAuthorisedViewLevels())) {
	exit;
}

function adminer_object() {
    
    JLoader::import('joomla.filesystem.folder');
    
    $files = JFolder::files(dirname(__FILE__) . '/plugins/');
    
    $plugins = array();
    foreach($files as $file) {
        include_once dirname(__FILE__) . DS . 'plugins' . DS . $file;
    }
    
    if(empty($plugins)) {
        return new Adminer();
    }
    
    return new AdminerPlugin($plugins);
}

include_once dirname(__FILE__) . '/adminer.php';