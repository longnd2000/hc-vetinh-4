<!DOCTYPE html>
<html <?php language_attributes(); ?> class="blog windows antialiased overflow-x-hidden">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

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
    <div class="overlayNav fixed top-0 left-0 w-full h-full opacity-0 invisible z-40 transition-opacity duration-300">
        <button aria-label="Close menu" class="menuToggle fixed top-[73px] !top-[49px] left-16 laptop:left-10 medium:left-8 bg-transparent h-12 w-12 align-top z-50 cursor-pointer group -mt-7 mobile:-mt-0.5 mobile:!top-4 mobile:left-5 border-none"> 
            <div class="menuI topI w-6 h-[1px] bg-white absolute top-5"></div>
            <div class="menuI bottomI w-6 h-[1px] bg-white absolute top-7"></div>
        </button>
        <div class="oneNav h-full level1 bg-green fixed z-40 top-0 left-0 w-[40%] mobile:w-full">
            <div class="navList py-36 block wrapper mobile:py-28">
                <ul>
                    <li><a href="#" class="navLink" data-nav="buy-and-sell">Chăm sóc Mẹ &amp; Bé</a></li>
                    <li><a href="#" class="navLink" data-nav="build-and-developments">Sản phẩm Mẹ &amp; Bé</a></li>
                    <li><a href="#" class="navLink" data-nav="architecture-and-design">Kiến thức - Cẩm nang</a></li>
                    <li><a href="#" class="navLink" data-nav="about">Về chúng tôi</a></li>
                </ul>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var toggles = document.querySelectorAll('.menuToggle');
                        var overlay = document.querySelector('.overlayNav');
                        var level2 = document.querySelector('.oneNav.level2');
                        var navLinks = document.querySelectorAll('.navLink');
                        var subNavs = document.querySelectorAll('.subNav');
                        var closeLevel2 = document.querySelector('.closeLevel2');

                        if (toggles.length && overlay) {
                            toggles.forEach(function(toggle) {
                                toggle.addEventListener('click', function(e) {
                                    e.preventDefault();
                                    if (overlay.classList.contains('opacity-0')) {
                                        overlay.classList.remove('opacity-0', 'invisible');
                                        overlay.classList.add('navOpen');
                                        if (level2) level2.classList.remove('open');
                                    } else {
                                        overlay.classList.add('opacity-0', 'invisible');
                                        overlay.classList.remove('navOpen');
                                        if (level2) level2.classList.remove('open');
                                    }
                                });
                            });
                            overlay.addEventListener('click', function(e) {
                                if (e.target === overlay) {
                                    overlay.classList.add('opacity-0', 'invisible');
                                    overlay.classList.remove('navOpen');
                                    if (level2) level2.classList.remove('open');
                                }
                            });
                        }

                        if (navLinks.length && level2) {
                            navLinks.forEach(function(link) {
                                ['mouseenter', 'click'].forEach(function(evt) {
                                    link.addEventListener(evt, function(e) {
                                        if (evt === 'click') e.preventDefault();
                                        var target = link.getAttribute('data-nav');
                                        if (!target) return;
                                        
                                        subNavs.forEach(function(nav) {
                                            nav.style.display = 'none';
                                        });
                                        
                                        var targetNav = document.querySelector('.subNav[data-list="' + target + '"]');
                                        if (targetNav) {
                                            targetNav.style.display = 'block';
                                        }
                                        
                                        level2.classList.add('open');
                                    });
                                });
                            });
                        }

                        if (closeLevel2 && level2) {
                            closeLevel2.addEventListener('click', function(e) {
                                e.preventDefault();
                                level2.classList.remove('open');
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
                        <a href="/cham-soc-me-be" class="subnavTitle">Chăm sóc Mẹ &amp; Bé</a>
                    </li>
                    <li>
                        <a href="/tam-be" class="subnavLink">Tắm bé sơ sinh</a>
                    </li>
                    <li>
                        <a href="/cham-soc-me" class="subnavLink">Chăm sóc mẹ sau sinh</a>
                    </li>
                    <li>
                        <a href="/thong-tac-tia-sua" class="subnavLink">Thông tắc tia sữa</a>
                    </li>
                    <li>
                        <a href="/bao-mau" class="subnavLink">Bảo mẫu tại nhà</a>
                    </li>
                    <li>
                        <a href="/massage-bau" class="subnavLink">Massage bầu</a>
                    </li>
                    <li>
                        <a href="/boi-thuy-lieu" class="subnavLink">Bơi thủy liệu cho bé</a>
                    </li>
                    <li>
                        <a href="/kham-nhi" class="subnavLink">Khám nhi tại nhà</a>
                    </li>
                </ul>
                <ul class="subNav" data-list="build-and-developments">
                    <li>
                        <a href="/san-pham" class="subnavTitle">Sản phẩm Mẹ &amp; Bé</a>
                    </li>
                    <li>
                        <a href="/do-so-sinh" class="subnavLink">Đồ sơ sinh</a>
                    </li>            
                    <li>
                        <a href="/sua-thuc-pham" class="subnavLink">Sữa và thực phẩm</a>
                    </li>            
                    <li>
                        <a href="/bim-ta" class="subnavLink">Bỉm tã</a>
                    </li>            
                    <li>
                        <a href="/vitamin" class="subnavLink">Vitamin &amp; TPCN</a>
                    </li>
                </ul>
                <ul class="subNav" data-list="architecture-and-design">
                    <li>
                        <a href="/kien-thuc" class="subnavTitle">Kiến thức - Cẩm nang</a>
                    </li>
                    <li>
                        <a href="/goc-cua-me" class="subnavLink">Góc của Mẹ</a>
                    </li>            
                    <li>
                        <a href="/nuoi-con-khoa-hoc" class="subnavLink">Nuôi con khoa học</a>
                    </li>            
                    <li>
                        <a href="/benh-thuong-gap" class="subnavLink">Bệnh thường gặp ở trẻ</a>
                    </li>
                    <li>
                        <a href="/an-dam" class="subnavLink">Ăn dặm cho bé</a>
                    </li>
                </ul>
                <ul class="subNav" data-list="about">
                    <li>
                        <a href="/about" class="subnavTitle">Về chúng tôi</a>
                    </li>
                    <li>
                        <a href="/doi-ngu" class="subnavLink">Đội ngũ Y Bác sĩ</a>
                    </li>
                    <li>
                        <a href="/blog" class="subnavLink">Tin tức &amp; Sự kiện</a>
                    </li>
                    <li>
                        <a href="/cong-dong" class="subnavLink">Cộng đồng Mẹ bỉm sữa</a>
                    </li>
                    <li>
                        <a href="/testimonials" class="subnavLink">Cảm nhận khách hàng</a>
                    </li>
                    <li>
                        <a href="/contact" class="subnavLink">Liên hệ</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
