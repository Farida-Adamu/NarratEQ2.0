  <!-- ========== SUBSCRIBE STRIP ========== -->
  <section class="subscribe-strip" id="subscribe">
    <div class="container">
      <div>
        <h3>Get insights in your inbox</h3>
        <p>Monthly data updates and analysis on gender equality in Nigeria.</p>
      </div>
      <form class="subscribe-form" onsubmit="return false;">
        <input type="email" placeholder="Your email address" aria-label="Email address" required>
        <button type="submit">Subscribe <span aria-hidden="true">&rarr;</span></button>
      </form>
    </div>
  </section>

  <!-- ========== FOOTER ========== -->
  <footer class="site-footer">
    <div class="container">
      <p>&copy; <?php echo date('Y'); ?> NarratEQ &middot; A Gatefield Impact Foundation Project</p>
      <p><a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">Privacy Policy</a></p>
    </div>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>
