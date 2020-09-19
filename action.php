<?php
/**
 * Action Plugin: Inserts a button into the toolbar to add file tags
 *
 * @author Georg Schmidt, Heiko Barth, Davide Rolando
 *
 */
 
if (!defined('DOKU_INC')) die();
if (!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN', DOKU_INC . 'lib/plugins/');
require_once (DOKU_PLUGIN . 'action.php');
 
class action_plugin_codebuttonmod2 extends DokuWiki_Action_Plugin {

    /**
     * Register the eventhandlers
     */
    function register(Doku_Event_Handler $controller) {
        $controller->register_hook('TOOLBAR_DEFINE', 'AFTER', $this, 'insert_button', array ());
		$controller->register_hook('TOOLBAR_DEFINE', 'AFTER', $this, 'insert_button_copy', array ());
		$controller->register_hook('TOOLBAR_DEFINE', 'AFTER', $this, 'insert_button_inline', array ());
#		$controller->register_hook('TPL_METAHEADER_OUTPUT', 'BEFORE', $this, '_hookjs');
    }
 
    /**
     * Insert a toolbar button
     */
    function insert_button(& $event, $param) {
        $event->data[] = array (
            'type' => 'format',
            'title' => $this->getLang('insertcode'),
            'icon' => '../../plugins/codebuttonmod2/image/code.png',
            'open' => '<code | download>\n',
            'close' => '\n</code>',
        );
    }
	
	/**
     * Insert a toolbar button
     */
    function insert_button_inline(& $event, $param) {
        $event->data[] = array (
            'type' => 'format',
            'title' => $this->getLang('insertcodeinline'),
            'icon' => '../../plugins/codebuttonmod2/image/inline-button.png',
            'open' => "''%%",
            'close' => "%%''",
        );
    }
	
    /**
     * Insert a toolbar button
     */
    function insert_button_copy(& $event, $param) {
        $event->data[] = array (
            'type' => 'format',
            'title' => $this->getLang('insertcodecopy'),
            'icon' => '../../plugins/codebuttonmod2/image/copy_code_small.png',
            'open' => '<code>\n',
            'close' => '\n</code>',
        );
    }
    
}

?>
