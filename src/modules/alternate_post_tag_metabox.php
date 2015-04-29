<?php
function add_alt_post_tag_box() {
    add_meta_box('post_alternative_cat_tag', 'Alternate Post Tag/Category', 'post_tag_markup', 'post', 'side', 'high', null);
}
function post_tag_markup($object) {
    wp_nonce_field(basename(__FILE__), 'post_alternative_cat_tag_noncename');
    ?>
        <div>
            <input name="post_alternative_cat_tag" type="text" value="<?php echo get_post_meta($object->ID, 'post_alternative_cat_tag', true); ?>">
        </div>
    <?php
}
add_action('add_meta_boxes', 'add_alt_post_tag_box');
function save_alt_post_tag($post_id, $post, $update) {
    if (!isset($_POST['post_alternative_cat_tag_noncename']) || !wp_verify_nonce($_POST['post_alternative_cat_tag_noncename'], basename(__FILE__))) {
        return $post_id;
    }
    if(!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    $slug = 'post';
    if($slug != $post->post_type) {
        return $post_id;
    }
    $alt_tag = '';
    if(isset($_POST['post_alternative_cat_tag'])) {
        $alt_tag = $_POST['post_alternative_cat_tag'];
    }
    update_post_meta($post_id, 'post_alternative_cat_tag', $alt_tag);
}
add_action('save_post', 'save_alt_post_tag', 10, 3);