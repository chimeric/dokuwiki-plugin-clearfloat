<?php
/**
 * Syntax Plugin Backlinks
 * 
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Michael Klier <chi@chimeric.de>
 */

if(!defined('DOKU_INC')) define('DOKU_INC',realpath(dirname(__FILE__).'/../../').'/');
if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
require_once(DOKU_PLUGIN.'syntax.php');
if(!defined('DW_LF')) define('DW_LF',"\n");

/**
 * All DokuWiki plugins to extend the parser/rendering mechanism
 * need to inherit from this class
 */
class syntax_plugin_clearfloat extends DokuWiki_Syntax_Plugin {


    /**
     * General Info
     */
    function getInfo(){
        return array(
            'author' => 'Michael Klier',
            'email'  => 'chi@chimeric.de',
            'date'   => '2006-10-12',
            'name'   => 'Clearfloat',
            'desc'   => 'Clears previous floats from images.',
            'url'    => 'http://www.chimeric.de/dokuwiki/plugins/clearfloat'
        );
    }

    /**
     * Syntax Type
     *
     * Needs to return one of the mode types defined in $PARSER_MODES in parser.php
     */
    function getType(){ return 'substition'; }
    function getPType() { return 'block'; }
    function getSort() { return 308; }
    
    /**
     * Connect pattern to lexer
     */
    function connectTo($mode) {
        $this->Lexer->addSpecialPattern('~~CLEARFLOAT~~',$mode,'plugin_clearfloat');
    }

    /**
     * Handler to prepare matched data for the rendering process
     */
    function handle($match, $state, $pos, &$handler){
        return array();
    }

    /**
     * Handles the actual output creation.
     */
    function render($mode, &$renderer, $data) {
        global $ID;

        if($mode == 'xhtml'){
            $renderer->doc .= '<div class="clearer"></div>';
            return true;
        }
        return false;
    }

}
//Setup VIM: ex: et ts=4 enc=utf-8 :
