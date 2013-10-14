<?php

/** Disable version checker
* @link http://www.adminer.org/plugins/#use
* @author Jakub Vrana, http://www.vrana.cz/
* @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
*/

defined('_JEXEC') or die;

class AdminerVersionNoverify {
	
	function navigation($missing) {
		?>
<script type="text/javascript">
verifyVersion = function () {
};
</script>
<?php
	}
	
}

$plugins[] = new AdminerVersionNoverify;