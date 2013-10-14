<?php
/**
 * @author     mediahof, Kiel-Germany
 * @link       http://www.mediahof.de
 * @copyright  Copyright (C) 2013 mediahof. All rights reserved.
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

class AdminerJoomla {
    
    function __construct() {
        $config = JFactory::getConfig();
        if(empty($_SESSION['pwds']) || empty($_SESSION['db'])) {
            $_SESSION['pwds']['server'][$config->get('host')][$config->get('user')] = $config->get('password');
            $_SESSION['db']['server'][$config->get('host')][$config->get('user')][$config->get('db')] = true;
        }else{
            $_GET['server'] = $config->get('host');
            $_GET['username'] = $config->get('user');
            $_GET['db'] = $config->get('db');
        }
    }
    
    function name() {
        return '<a href="./loader.php" id="h1">Adminer</a>';
    }
}

$plugins[] = new AdminerJoomla;