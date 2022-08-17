<?php add_action('init', 'Team');
function Team()
{
    $labels = array(
        'name' => 'Team',
        'singular_name' => 'Member of team',
        'add_new' => 'Add member team',
        'add_new_item' => 'Add Member of team',
        'edit_item' => 'Edit team',
        'new_item' => 'New Member of team',
        'view_item' => 'See Member of team',
        'search_items' => 'Found member of team',
        'not_found' =>  'team not found',
        'not_found_in_trash' => 'custom post not found in trash',
        'parent_item_colon' => '',
        'menu_name' => 'Team'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail', 'comments'),
        'taxonomies' => array('team_tag')
        // 'taxonomies' => array('team_')
    );
    register_post_type('team', $args);
}
add_action('init', 'create_team_taxonomies', 0);
function create_team_taxonomies()
{
    $labels = array(
        'name' => _x('Type custom post', 'taxonomy general name'),
        'singular_name' => _x('Type custom post', 'taxonomy singular name'),
        'search_items' =>  __('Find Type custom post'),
        'all_items' => __('All categories custom post'),
        'parent_item' => __('Parent Type custom post'),
        'parent_item_colon' => __('Parent Type'),
        'edit_item' => __('Edit parent Type custom post'),
        'update_item' => __('Update parent Type custom post'),
        'add_new_item' => __('Add parent Type custom post'),
        'new_item_name' => __('Title of new Type custom post'),
        'menu_name' => __('Type custom post'),
    );

    register_taxonomy('team_tag', array('team'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'team'),
    ));
}

add_action('add_meta_boxes', 'team_meta_box');
function team_meta_box()
{
    add_meta_box(
        'team_meta_box',
        'Member teams detailes',
        'show_team_metabox',
        'team',
        'normal',
        'high'
    );
    remove_meta_box('expirationdatediv', 'team', 'side');
}
$team_meta_fields = array(
    array(
        'label' => 'Position',
        'desc'  => '',
        'id'    => 'member_position',
        'type'  => 'text'
    ),

    array(
        'label' => 'E-mail',
        'desc'  => '',
        'id'    => 'member_email',
        'type'  => 'text'
    ),

    array(
        'label' => 'Facebook',
        'desc'  => '',
        'id'    => 'member_fb',
        'type'  => 'text'
    ),
    array(
        'label' => 'Instagramm',
        'desc'  => '',
        'id'    => 'member_inst',
        'type'  => 'text'
    ),

    array(
        'label' => 'telegramm',
        'desc'  => '',
        'id'    => 'member_telegramm',
        'type'  => 'text'
    ),
    array(
        'label' => 'Wiki',
        'desc'  => '',
        'id'    => 'wiki', // даем идентификатор.
        'type'  => 'text'  // Указываем тип поля.
    )
);

function show_team_metabox()
{
    global $team_meta_fields;
    //print_r($specialty_meta_fields);
    global $post;
    echo '<input type="hidden" name="custom_meta_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';

    echo '<table class="form-table">';
    foreach ($team_meta_fields as $field) {
        $meta = get_post_meta($post->ID, $field['id'], true);
        echo '
        <tr>
            <th><label for="' . $field['id'] . '">' . $field['label'] . '</label></th>
            <td>';
        switch ($field['type']) {
            case 'checkbox':
                echo '
            <input type="checkbox" name="' . $field['id'] . '" id="' . $field['id'] . '" ', $meta ? ' checked="checked"' : '', '/>
            <label for="' . $field['id'] . '">' . $field['desc'] . '</label>';
                echo $meta;
                break;
            case 'text':
                echo '
            <input type="text" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . $meta . '" size="30" />
            <br /><span class="description">' . $field['desc'] . '</span>';
                break;

            case 'file': { ?>
                    <div>
                        <a style="display:<?= $meta ? 'inline' : 'none' ?>" href="<?= $meta ?>" class="custom_file_prev"><?= $meta ?></a>
                        <button style="display:block;margin:5px 0" class="custom_upload_file_button button">Выберите файл</button>
                        <input type="hidden" name="<?= $field['id'] ?>" id="<?= $field['id'] ?>" value="<?= $meta ?>" />
                        <a style="display:<?= $meta ? 'inline' : 'none' ?>" href="#" class="custom_clear_file_button">Убрать файл</a>
                        <br clear="all" /><span class="description"><?= $field['desc'] ?></span>
                    </div>

                    <script type="text/javascript">
                        jQuery(function($) {
                            /*
                             * Select/Upload image(s) event
                             */
                            $('body').on('click', '.custom_upload_file_button', function(e) {
                                e.preventDefault();

                                var button = $(this),
                                    custom_uploader = wp.media({
                                        title: 'Add file',
                                        library: {
                                            //type: 'pdf'
                                        },
                                        button: {
                                            text: 'Add' // button label text
                                        },
                                        multiple: false // for multiple image selection set to true
                                    }).on('select', function() { // it also has "open" and "close" events 
                                        var attachment = custom_uploader.state().get('selection').first().toJSON();
                                        $(button).prev().attr('href', attachment.url).html(attachment.url).show();
                                        $(button).next().val(attachment.url);
                                        $(button).next().next().show();
                                    })
                                    .open();
                            });

                            $('body').on('click', '.custom_clear_file_button', function(e) {
                                e.preventDefault();
                                $(this).prev().prev().prev().hide();
                                $(this).prev().val('');
                                $(this).hide();
                            });
                        });
                    </script>

<?php break;
                }
        }
        echo '</td></tr>';
    }
    echo '</table>';
}
function save_team_meta_fields($post_id)
{
    global $team_meta_fields;
    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))
        return $post_id;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    if ('team' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return $post_id;
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    foreach ($team_meta_fields as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];

        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
}
add_action('save_post', 'save_team_meta_fields');

##Структура факультета шорткода
add_shortcode('team', 'team_members');
function team_members($out)
{
    $out = '';

    $true_args = array('post_type' => 'team', 'posts_per_page' => -1, 'order' => 'ASC');

    $loop = new WP_Query($true_args);
    if ($loop->have_posts()) :
        while ($loop->have_posts()) : $loop->the_post();
            get_template_part('loop-team');
        endwhile;
    endif;
    wp_reset_postdata();
    return $out;
}
