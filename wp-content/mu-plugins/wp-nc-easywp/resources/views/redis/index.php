<!--
 |
 | In $plugin you'll find an instance of Plugin class.
 | If you'd like can pass variable to this view, for example:
 |
 | return PluginClassName()->view( 'dashboard.index', [ 'var' => 'value' ] );
 |
-->

<div class="wpnceasywp wrap">
  <h1>
    <?php _e('EasyWP Redis Controller', \WPNCEasyWP::TEXTDOMAIN) ?>
  </h1>

  <p>
    <?php _e('From this view you\'ll able to check the redis status.', \WPNCEasyWP::TEXTDOMAIN) ?>
  </p>

  <h2>
    <?php _e('Information', \WPNCEasyWP::TEXTDOMAIN) ?>
  </h2>

</div>