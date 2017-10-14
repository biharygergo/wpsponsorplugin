<?php
/**
 * Plugin name: Sponsors Plugin
 * User: Competitor
 * Date: 9/28/2017
 * Time: 4:15 PM
 */

add_action('init', 'add_custom_type_sponsor');
/**
 * Register CPT `fe_recipe`
 */
function add_custom_type_sponsor()
{
    register_post_type('sponsor', array(
        'label' => 'Sponsors',
        'public' => true,
        'has_archive' => true,
    ));
}

function getSponsors()
{
    ?>
    <?php
    $query = new WP_Query(['post_type' => 'sponsor']);
    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

        <div class="sponsor-container">
            <img class="sponsor-image" src="<?= get_field('sponsor_image')?>">
        </div>

    <?php endwhile; endif; ?>
    <?php
}
add_shortcode('sponsors', 'getSponsors');