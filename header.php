<!DOCTYPE html>
<html <?php language_attributes(); ?> class="blog windows antialiased overflow-x-hidden">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    

    <?php wp_head(); ?>
</head>
<?php 
$front_page_id = get_option('page_on_front') ? get_option('page_on_front') : get_option('page_for_posts');
$header_phone = (function_exists('get_field') && get_field('header_phone', $front_page_id)) ? get_field('header_phone', $front_page_id) : '0962131515';
$header_phone_clean = preg_replace('/[^0-9+]/', '', $header_phone);
$footer_email = (function_exists('get_field') && get_field('footer_email', $front_page_id)) ? get_field('footer_email', $front_page_id) : 'cskh@homegroups.vn';
?>
<body id="page_blog" <?php body_class(); ?>>
    <header class="py-8 bg-green mobile:py-5 absolute w-full top-0 hide stuck inView mobile:!py-7 darkHeader">
        <div class="wrapper text-[0] relative">
            <div class="left w-[calc(50%-90px)] mobile:w-[calc(50%-70px)] align-middle inline-block text-left">
                <button aria-label="Toggle menu" class="menuToggle absolute h-12 w-12 align-top z-0 cursor-pointer group -mt-[18px] mobile:-mt-6 border-none bg-transparent">
                    <div class="menuI topI w-6 h-[1px] bg-white absolute top-5 transition-all duration-300"></div>
                    <div class="menuI bottomI w-6 h-[1px] bg-white absolute top-7 transition-all duration-300"></div>
                </button>
                <?php
                $top_categories = get_terms( array(
                    'taxonomy' => 'category',
                    'orderby'  => 'count',
                    'order'    => 'DESC',
                    'number'   => 4,
                    'hide_empty' => true
                ) );
                $left_cats = array_slice($top_categories, 0, 2);
                $right_cats = array_slice($top_categories, 2, 2);
                ?>
                <ul class="menu">
                    <?php if (isset($left_cats[0])) : ?>
                    <li class="ml-16 mr-10 laptop:mr-8 laptop:ml-14 mobile:!hidden">
                        <a href="<?php echo esc_url(get_term_link($left_cats[0])); ?>"><?php echo esc_html($left_cats[0]->name); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if (isset($left_cats[1])) : ?>
                    <li class="mobile:!hidden">
                        <a href="<?php echo esc_url(get_term_link($left_cats[1])); ?>"><?php echo esc_html($left_cats[1]->name); ?></a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="middle w-[180px] mobile:w-[140px] inline-block align-middle text-center">
                <?php
                $site_logo = (function_exists('get_field') && get_field('site_logo', $front_page_id)) ? get_field('site_logo', $front_page_id) : false;
                if ( $site_logo ) {
                    $logo_url = is_array($site_logo) ? $site_logo['url'] : $site_logo;
                    echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="block w-full"><img src="' . esc_url( $logo_url ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" class="w-auto mx-auto object-contain" style="max-height: 60px;" /></a>';
                } else {
                    echo '<a href="' . esc_url( home_url( '/' ) ) . '" class="text-dark text-2xl font-bold uppercase no-underline" style="color: #333;">' . get_bloginfo( 'name' ) . '</a>';
                }
                ?>
            </div>
            <div class="right w-[calc(50%-90px)] mobile:w-[calc(50%-70px)] inline-block align-middle text-right">
                <ul class="menu">
                    <?php if (isset($right_cats[0])) : ?>
                    <li class="mr-10 laptop:mr-8 mobile:!hidden">
                        <a href="<?php echo esc_url(get_term_link($right_cats[0])); ?>"><?php echo esc_html($right_cats[0]->name); ?></a>
                    </li>
                    <?php endif; ?>
                    <?php if (isset($right_cats[1])) : ?>
                    <li class="mr-10 laptop:mr-8 mobile:!hidden">
                        <a href="<?php echo esc_url(get_term_link($right_cats[1])); ?>"><?php echo esc_html($right_cats[1]->name); ?></a>
                    </li>
                    <?php endif; ?>
                    <li class="mobile:!hidden">
                        <a href="tel:<?php echo esc_attr($header_phone_clean); ?>" class="">Liên hệ</a>
                    </li>
                    <li class="!hidden mobile:!inline-block">
                        <a href="tel:<?php echo esc_attr($header_phone_clean); ?>" class="" aria-label="Call us">
                            <svg width="20" height="20" class="w-5 relative -top-[1px] fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 0 0-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"/></svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="overlayNav fixed top-0 left-0 w-full h-full bg-green opacity-0 invisible z-40 transition-opacity duration-300 cover">
        <button aria-label="Close menu" class="menuToggle fixed top-[73px] !top-[49px] left-16 laptop:left-10 medium:left-8 bg-transparent h-12 w-12 align-top z-50 cursor-pointer group -mt-7 mobile:-mt-0.5 mobile:!top-4 mobile:left-5 border-none"> 
            <div class="menuI topI w-6 h-[1px] bg-white absolute top-5"></div>
            <div class="menuI bottomI w-6 h-[1px] bg-white absolute top-7"></div>
        </button>
        <div class="oneNav h-full level1 bg-green fixed z-40 top-0 left-0 w-1/3 min-w-[420px] mobile:w-full">
            <div class="navList py-36 block wrapper mobile:py-28">
                <ul>
                    <?php
                    $all_categories = get_terms( array(
                        'taxonomy' => 'category',
                        'hide_empty' => true
                    ) );
                    if ( ! empty( $all_categories ) && ! is_wp_error( $all_categories ) ) {
                        foreach ( $all_categories as $cat ) {
                            echo '<li><a href="' . esc_url( get_term_link( $cat ) ) . '" class="navLink">' . esc_html( $cat->name ) . '</a></li>';
                        }
                    }
                    ?>
                </ul>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var toggles = document.querySelectorAll('.menuToggle');
                        var overlay = document.querySelector('.overlayNav');
                        if (toggles.length && overlay) {
                            toggles.forEach(function(toggle) {
                                toggle.addEventListener('click', function(e) {
                                    e.preventDefault();
                                    if (overlay.classList.contains('opacity-0')) {
                                        overlay.classList.remove('opacity-0', 'invisible');
                                    } else {
                                        overlay.classList.add('opacity-0', 'invisible');
                                    }
                                });
                            });
                        }
                    });
                </script>
            </div>
            <div class="bottomNav absolute bottom-14 px-16 mobile:bottom-10 mobile:left-5 mobile:px-0">
                <div class="">
                    <p class="text-sm/6">
                        <a href="tel:<?php echo esc_attr($header_phone_clean); ?>" class="duration-300 hover:opacity-70 inline-block mb-1"><?php echo esc_html($header_phone); ?></a><br />
                        <a href="mailto:<?php echo esc_attr($footer_email); ?>" class="duration-300 hover:opacity-70"><?php echo esc_html($footer_email); ?></a>
                    </p>
                </div>
            </div>
        </div>

        <div class="oneNav level2">
            <a href="#" class="hidden mobile:inline-block absolute top-20 mt-3 left-5 closeLevel2" aria-label="Back">
                <img src="<?php echo get_template_directory_uri(); ?>/images/icons/arrow-left.svg" width="32" height="32" alt="Back" class="w-8 inline-block" />
            </a>
            <div class="navList top-40 mobile:top-36 mt-3 block wrapper relative">
                <ul class="subNav" data-list="buy-and-sell">
                    <li>
                        <a href="/homes-and-land" class="subnavTitle">Nhà &amp; Đất</a>
                    </li>
                    <li>
                        <a href="/buy" class="subnavLink">Tìm kiếm Bất động sản</a>
                    </li>
                    <li>
                        <a href="/sell" class="subnavLink">Bán cùng Blenheim</a>
                    </li>
                    <li>
                        <a href="/buy-with-blenheim" class="subnavLink">Mua cùng Blenheim</a>
                    </li>
                    <li>
                        <a href="/request-a-valuation" class="subnavLink">Yêu cầu Định giá</a>
                    </li>
                    <li>
                        <a href="/land" class="subnavLink">Mua Đất</a>
                    </li>
                    <li>
                        <a href="/area-guides" class="subnavLink">Hướng dẫn Khu vực</a>
                    </li>
                    <li>
                        <a href="/mortgage-calculator" class="subnavLink">Tính toán Thế chấp</a>
                    </li>
                    <li>
                        <a href="/private-listings" class="subnavLink">Danh sách Riêng tư</a>
                    </li>
                    <li>
                        <a href="/sell-with-a-private-listing" class="subnavLink">Bán Riêng tư</a>
                    </li>
                </ul>
                <ul class="subNav" data-list="build-and-developments">
                    <li>
                        <a href="/build-and-developments" class="subnavTitle">Xây dựng &amp; Phát triển</a>
                    </li>
                    <li>
                        <a href="/build-and-developments" class="subnavLink">Xây dựng &amp; Phát triển</a>
                    </li>
                    <li>
                        <a href="/build-and-developments/home-builds" class="subnavLink">Xây Nhà</a>
                    </li>            
                    <li>
                        <a href="/build-and-developments/developments" class="subnavLink">Dự án</a>
                    </li>            
                    <li>
                        <a href="/build-and-developments/construction" class="subnavLink">Thi công</a>
                    </li>            
                    <li>
                        <a href="/build-and-developments/landscaping" class="subnavLink">Cảnh quan</a>
                    </li>
                    <li>
                        <a href="/projects" class="subnavLink">Dự án đã hoàn thành</a>
                    </li>
                </ul>
                <ul class="subNav" data-list="architecture-and-design">
                    <li>
                        <a href="/design-and-architecture" class="subnavTitle">Thiết kế &amp; Kiến trúc</a>
                    </li>
                    <li>
                        <a href="/design-and-architecture" class="subnavLink">Thiết kế &amp; Kiến trúc</a>
                    </li>
                    <li>
                        <a href="/design-and-architecture/architecture" class="subnavLink">Kiến trúc</a>
                    </li>            
                    <li>
                        <a href="/design-and-architecture/interior-design" class="subnavLink">Thiết kế Nội thất</a>
                    </li>            
                    <li>
                        <a href="/design-and-architecture/planning-permission" class="subnavLink">Giấy phép Xây dựng</a>
                    </li>
                    <li>
                        <a href="/projects" class="subnavLink">Dự án đã hoàn thành</a>
                    </li>
                </ul>
                <ul class="subNav" data-list="about">
                    <li>
                        <a href="/about" class="subnavTitle">Về chúng tôi</a>
                    </li>
                    <li>
                        <a href="/about" class="subnavLink">Về chúng tôi</a>
                    </li>
                    <li>
                        <a href="/team" class="subnavLink">Đội ngũ</a>
                    </li>
                    <li>
                        <a href="/blog" class="subnavLink">Blog</a>
                    </li>
                    <li>
                        <a href="/blenheim-in-the-community" class="subnavLink">Cộng đồng</a>
                    </li>
                    <li>
                        <a href="/testimonials" class="subnavLink">Khách hàng nói gì</a>
                    </li>
                    <li>
                        <a href="/contact" class="subnavLink">Liên hệ</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
