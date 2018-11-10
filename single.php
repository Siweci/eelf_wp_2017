<?php get_header(); ?>

<?php
$post_categories = get_the_category();


$current_category = $post_categories[0];
$current_category_slug = $current_category->slug;

get_template_part ( 'singles/single', $current_category_slug );
?>

<?php get_footer();