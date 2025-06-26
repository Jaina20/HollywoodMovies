jQuery(document).ready(function($) {
    function loadMovies(genre = '', search = '') {
        $.ajax({
            url: hwm_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'hwm_filter_movies',
                nonce: hwm_ajax.nonce,
                genre: genre,
                search: search
            },
            success: function(response) {
                $('#hwm-movies-grid').html(response.data);
            }
        });
    }

    // Initial load
    loadMovies();

    // Genre filter
    $('#hwm_genre_filter').on('change', function() {
        loadMovies($(this).val(), $('.hwm-search-form input[name="hwm_search"]').val());
    });

    // Search form
    $('.hwm-search-form').on('submit', function(e) {
        e.preventDefault();
        loadMovies($('#hwm_genre_filter').val(), $(this).find('input[name="hwm_search"]').val());
    });
});