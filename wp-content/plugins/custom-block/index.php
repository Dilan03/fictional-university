<?php
/*
  Plugin Name: Custom Block
  Description: Give your readers a multiple choice question
  Version: 1.0
  Author: Dilan
*/

if(! defined('ABSPATH')) exit;

class AreYouPayingAttetion {
  function __construct() {
    add_action('init', array($this, 'adminAssets'));
  }

  function adminAssets() {
    register_block_type(__DIR__, array(
      'render_callback' => array($this, 'theHTML')

    ));
  }

  function theHTML($attr) {
    ob_start(); ?> 
    
    <div class="paying-attention-update-me">
      <pre style="display: none;"><?php echo wp_json_encode($attr)?></pre>
    </div>
    
    <?php return ob_get_clean();
  }
}

$areYouPayingAttention = new AreYouPayingAttetion();

?>