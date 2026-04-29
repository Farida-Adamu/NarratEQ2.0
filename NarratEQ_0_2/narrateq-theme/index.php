<?php get_header(); ?>

  <main class="insights-list-section">
    <div class="container">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <article class="insight-row">
          <div class="insight-row-content">
            <h2 class="insight-row-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="insight-row-footer">
              <span class="insight-row-date"><?php echo get_the_date('M j, Y'); ?></span>
              <a href="<?php the_permalink(); ?>" class="stat-card-read">Read <span aria-hidden="true">&rarr;</span></a>
            </div>
          </div>
        </article>
        <?php endwhile; ?>
      <?php else : ?>
        <p style="text-align: center; color: var(--muted); padding: 60px 0;">Nothing found.</p>
      <?php endif; ?>
    </div>
  </main>

<?php get_footer(); ?>
