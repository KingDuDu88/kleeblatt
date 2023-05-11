<!--
 |
 | In $plugin you'll find an instance of Plugin class.
 | If you'd like can pass variable to this view, for example:
 |
 | return PluginClassName()->view( 'dashboard.index', [ 'var' => 'value' ] );
 |
-->

<div class="wpnceasywp wrap">
  <h1><?php echo $plugin->Name ?> ver.<?php echo $plugin->Version ?></h1>
  <h2>
    PHP ver.<?php echo phpversion() ?>
  </h2>

  <?php if (!empty($plugins)) : ?>

    <h2><?php _e('General information...', \WPNCEasyWP::TEXTDOMAIN) ?>
    </h2>

    <h4><?php _e('Warning', \WPNCEasyWP::TEXTDOMAIN) ?>
    </h4>

    <p><?php echo _n('The following plugin will be disabled.', 'The following plugins will be disabled.', count($plugins), \WPNCEasyWP::TEXTDOMAIN) ?>
    </p>

    <ul>

      <?php foreach ($plugins as $file => $value) : ?>
        <li>
          <?php printf(__('%s will be disabled because: %s', \WPNCEasyWP::TEXTDOMAIN), $value['data']['Name'], $value['info']['description']); ?>
        </li>
      <?php endforeach; ?>

    </ul>

    <hr />

  <?php endif; ?>

  <h2>Kubernetes</h2>

  <?php $info = \WPNCEasyWP\Http\Varnish\VarnishCache::info(); ?>

  <p>HOSTNAME: <?php echo $info['HOSTNAME'] ?>
  </p>
  <p>Service: <?php echo $info['svc'] ?>
  </p>
  <p>IPs: <?php echo $info['ips'] ?>
  </p>

  <hr />

  <h2>Cache info</h2>

  <?php $varnish = WPNCEasyWP()->options->get('varnish') ?>

  <ul>
    <li>Varnish: <?php echo $varnish['enabled'] ? 'Enabled' : 'Disabled' ?>
    </li>
    <li>Schema: <?php echo $varnish['schema'] ?>
    </li>
    <li>default_purge_method: <?php echo $varnish['default_purge_method'] ?>
    </li>
    <li>Last purge: <?php echo $varnish['last_purge'] ?>
    </li>
  </ul>

  <hr />

  <h3>Last Purged URLs</h3>
  <pre>
<?php foreach ($varnish['last_purged_urls'] as $url) : ?>
<?php echo "{$url}\n" ?>
<?php endforeach; ?>
    </pre>

  <hr />

  <pre>
    <?php
    echo WPNCEasyWP()->options;
    ?>
    </pre>

</div>