<?php get_header(); ?>
<main class="page-wrapper overflow-x-hidden">
<section class="bg-cream text-dark">
    <div class="wrapper">
        <div class="full-grid">
            <div class="col-span-full text-center pt-48 fade-in mobile:pt-28">
                <h1 class=""><?php the_archive_title(); ?></h1>
                <div class="max-w-[640px] mx-auto block mt-10 opacity-80 mobile:mt-5"><?php the_archive_description(); ?></div>
            </div>
        </div>
    </div>

    <div class="bg-cream text-dark">
        <div class="wrapper">
            <div class="full-grid pt-24 mobile:pt-12 gap-x-16 medium:gap-x-12 pb-10 mobile:gap-x-0 mobile:pb-2">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php
                global $wp_query;
                $post_img = (function_exists('get_field') && get_field('article_image')) ? (is_array(get_field('article_image')) ? get_field('article_image')['url'] : get_field('article_image')) : (has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'full') : 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7');
                $col_class = ($wp_query->current_post < 2) ? 'col-span-6' : 'col-span-4';
                ?>
                <div class="<?php echo $col_class; ?> fade-in pb-28 mobile:col-span-full mobile:pb-14">
                    <a href="<?php the_permalink(); ?>" class="cover block relative after:pb-[67.5%] after:block after:content-[''] overflow-hidden" aria-label="<?php echo esc_attr(get_the_title()); ?>">
                        <img src="<?php echo esc_url($post_img, array('http', 'https', 'data')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="absolute top-0 left-0 w-full h-full object-cover<?php echo ($wp_query->current_post === 0) ? ' skip-lazy' : ''; ?>" <?php if( $wp_query->current_post === 0 ) { echo 'fetchpriority="high" decoding="sync" data-no-lazy="1" data-skip-lazy="1"'; } else { echo 'loading="lazy" decoding="async"'; } ?> />
                    </a>
                    <a class="pt-6 block" href="<?php the_permalink(); ?>">
                        <h4 class="text-left text-lg font-bold"><?php the_title(); ?></h4>
                        <p class="text-base max-w-[85%] mt-3 mb-6 line-clamp-2 mobile:mb-4"><?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?></p>
                        <span class="underlineLink">Xem thêm</span>
                    </a>
                </div>
                <?php endwhile; else: ?>
                    <div class="col-span-full text-center">Không tìm thấy bài viết nào.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <?php
    $front_page_id = get_option('page_on_front') ? get_option('page_on_front') : get_option('page_for_posts');
    $cta_1_title = (function_exists('get_field') && get_field('cta_1_title', $front_page_id)) ? get_field('cta_1_title', $front_page_id) : 'Dịch vụ <em class="font-italic">Tắm bé</em>';
    $cta_1_link = (function_exists('get_field') && get_field('cta_1_link', $front_page_id)) ? get_field('cta_1_link', $front_page_id) : '#';
    $cta_1_text = (function_exists('get_field') && get_field('cta_1_text', $front_page_id)) ? get_field('cta_1_text', $front_page_id) : 'Tìm hiểu thêm';
    $cta_1_img = (function_exists('get_field') && get_field('cta_1_image', $front_page_id)) ? (is_array(get_field('cta_1_image', $front_page_id)) ? get_field('cta_1_image', $front_page_id)['url'] : get_field('cta_1_image', $front_page_id)) : 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
    
    $cta_2_title = (function_exists('get_field') && get_field('cta_2_title', $front_page_id)) ? get_field('cta_2_title', $front_page_id) : 'Chăm sóc <em class="font-italic">Mẹ sau sinh</em>';
    $cta_2_link = (function_exists('get_field') && get_field('cta_2_link', $front_page_id)) ? get_field('cta_2_link', $front_page_id) : '#';
    $cta_2_text = (function_exists('get_field') && get_field('cta_2_text', $front_page_id)) ? get_field('cta_2_text', $front_page_id) : 'Xem chi tiết';
    $cta_2_img = (function_exists('get_field') && get_field('cta_2_image', $front_page_id)) ? (is_array(get_field('cta_2_image', $front_page_id)) ? get_field('cta_2_image', $front_page_id)['url'] : get_field('cta_2_image', $front_page_id)) : 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
    
    $cta_3_title = (function_exists('get_field') && get_field('cta_3_title', $front_page_id)) ? get_field('cta_3_title', $front_page_id) : 'Thông tắc <em class="font-italic">Tia sữa</em>';
    $cta_3_link = (function_exists('get_field') && get_field('cta_3_link', $front_page_id)) ? get_field('cta_3_link', $front_page_id) : '#';
    $cta_3_text = (function_exists('get_field') && get_field('cta_3_text', $front_page_id)) ? get_field('cta_3_text', $front_page_id) : 'Đặt lịch ngay';
    $cta_3_img = (function_exists('get_field') && get_field('cta_3_image', $front_page_id)) ? (is_array(get_field('cta_3_image', $front_page_id)) ? get_field('cta_3_image', $front_page_id)['url'] : get_field('cta_3_image', $front_page_id)) : 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
    ?>
    <div class="full-grid gap-0 relative z-0 text-white">
        <div class="col-span-4 mobile:col-span-full">
            <a href="<?php echo esc_url($cta_1_link); ?>" class="relative block cover group after:content-[''] after:block after:pb-[100%] mobile:max-h-[260px] mobile:overflow-hidden" style="background-image:url('<?php echo esc_url($cta_1_img); ?>');">
                <div class="overlay bg-black opacity-40 z-20 top-0 left-0 w-full h-full absolute group-hover:opacity-30 duration-500 transition-opacity"></div>
                <div class="text text-center center z-30 w-full">
                    <h3 class="mb-12 mobile:h2 mobile:mb-6"><?php echo $cta_1_title; ?></h3>
                    <span class="underlineLink mx-auto"><?php echo $cta_1_text; ?></span>
                </div>
            </a>
        </div>
        <div class="col-span-4 mobile:col-span-full">
            <a href="<?php echo esc_url($cta_2_link); ?>" class="relative block cover group after:content-[''] after:block after:pb-[100%] mobile:max-h-[260px] mobile:overflow-hidden" style="background-image:url('<?php echo esc_url($cta_2_img); ?>');">
                <div class="overlay bg-black opacity-40 z-20 top-0 left-0 w-full h-full absolute group-hover:opacity-30 duration-500 transition-opacity"></div>
                <div class="text text-center center z-30 w-full">
                    <h3 class="mb-12 mobile:h2 mobile:mb-6"><?php echo $cta_2_title; ?></h3>
                    <span class="underlineLink mx-auto"><?php echo $cta_2_text; ?></span>
                </div>
            </a>
        </div>
        <div class="col-span-4 mobile:col-span-full">
            <a href="<?php echo esc_url($cta_3_link); ?>" class="relative block cover group after:content-[''] after:block after:pb-[100%] mobile:max-h-[260px] mobile:overflow-hidden" style="background-image:url('<?php echo esc_url($cta_3_img); ?>');">
                <div class="overlay bg-black opacity-40 z-20 top-0 left-0 w-full h-full absolute group-hover:opacity-30 duration-500 transition-opacity"></div>
                <div class="text text-center center z-30 w-full">
                    <h3 class="mb-12 mobile:h2 mobile:mb-6"><?php echo $cta_3_title; ?></h3>
                    <span class="underlineLink mx-auto"><?php echo $cta_3_text; ?></span>
                </div>
            </a>
        </div>
    </div>
</section>
</main>
<?php get_footer(); ?>