<?php
/*
Plugin Name: Custom Post Type
Version: 1.1
*/
if (!defined('ABSPATH')) {
    exit;
}

function hwm_register_movie_post_type()
{
    $labels = array(
        'name' => 'Movies',
        'singular_name' => 'Movie',
        'menu_name' => 'Hollywood Movies',
        'add_new' => 'Add New Movie',
        'add_new_item' => 'Add New Movie',
        'edit_item' => 'Edit Movie',
        'new_item' => 'New Movie',
        'view_item' => 'View Movie',
        'search_items' => 'Search Movies',
        'not_found' => 'No movies found',
        'not_found_in_trash' => 'No movies found in Trash',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'thumbnail', 'editor'),
        'menu_icon' => 'dashicons-video-alt3',
        'show_in_rest' => true,
    );

    register_post_type('hwm_movie', $args);
}
add_action('init', 'hwm_register_movie_post_type');

// Register Taxonomy for Genre
function hwm_register_genre_taxonomy()
{
    $labels = array(
        'name' => 'Genres',
        'singular_name' => 'Genre',
        'search_items' => 'Search Genres',
        'all_items' => 'All Genres',
        'edit_item' => 'Edit Genre',
        'update_item' => 'Update Genre',
        'add_new_item' => 'Add New Genre',
        'new_item_name' => 'New Genre Name',
        'menu_name' => 'Genres',
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'show_in_rest' => true,
    );

    register_taxonomy('hwm_genre', 'hwm_movie', $args);
}
add_action('init', 'hwm_register_genre_taxonomy');

// Add Meta Boxes
function hwm_add_meta_boxes()
{
    add_meta_box(
        'hwm_movie_details',
        'Movie Details',
        'hwm_movie_details_callback',
        'hwm_movie',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'hwm_add_meta_boxes');

function hwm_movie_details_callback($post)
{
    wp_nonce_field('hwm_save_movie_details', 'hwm_movie_nonce');
    $actors = get_post_meta($post->ID, '_hwm_actors', true);
    $country = get_post_meta($post->ID, '_hwm_country', true);
    $rating = get_post_meta($post->ID, '_hwm_rating', true);
    $imdb_stars = get_post_meta($post->ID, '_hwm_imdb_stars', true);
?>
    <p>
        <label for="hwm_actors">Actors:</label><br>
        <input type="text" id="hwm_actors" name="hwm_actors" value="<?php echo esc_attr($actors); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="hwm_country">Country of Production:</label><br>
        <input type="text" id="hwm_country" name="hwm_country" value="<?php echo esc_attr($country); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="hwm_rating">Rating (e.g., PG-13, R):</label><br>
        <input type="text" id="hwm_rating" name="hwm_rating" value="<?php echo esc_attr($rating); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="hwm_imdb_stars">IMDb Stars (e.g., 7.5):</label><br>
        <input type="text" id="hwm_imdb_stars" name="hwm_imdb_stars" value="<?php echo esc_attr($imdb_stars); ?>" style="width: 100%;">
    </p>
<?php
}

// Save Meta Box Data
function hwm_save_movie_details($post_id)
{
    if (!isset($_POST['hwm_movie_nonce']) || !wp_verify_nonce($_POST['hwm_movie_nonce'], 'hwm_save_movie_details')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $fields = ['hwm_actors', 'hwm_country', 'hwm_rating', 'hwm_imdb_stars'];
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'hwm_save_movie_details');

// Enqueue Bootstrap and Custom Scripts
function hwm_enqueue_scripts()
{
    if (!is_admin()) {
        wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
        wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array(), null, true);
        wp_enqueue_style('hwm-styles', plugin_dir_url(__FILE__) . 'css/hwm-styles.css');
        wp_enqueue_script('hwm-scripts', plugin_dir_url(__FILE__) . 'js/hwm-scripts.js', array('jquery'), null, true);
        wp_localize_script('hwm-scripts', 'hwm_ajax', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('hwm_filter_nonce')
        ));
    }
}
add_action('wp_enqueue_scripts', 'hwm_enqueue_scripts');

// Shortcode to Display Movies
function hwm_movies_shortcode($atts)
{
    ob_start();
?>
    <div class="hwm-movies-container">

        <div class=" d-flex align-items-center  mb-4 ">
            <form class="d-flex md:flex-column hwm-search-form mx-auto " method="GET">
                <input type="text" name="hwm_search" placeholder="Rechercher un film..." class="form-control d-inline-block w-50">
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </form>
            <div>
                <select id="hwm_genre_filter" class="form-select d-inline-block ">
                    <option value="">Tous genres</option>
                    <?php
                    $genres = get_terms(array('taxonomy' => 'hwm_genre', 'hide_empty' => false));
                    foreach ($genres as $genre) {
                        echo '<option value="' . esc_attr($genre->slug) . '">' . esc_html($genre->name) . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div id="hwm-movies-grid" class="row"></div>
    </div>
<?php
    return ob_get_clean();
}
add_shortcode('hollywood_movies', 'hwm_movies_shortcode');

function hwm_single_movie_shortcode($atts)
{
    $atts = shortcode_atts(array(
        'id' => 0,
    ), $atts, 'hollywood_movie');

    // Check if movie_id is in the URL
    $movie_id = !empty($_GET['movie_id']) ? absint($_GET['movie_id']) : $atts['id'];

    if (!$movie_id) {
        return '<p>Please provide a valid movie ID.</p>';
    }

    $movie = get_post($movie_id);
    if (!$movie || $movie->post_type !== 'hwm_movie') {
        return '<p>Movie not found.</p>';
    }

    ob_start();
?>
    <div class="hwm-single-movie card mb-4" style="max-width: 540px; margin: auto;">
        <?php if (has_post_thumbnail($movie->ID)) : ?>
            <img src="<?php echo get_the_post_thumbnail_url($movie->ID, 'medium'); ?>" class="card-img-top" alt="<?php echo esc_attr($movie->post_title); ?>">
        <?php endif; ?>
        <div class="card-body">
            <h5 class="card-title"><?php echo esc_html($movie->post_title); ?></h5>
            <p class="card-text"><?php echo wp_trim_words($movie->post_content, 20); ?></p>
            <p><strong>Actors:</strong> <?php echo esc_html(get_post_meta($movie->ID, '_hwm_actors', true)); ?></p>
            <p><strong>Country:</strong> <?php echo esc_html(get_post_meta($movie->ID, '_hwm_country', true)); ?></p>
            <p><strong>Rating:</strong> <?php echo esc_html(get_post_meta($movie->ID, '_hwm_rating', true)); ?></p>
            <p><strong>IMDb Stars:</strong> <?php echo esc_html(get_post_meta($movie->ID, '_hwm_imdb_stars', true)); ?></p>
            <p><strong>Genre:</strong> <?php echo get_the_term_list($movie->ID, 'hwm_genre', '', ', '); ?></p>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('hollywood_movie', 'hwm_single_movie_shortcode');

function hwm_filter_movies()
{
    check_ajax_referer('hwm_filter_nonce', 'nonce');

    $genre = isset($_POST['genre']) ? sanitize_text_field($_POST['genre']) : '';
    $search = isset($_POST['search']) ? sanitize_text_field($_POST['search']) : '';

    $args = array(
        'post_type' => 'hwm_movie',
        'posts_per_page' => -1,
    );

    if (!empty($genre)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'hwm_genre',
                'field' => 'slug',
                'terms' => $genre,
            ),
        );
    }

    if (!empty($search)) {
        $args['s'] = $search;
    }

    $query = new WP_Query($args);
    ob_start();
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $movie_id = get_the_ID();
            $details_page = home_url('/details-du-film/?movie_id=' . $movie_id);
    ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <a href="<?php echo esc_url($details_page); ?>" class="text-decoration-none">
                    <div class="card h-100">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php the_title(); ?></h5>
                            <p class="card-text"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                            <p><strong>Actors:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_hwm_actors', true)); ?></p>
                            <p><strong>Country:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_hwm_country', true)); ?></p>
                            <p><strong>Rating:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_hwm_rating', true)); ?></p>
                            <p><strong>IMDb Stars:</strong> <?php echo esc_html(get_post_meta(get_the_ID(), '_hwm_imdb_stars', true)); ?></p>
                            <p><strong>Genre:</strong> <?php echo get_the_term_list(get_the_ID(), 'hwm_genre', '', ', '); ?></p>
                        </div>
                    </div>
                </a>
            </div>
<?php
        }
    } else {
        echo '<p>No movies found.</p>';
    }
    wp_reset_postdata();
    $output = ob_get_clean();
    wp_send_json_success($output);
}
add_action('wp_ajax_hwm_filter_movies', 'hwm_filter_movies');
add_action('wp_ajax_nopriv_hwm_filter_movies', 'hwm_filter_movies');

?>