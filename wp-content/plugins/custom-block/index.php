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
    wp_register_style('quizeditcss', plugin_dir_url(__FILE__).'build/index.css');
    wp_register_script('ournewblocktype', plugin_dir_url(__FILE__).'build/index.js', array('wp-blocks', 'wp-element', 'wp-editor'));
    register_block_type('ourplugin/custom-block', array(
      'editor_script' => 'ournewblocktype',
      'editor_style' => 'quizeditcss',
      'render_callback' => array($this, 'theHTML')

    ));
  }

  function theHTML($attr) {
    if(!is_admin()) {
      wp_enqueue_script('attentionFrontend', plugin_dir_url(__FILE__).'build/frontend.js', array('wp-element'));
      wp_enqueue_style('attentionFrontendStyles', plugin_dir_url(__FILE__).'build/frontend.css');
    }



    ob_start(); ?> 
    
    <div class="paying-attention-update-me">
      <pre style="display: none;"><?php echo wp_json_encode($attr)?></pre>
    </div>
    
    <?php return ob_get_clean();
  }
}

$areYouPayingAttention = new AreYouPayingAttetion();

?>