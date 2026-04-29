<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

  <!-- ========== NAVIGATION ========== -->
  <nav class="main-nav" role="navigation">
    <div class="container">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-logo">
        <span class="nav-logo-name">NarratEQ</span>
        <span class="nav-logo-sub">By Gatefield</span>
      </a>

      <div class="nav-links">
        <a href="<?php echo esc_url(home_url('/')); ?>"<?php if (is_front_page()) echo ' class="active"'; ?>>Home</a>
        <a href="<?php echo esc_url(narrateq_insights_url()); ?>"<?php if (is_home() || is_single() || is_category()) echo ' class="active"'; ?>>Insights</a>
        <a href="#subscribe" class="nav-cta">Get Updates <span aria-hidden="true">&rarr;</span></a>
      </div>

      <button class="nav-hamburger" aria-label="Open menu" aria-expanded="false">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>
  </nav>

  <!-- Mobile Nav Overlay -->
  <div class="mobile-nav-overlay">
    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
    <a href="<?php echo esc_url(narrateq_insights_url()); ?>">Insights</a>
    <a href="#subscribe" class="nav-cta">Get Updates <span aria-hidden="true">&rarr;</span></a>
  </div>
