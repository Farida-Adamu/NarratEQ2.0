<?php get_header(); ?>

  <!-- ========== HERO ========== -->
  <section class="hero hero-compact">
    <div class="container">
      <p class="hero-label">Analysis &amp; Commentary</p>
      <h1>Insights</h1>
    </div>
  </section>

  <!-- ========== FILTER TABS ========== -->
  <section class="insights-filters">
    <div class="container">
      <div class="filter-tabs">
        <button class="filter-tab active" data-filter="all">All</button>
        <?php
        $sectors = get_categories(array(
            'hide_empty' => false,
            'exclude' => array(get_cat_ID('Uncategorized')),
            'orderby' => 'name',
            'order' => 'ASC',
        ));
        foreach ($sectors as $sector) :
            $sector_class = narrateq_sector_class($sector->slug);
        ?>
        <button class="filter-tab" data-filter="<?php echo esc_attr($sector_class); ?>"><?php echo esc_html($sector->name); ?></button>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ========== INSIGHTS LIST ========== -->
  <main class="insights-list-section">
    <div class="container">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post();
            $categories = get_the_category();
            $cat_name = !empty($categories) ? $categories[0]->name : 'Insight';
            $cat_slug = !empty($categories) ? $categories[0]->slug : '';
            $sector_class = narrateq_sector_class($cat_slug);
        ?>

      <article class="insight-row" data-sector="<?php echo esc_attr($sector_class); ?>">
        <div class="insight-row-content">
          <div class="insight-row-meta">
            <span class="sector-tag <?php echo esc_attr($sector_class); ?>"><?php echo esc_html($cat_name); ?></span>
            <span class="insight-row-date"><?php echo get_the_date('M j, Y'); ?></span>
          </div>
          <h2 class="insight-row-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <div class="insight-row-footer">
            <span class="insight-row-author">By <?php the_author(); ?></span>
            <span class="article-meta-dot">&middot;</span>
            <span><?php echo narrateq_read_time(); ?></span>
            <a href="<?php the_permalink(); ?>" class="stat-card-read">Read <span aria-hidden="true">&rarr;</span></a>
          </div>
        </div>
      </article>

        <?php endwhile; ?>
      <?php else : ?>
      <p style="text-align: center; color: var(--muted); padding: 60px 0;">No insights published yet. Check back soon.</p>
      <?php endif; ?>
    </div>
  </main>

<?php get_footer(); ?>
