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
 
class action_plugin_codebuttonmod1 extends DokuWiki_Action_Plugin {

    /**
     * Register the eventhandlers
     */
    function register(Doku_Event_Handler $controller) {
        $controller->register_hook('TOOLBAR_DEFINE', 'AFTER', $this, 'insert_button', array ());
		$controller->register_hook('TOOLBAR_DEFINE', 'AFTER', $this, 'insert_button_copy', array ());
		$controller->register_hook('TPL_METAHEADER_OUTPUT', 'BEFORE', $this,'_hookjs');
    }
 
    /**
     * Inserts the toolbar button
     */
    function insert_button(& $event, $param) {
        $event->data[] = array (
            'type' => 'format',
            'title' => $this->getLang('insertcode'),
            'icon' => '../../plugins/codebuttonmod1/image/code.png',
            'open' => '<code | download>\n',
            'close' => '\n</code>',
        );
    }

    /**
     * Inserts the toolbar button
     */
    function insert_button_copy(& $event, $param) {
        $event->data[] = array (
            'type' => 'format',
            'title' => $this->getLang('insertcodecopy'),
            'icon' => '../../plugins/codebuttonmod1/image/copy_code_small.png',
            'open' => '<code>\n',
            'close' => '\n</code>',
        );
    }

    /**
     * Hook js script into page headers.
     *
     * @author Samuele Tognini <samuele@cli.di.unipi.it>
     */
    public function _hookjs(Doku_Event $event, $param) {
        $event->data['script'][] = array(
                            'type'    => 'text/javascript',
                            'charset' => 'utf-8',
                            '_data'   => '',
                            'src'     => DOKU_BASE.'lib/plugins/codebuttonmod1/'.'src/codebutton.js'
							);
							#'src'     => DOKU_PLUGIN.'src/codebutton.js');
    }
}
