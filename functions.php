<?php
function blenheim_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    // Add support for HTML5 markup
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
}
add_action('after_setup_theme', 'blenheim_theme_setup');

function blenheim_theme_scripts() {
    // External styles
    wp_enqueue_style('overlayscrollbars', 'https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/2.10.0/styles/overlayscrollbars.min.css', array(), '2.10.0');
    wp_enqueue_style('slick-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css', array(), '1.9.0');
    
    // Theme styles
    // wp_enqueue_style('blenheim-os-theme', get_template_directory_uri() . '/css/os-theme-thin-dark.css', array(), '1.0.0');
    wp_enqueue_style('blenheim-style', get_stylesheet_uri(), array(), '12.0.0');

    // Scripts
    // WP includes jquery by default, but we can enqueue it specifically if needed.
    wp_enqueue_script('jquery');
    wp_enqueue_script('lenis', 'https://unpkg.com/lenis@1.1.16/dist/lenis.min.js', array(), '1.1.16', true);
    wp_enqueue_script('overlayscrollbars-js', 'https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/2.10.0/browser/overlayscrollbars.browser.es6.min.js', array(), '2.10.0', true);
    wp_enqueue_script('slick-carousel-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array('jquery'), '1.9.0', true);
    // wp_enqueue_script('cookieyes', 'https://cdn-cookieyes.com/client_data/713d9362df39974af52bf3a1/script.js', array(), null, true);
    
    // Custom JS
    // wp_enqueue_script('blenheim-js', get_template_directory_uri() . '/js/javascript.js', array('jquery', 'lenis', 'overlayscrollbars-js', 'slick-carousel-js'), '12.0.0', true);
}
add_action('wp_enqueue_scripts', 'blenheim_theme_scripts');

function custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Định nghĩa các ACF fields (Advanced Custom Fields)
if( function_exists('acf_add_local_field_group') ):

    // Cài đặt Trang chủ (Front Page)
    acf_add_local_field_group(array(
        'key' => 'group_front_page_settings',
        'title' => 'Cài đặt Trang chủ (Blog Layout)',
        'fields' => array(
            array(
                'key' => 'field_blog_title',
                'label' => 'Tiêu đề Hero',
                'name' => 'blog_title',
                'type' => 'text',
                'default_value' => '<span class="font-italic">Blog của</span> chúng tôi',
            ),
            array(
                'key' => 'field_blog_description',
                'label' => 'Mô tả Hero',
                'name' => 'blog_description',
                'type' => 'textarea',
                'default_value' => 'Cập nhật những tin tức mới nhất về mua, bán, xây dựng nhà cửa và các thông tin từ chúng tôi.',
            ),
            array(
                'key' => 'field_selected_articles',
                'label' => 'Chọn bài viết nổi bật (Nếu bỏ trống sẽ hiển thị bài viết mới nhất)',
                'name' => 'selected_articles',
                'type' => 'relationship',
                'post_type' => array('post'),
                'return_format' => 'id',
            ),
            // CTA 1
            array(
                'key' => 'field_cta_1_title',
                'label' => 'Tiêu đề CTA 1 (Mua)',
                'name' => 'cta_1_title',
                'type' => 'text',
                'default_value' => 'Bạn muốn <em class="font-italic">Mua</em><br />nhà?',
            ),
            array(
                'key' => 'field_cta_1_link',
                'label' => 'Link CTA 1',
                'name' => 'cta_1_link',
                'type' => 'text',
                'default_value' => '/buy',
            ),
            array(
                'key' => 'field_cta_1_text',
                'label' => 'Nút CTA 1',
                'name' => 'cta_1_text',
                'type' => 'text',
                'default_value' => 'Khám phá ngay',
            ),
            array(
                'key' => 'field_cta_1_image',
                'label' => 'Ảnh nền CTA 1',
                'name' => 'cta_1_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            // CTA 2
            array(
                'key' => 'field_cta_2_title',
                'label' => 'Tiêu đề CTA 2 (Bán)',
                'name' => 'cta_2_title',
                'type' => 'text',
                'default_value' => 'Bạn muốn <em class="font-italic">Bán</em><br />nhà?',
            ),
            array(
                'key' => 'field_cta_2_link',
                'label' => 'Link CTA 2',
                'name' => 'cta_2_link',
                'type' => 'text',
                'default_value' => '/request-a-valuation',
            ),
            array(
                'key' => 'field_cta_2_text',
                'label' => 'Nút CTA 2',
                'name' => 'cta_2_text',
                'type' => 'text',
                'default_value' => 'Yêu cầu định giá',
            ),
            array(
                'key' => 'field_cta_2_image',
                'label' => 'Ảnh nền CTA 2',
                'name' => 'cta_2_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            // CTA 3
            array(
                'key' => 'field_cta_3_title',
                'label' => 'Tiêu đề CTA 3 (Xây)',
                'name' => 'cta_3_title',
                'type' => 'text',
                'default_value' => 'Bạn muốn <em class="font-italic">Xây</em><br />nhà?',
            ),
            array(
                'key' => 'field_cta_3_link',
                'label' => 'Link CTA 3',
                'name' => 'cta_3_link',
                'type' => 'text',
                'default_value' => '/build-and-developments#contact',
            ),
            array(
                'key' => 'field_cta_3_text',
                'label' => 'Nút CTA 3',
                'name' => 'cta_3_text',
                'type' => 'text',
                'default_value' => 'Đặt lịch tư vấn',
            ),
            array(
                'key' => 'field_cta_3_image',
                'label' => 'Ảnh nền CTA 3',
                'name' => 'cta_3_image',
                'type' => 'image',
                'return_format' => 'url',
            ),
            // Header & Footer
            array(
                'key' => 'field_header_phone',
                'label' => 'Số điện thoại',
                'name' => 'header_phone',
                'type' => 'text',
                'default_value' => '+44 (0)114 358 2020',
            ),
            array(
                'key' => 'field_footer_email',
                'label' => 'Email',
                'name' => 'footer_email',
                'type' => 'text',
                'default_value' => 'enquiries@blenheim.co.uk',
            ),
            array(
                'key' => 'field_footer_address',
                'label' => 'Địa chỉ (Footer)',
                'name' => 'footer_address',
                'type' => 'textarea',
                'default_value' => 'Old Station Drive, Millhouses, Sheffield, S7 2PY',
            ),
            array(
                'key' => 'field_social_facebook',
                'label' => 'Link Facebook',
                'name' => 'social_facebook',
                'type' => 'url',
                'default_value' => 'https://www.facebook.com/BlenheimProperties',
            ),
            array(
                'key' => 'field_social_instagram',
                'label' => 'Link Instagram',
                'name' => 'social_instagram',
                'type' => 'url',
                'default_value' => 'https://instagram.com/blenheimhomesland/',
            ),
            array(
                'key' => 'field_social_linkedin',
                'label' => 'Link LinkedIn',
                'name' => 'social_linkedin',
                'type' => 'url',
                'default_value' => 'https://www.linkedin.com/company/blenheim-property/',
            ),
            array(
                'key' => 'field_footer_col_1_info',
                'label' => 'Thông tin công ty (Cột 1)',
                'name' => 'footer_col_1_info',
                'type' => 'wysiwyg',
                'default_value' => '<p class="font-bold mb-4 uppercase text-base">CÔNG TY TNHH CHĂM SÓC MẸ VÀ BÉ TẠI NHÀ HOME CARE</p><p class="mb-2">Địa chỉ: 20 Huy Du, Phường Từ Liêm, TP Hà Nội, Việt Nam.</p><p class="mb-2">Tổng đài hỗ trợ: 1900 0387</p><p class="mb-2">Hotline: 0973871376 - 0962131515</p><p class="mb-2">Email: cskh@homegroups.vn</p><p class="mb-2">Mã số doanh nghiệp: 0107375668 do Sở Kế hoạch &amp; Đầu tư TP Hà Nội cấp lần đầu ngày 29/03/2016</p>',
            ),
            array(
                'key' => 'field_footer_col_2_links',
                'label' => 'Links: Về Homecare (Cột 2)',
                'name' => 'footer_col_2_links',
                'type' => 'repeater',
                'layout' => 'table',
                'sub_fields' => array(
                    array(
                        'key' => 'field_footer_col_2_title',
                        'label' => 'Tiêu đề',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_footer_col_2_url',
                        'label' => 'Link',
                        'name' => 'url',
                        'type' => 'text',
                    ),
                ),
            ),
            array(
                'key' => 'field_footer_col_3_links',
                'label' => 'Links: Chính sách (Cột 3)',
                'name' => 'footer_col_3_links',
                'type' => 'repeater',
                'layout' => 'table',
                'sub_fields' => array(
                    array(
                        'key' => 'field_footer_col_3_title',
                        'label' => 'Tiêu đề',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_footer_col_3_url',
                        'label' => 'Link',
                        'name' => 'url',
                        'type' => 'text',
                    ),
                ),
            ),
            array(
                'key' => 'field_footer_col_4_links',
                'label' => 'Links: Liên kết nhanh (Cột 4)',
                'name' => 'footer_col_4_links',
                'type' => 'repeater',
                'layout' => 'table',
                'sub_fields' => array(
                    array(
                        'key' => 'field_footer_col_4_title',
                        'label' => 'Tiêu đề',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_footer_col_4_url',
                        'label' => 'Link',
                        'name' => 'url',
                        'type' => 'text',
                    ),
                ),
            ),
            array(
                'key' => 'field_footer_copyright',
                'label' => 'Dòng Copyright',
                'name' => 'footer_copyright',
                'type' => 'text',
                'default_value' => '&copy; 2026 BP Estates 12592062 | BP Developments 04969547',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
    ));
    
    // Cài đặt Ảnh bài viết (Post)
    acf_add_local_field_group(array(
        'key' => 'group_post_settings',
        'title' => 'Cài đặt Bài viết',
        'fields' => array(
            array(
                'key' => 'field_article_image',
                'label' => 'Ảnh bìa dọc (Article Image)',
                'name' => 'article_image',
                'type' => 'image',
                'return_format' => 'url',
                'instructions' => 'Dùng để hiển thị ở ngoài trang chủ thay cho Ảnh đại diện (Thumbnail)',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
        ),
    ));
    
endif;



// Vô hiệu hóa Elementor Pro Theme Builder Header/Footer/Single/Archive để ưu tiên của Theme
add_action( 'elementor/theme/register_locations', function( $location_manager ) {
    if ( method_exists( $location_manager, 'remove_location' ) ) {
        $location_manager->remove_location( 'header' );
        $location_manager->remove_location( 'footer' );
        $location_manager->remove_location( 'single' );
        $location_manager->remove_location( 'archive' );
    }
}, 100 );

// Force single.php cho các bài viết, loại bỏ bất kỳ ghi đè nào từ Elementor
add_filter( 'template_include', function( $template ) {
    if ( is_singular( 'post' ) ) {
        return get_stylesheet_directory() . '/single.php';
    }
    return $template;
}, 9999 );

// Hoặc cách mạnh nhất là tháo hook get_header/get_footer của Elementor Pro:
add_action( 'wp', function() {
    if ( class_exists( '\ElementorPro\Plugin' ) ) {
        $theme_builder = \ElementorPro\Plugin::instance()->modules_manager->get_modules( 'theme-builder' );
        if ( $theme_builder && isset($theme_builder->classes['locations_manager']) ) {
            $locations_manager = $theme_builder->get_locations_manager();
            if ($locations_manager) {
                remove_action( 'get_header', [ $locations_manager, 'get_header' ] );
                remove_action( 'get_footer', [ $locations_manager, 'get_footer' ] );
            }
        }
    }
}, 20 );

// Một số bản Elementor cũ dùng \ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager
add_action( 'get_header', function() {
    if ( class_exists( '\ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager' ) ) {
        remove_all_actions( 'get_header' );
    }
}, 1 );
add_action( 'get_footer', function() {
    if ( class_exists( '\ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager' ) ) {
        remove_all_actions( 'get_footer' );
    }
}, 1 );

// --- TỐI ƯU HÓA HIỆU SUẤT (LIGHTHOUSE) ---

// 1. Thêm thuộc tính defer cho tất cả các script để tránh chặn render
function hc_defer_scripts( $tag, $handle, $src ) {
    // Không can thiệp vào các script trong trang quản trị (wp-admin) để tránh lỗi Editor và Plugin (như Yoast)
    if ( is_admin() ) {
        return $tag;
    }
    
    // Các script không nên defer (nếu có)
    $exclude = array( 'jquery', 'jquery-core', 'jquery-migrate' );
    if ( in_array( $handle, $exclude ) ) {
        return $tag;
    }
    // Nếu script đã có defer hoặc async thì bỏ qua
    if ( strpos( $tag, 'defer' ) !== false || strpos( $tag, 'async' ) !== false ) {
        return $tag;
    }
    return str_replace( ' src', ' defer="defer" src', $tag );
}
add_filter( 'script_loader_tag', 'hc_defer_scripts', 10, 3 );

// 2. Xóa query strings khỏi CSS và JS để tăng khả năng cache
function hc_remove_script_version( $src ){
    if ( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'hc_remove_script_version', 15, 1 );
add_filter( 'script_loader_src', 'hc_remove_script_version', 15, 1 );

// --- TÍNH NĂNG NHÂN BẢN BÀI VIẾT (CLONE POST) ---
function hc_duplicate_post_link( $actions, $post ) {
    if ( current_user_can( 'edit_posts' ) ) {
        $actions['duplicate'] = '<a href="' . wp_nonce_url( 'admin.php?action=hc_duplicate_post_as_draft&post=' . $post->ID, basename( __FILE__ ), 'duplicate_nonce' ) . '" title="Nhân bản bài viết này" rel="permalink">Clone</a>';
    }
    return $actions;
}
add_filter( 'post_row_actions', 'hc_duplicate_post_link', 10, 2 );
add_filter( 'page_row_actions', 'hc_duplicate_post_link', 10, 2 );

function hc_duplicate_post_as_draft() {
    global $wpdb;
    if ( ! ( isset( $_GET['post'] ) || isset( $_POST['post'] ) || ( isset( $_REQUEST['action'] ) && 'hc_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
        wp_die( 'Không tìm thấy bài viết để nhân bản!' );
    }

    if ( ! isset( $_GET['duplicate_nonce'] ) || ! wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) ) {
        return;
    }

    $post_id = ( isset( $_GET['post'] ) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
    $post = get_post( $post_id );
    $current_user = wp_get_current_user();
    $new_post_author = $current_user->ID;

    if ( isset( $post ) && $post != null ) {
        $args = array(
            'comment_status' => $post->comment_status,
            'ping_status'    => $post->ping_status,
            'post_author'    => $new_post_author,
            'post_content'   => $post->post_content,
            'post_excerpt'   => $post->post_excerpt,
            'post_name'      => $post->post_name,
            'post_parent'    => $post->post_parent,
            'post_password'  => $post->post_password,
            'post_status'    => 'draft',
            'post_title'     => $post->post_title . ' (Bản sao)',
            'post_type'      => $post->post_type,
            'to_ping'        => $post->to_ping,
            'menu_order'     => $post->menu_order
        );

        $new_post_id = wp_insert_post( $args );

        $taxonomies = get_object_taxonomies( $post->post_type );
        foreach ( $taxonomies as $taxonomy ) {
            $post_terms = wp_get_object_terms( $post_id, $taxonomy, array( 'fields' => 'slugs' ) );
            wp_set_object_terms( $new_post_id, $post_terms, $taxonomy, false );
        }

        $post_meta_infos = $wpdb->get_results( "SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id" );
        if ( count( $post_meta_infos ) != 0 ) {
            $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
            foreach ( $post_meta_infos as $meta_info ) {
                $meta_key = $meta_info->meta_key;
                if ( $meta_key == '_wp_old_slug' ) continue;
                $meta_value = addslashes( $meta_info->meta_value );
                $sql_query_sel[] = "SELECT $new_post_id, '$meta_key', '$meta_value'";
            }
            $sql_query .= implode( " UNION ALL ", $sql_query_sel );
            $wpdb->query( $sql_query );
        }

        wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
        exit;
    } else {
        wp_die( 'Lỗi nhân bản bài viết: ' . $post_id );
    }
}
add_action( 'admin_action_hc_duplicate_post_as_draft', 'hc_duplicate_post_as_draft' );
?>