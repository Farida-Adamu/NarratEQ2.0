<?php get_header(); ?>

  <!-- ========== HERO ========== -->
  <section class="hero">
    <div class="container">
      <p class="hero-label">Nigeria's Gender Equality Data Lab</p>
      <h1>The data shaping<br><em>women's equality</em> in Nigeria.</h1>
      <p class="hero-description">NarratEQ consolidates gender equality data from credible Nigerian and global sources, so journalists, campaigners and policy advocates can find, use and cite the numbers that matter.</p>
      <div class="hero-actions">
        <a href="<?php echo esc_url(narrateq_insights_url()); ?>" class="btn btn-primary">Read Latest Insights</a>
      </div>
    </div>
  </section>

  <!-- ========== STATS BAR ========== -->
  <section class="stats-bar" aria-label="Key statistics">
    <div class="container">
      <div class="stat-item">
        <div class="stat-number">124th</div>
        <div class="stat-description">Global Gender Gap Rank</div>
        <div class="stat-source">WEF &middot; 2025</div>
      </div>
      <div class="stat-item">
        <div class="stat-number">4%</div>
        <div class="stat-description">Women in Parliament</div>
        <div class="stat-source">INEC &middot; 2025</div>
      </div>
      <div class="stat-item">
        <div class="stat-number">8%</div>
        <div class="stat-description">Women Cabinet Ministers</div>
        <div class="stat-source">UN Women &middot; 2025</div>
      </div>
      <div class="stat-item">
        <div class="stat-number">0 of 36</div>
        <div class="stat-description">Women State Governors</div>
        <div class="stat-source">INEC &middot; 2025</div>
      </div>
      <div class="stat-item">
        <div class="stat-number">29%</div>
        <div class="stat-description">Women in C-Suite Roles</div>
        <div class="stat-source">WILAN &middot; 2025</div>
      </div>
    </div>
  </section>

  <!-- ========== LATEST INSIGHTS ========== -->
  <main class="latest-insights-section">
    <div class="container">
      <h2 class="latest-insights-heading">Latest Insights</h2>

      <div class="insights-list-compact">
        <?php
        $latest = new WP_Query(array(
            'posts_per_page' => 3,
            'post_status' => 'publish',
        ));

        if ($latest->have_posts()) :
            while ($latest->have_posts()) : $latest->the_post();
                $categories = get_the_category();
                $cat_name = !empty($categories) ? $categories[0]->name : 'Insight';
                $cat_slug = !empty($categories) ? $categories[0]->slug : '';
                $sector_class = narrateq_sector_class($cat_slug);
        ?>

        <article class="insight-row">
          <div class="insight-row-content">
            <div class="insight-row-meta">
              <span class="sector-tag <?php echo esc_attr($sector_class); ?>"><?php echo esc_html($cat_name); ?></span>
              <span class="insight-row-date"><?php echo get_the_date('M j, Y'); ?></span>
            </div>
            <h3 class="insight-row-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="insight-row-footer">
              <span class="insight-row-author">By <?php the_author(); ?></span>
              <span class="article-meta-dot">&middot;</span>
              <span><?php echo narrateq_read_time(); ?></span>
              <a href="<?php the_permalink(); ?>" class="stat-card-read">Read <span aria-hidden="true">&rarr;</span></a>
            </div>
          </div>
        </article>

        <?php
            endwhile;
            wp_reset_postdata();
        else :
        ?>
        <p style="text-align: center; color: var(--muted); padding: 40px 0;">No insights published yet.</p>
        <?php endif; ?>
      </div>

      <div class="view-all-link">
        <a href="<?php echo esc_url(narrateq_insights_url()); ?>" class="btn btn-outline-dark">View All Insights <span aria-hidden="true">&rarr;</span></a>
      </div>

    </div>
  </main>

<?php get_footer(); ?>
