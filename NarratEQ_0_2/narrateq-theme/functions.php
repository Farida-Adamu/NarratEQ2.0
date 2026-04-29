<?php

function narrateq_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'narrateq_setup');

function narrateq_scripts() {
    wp_enqueue_style('narrateq-fonts', 'https://fonts.googleapis.com/css2?family=DM+Mono:ital,wght@0,400;0,500;1,400&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300;1,9..40,400&family=Playfair+Display:ital,wght@0,700;0,900;1,700;1,900&display=swap', array(), null);
    wp_enqueue_style('narrateq-style', get_stylesheet_uri(), array('narrateq-fonts'), '1.0');
    wp_enqueue_script('narrateq-main', get_template_directory_uri() . '/js/main.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'narrateq_scripts');

function narrateq_read_time($post_id = null) {
    $post_id = $post_id ?: get_the_ID();
    $content = get_post_field('post_content', $post_id);
    $word_count = str_word_count(strip_tags($content));
    $minutes = max(1, ceil($word_count / 250));
    return $minutes . ' min read';
}

function narrateq_sector_class($cat_slug) {
    if (strpos($cat_slug, 'political') !== false) return 'political';
    if (strpos($cat_slug, 'economic') !== false) return 'economic';
    if (strpos($cat_slug, 'budget') !== false) return 'budget';
    if (strpos($cat_slug, 'education') !== false) return 'education';
    if (strpos($cat_slug, 'health') !== false) return 'health';
    if (strpos($cat_slug, 'energy') !== false) return 'energy';
    return 'political';
}

function narrateq_insights_url() {
    $posts_page_id = get_option('page_for_posts');
    if ($posts_page_id) {
        return get_permalink($posts_page_id);
    }
    return home_url('/');
}

function narrateq_create_categories() {
    $categories = array(
        'Political Representation',
        'Economic Leadership',
        'Budget & Policy',
        'Education & STEM',
        'Health',
        'Energy',
    );
    foreach ($categories as $cat) {
        if (!term_exists($cat, 'category')) {
            wp_insert_term($cat, 'category');
        }
    }
}
add_action('after_switch_theme', 'narrateq_create_categories');

function narrateq_posts_per_page($query) {
    if (!is_admin() && $query->is_main_query() && is_home()) {
        $query->set('posts_per_page', 50);
    }
}
add_action('pre_get_posts', 'narrateq_posts_per_page');
