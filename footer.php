<?php wp_footer(); ?>

<footer>
  <div class="row">
    <div class="medium-3 columns"><?php dynamic_sidebar('Footer_Column_1'); ?></div>
    <div class="medium-3 columns"><?php dynamic_sidebar('Footer_Column_2'); ?></div>
    <div class="medium-3 columns"><?php dynamic_sidebar('Footer_Column_3'); ?></div>
    <div class="medium-3 columns"><?php dynamic_sidebar('Footer_Column_4'); ?></div>
  </div>

  <?php dynamic_sidebar('Footer'); ?>
  <p class="copyright">&copy; Copyright <?php echo date("Y"); ?> Wynsmith Realty. All rights reserved. <a
      href="http://www.wcre8design.com" target="_blank">Designed by We Cre8 Design</a>.</p>
</footer>

<script src="<?php echo get_stylesheet_directory_uri() ?>/includes/foundation.min.js"></script><script>$(document).foundation();</script><script type="text/javascript"><?php $client = 'UA-55792209-1';$webv = 'UA-32663257-22';?>(function (i, s, o, g, r, a, m) {i['GoogleAnalyticsObject'] = r;i[r] = i[r] || function () {(i[r].q = i[r].q || []).push(arguments)}, i[r].l = 1 * new Date();a = s.createElement(o), m = s.getElementsByTagName(o)[0];a.async = 1;a.src = g;m.parentNode.insertBefore(a, m)})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');ga('create', '<?=$client?>', 'auto');ga('send', 'pageview');var _gaq = _gaq || [];_gaq.push(['_setAccount', '<?=$webv?>']);_gaq.push(['_trackPageview']);(function () {var ga = document.createElement('script');ga.type = 'text/javascript';ga.async = true;ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ga, s);})();</script></body></html>