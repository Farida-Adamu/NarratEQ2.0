<?php get_header(); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post();
      $categories = get_the_category();
      $cat_name = !empty($categories) ? $categories[0]->name : 'Insight';
      $cat_slug = !empty($categories) ? $categories[0]->slug : '';
      $sector_class = narrateq_sector_class($cat_slug);
  ?>

  <!-- ========== ARTICLE HERO ========== -->
  <section class="hero hero-compact">
    <div class="container">
      <div class="insight-row-meta" style="margin-bottom: 16px;">
        <span class="sector-tag <?php echo esc_attr($sector_class); ?>"><?php echo esc_html($cat_name); ?></span>
        <span class="insight-row-date"><?php echo get_the_date('M j, Y'); ?></span>
      </div>
      <h1><?php the_title(); ?></h1>
      <div class="insight-row-footer" style="margin-top: 16px;">
        <span class="insight-row-author">By <?php the_author(); ?></span>
        <span class="article-meta-dot">&middot;</span>
        <span><?php echo narrateq_read_time(); ?></span>
      </div>
    </div>
  </section>

  <!-- ========== ARTICLE CONTENT ========== -->
  <main class="article-content">
    <div class="container">
      <div class="article-body">
        <?php the_content(); ?>
      </div>
    </div>
  </main>

  <?php endwhile; endif; ?>

<?php get_footer(); ?>
