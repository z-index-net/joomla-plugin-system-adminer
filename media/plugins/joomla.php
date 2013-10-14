<?php
/**
 * @author     mediahof, Kiel-Germany
 * @link       http://www.mediahof.de
 * @copyright  Copyright (C) 2013 mediahof. All rights reserved.
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

class AdminerJoomla {
    
    function __construct() {
        $config = JFactory::getConfig();
        if(empty($_SESSION['pwds']) && !isset($_POST['auth'])) {
            $_POST['auth']['driver'] = 'server';
            $_POST['auth']['server'] = $config->get('host');
            $_POST['auth']['username'] = $config->get('user');
            $_POST['auth']['password'] = $config->get('password');
            $_POST['auth']['db'] = $config->get('db');
        }else{
            // TODO
            $_GET['server'] = $config->get('host');
            $_GET['username'] = $config->get('user');
            $_GET['db'] = $config->get('db');
        }
    }
    
    function name() {
        return 'Adminer';
    }

    function credentials() {
        $config = JFactory::getConfig();
        return array($config->get('host'), $config->get('user'), $config->get('password'));
    }
    
    function database() {
        return JFactory::getConfig()->get('db');
    }
}

$plugins[] = new AdminerJoomla;