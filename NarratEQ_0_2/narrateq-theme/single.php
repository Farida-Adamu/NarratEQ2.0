<?php get_header(); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post();
      $categories = get_the_category();
      $cat_name = !empty($categories) ? $categories[0]->name : 'Insight';
      $cat_slug = !empty($categories) ? $categories[0]->slug : '';
      $sector_class = narrateq_sector_class($cat_slug);
      $author_initials = mb_substr(get_the_author_meta('first_name'), 0, 1) . mb_substr(get_the_author_meta('last_name'), 0, 1);
      if (empty(trim($author_initials))) {
          $author_initials = mb_strtoupper(mb_substr(get_the_author(), 0, 2));
      }
  ?>

  <!-- ========== ARTICLE HERO ========== -->
  <section class="article-hero">
    <div class="container">
      <div class="article-hero-inner">
        <a href="<?php echo esc_url(narrateq_insights_url()); ?>" class="article-breadcrumb">&larr; Back to Insights</a>
        <span class="sector-tag <?php echo esc_attr($sector_class); ?>"><?php echo esc_html($cat_name); ?></span>
        <h1><?php the_title(); ?></h1>
        <?php if (has_excerpt()) : ?>
        <p class="article-hero-excerpt"><?php echo esc_html(get_the_excerpt()); ?></p>
        <?php endif; ?>
        <div class="article-meta">
          <div class="article-meta-author">
            <div class="article-author-avatar"><?php echo esc_html($author_initials); ?></div>
            <div>
              <span class="article-author-name"><?php the_author(); ?></span>
              <?php
              $author_role = get_the_author_meta('description');
              if ($author_role) : ?>
              <span class="article-author-role"><?php echo esc_html($author_role); ?></span>
              <?php endif; ?>
            </div>
          </div>
          <div class="article-meta-details">
            <span><?php echo get_the_date('F j, Y'); ?></span>
            <span class="article-meta-dot">&middot;</span>
            <span><?php echo narrateq_read_time(); ?></span>
          </div>
        </div>
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
