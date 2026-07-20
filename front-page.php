<?php get_header(); ?>
<main class="page-wrapper overflow-x-hidden">
<section class="bg-cream text-dark">
    <div class="wrapper">
        <div class="full-grid">
            <?php
            $page_for_posts_id = get_option('page_for_posts');
            $hero_title = (function_exists('get_field') && get_field('blog_title', $page_for_posts_id)) ? get_field('blog_title', $page_for_posts_id) : '<span class="font-italic">Blog của</span> chúng tôi';
            $hero_desc = (function_exists('get_field') && get_field('blog_description', $page_for_posts_id)) ? get_field('blog_description', $page_for_posts_id) : 'Cập nhật những tin tức mới nhất về mua, bán, xây dựng nhà cửa và các thông tin từ chúng tôi.';
            ?>
            <div class="col-span-full text-center pt-48 fade-in mobile:pt-28">
                <h1 class=""><?php echo $hero_title; ?></h1>
                <p class="max-w-[640px] mx-auto block mt-10 opacity-80 mobile:mt-5"><?php echo $hero_desc; ?></p>
            </div>
        </div>
    </div>

    <div class="bg-cream text-dark">
        <div class="wrapper">
            <div class="full-grid pt-24 mobile:pt-12 gap-x-16 medium:gap-x-12 pb-10 mobile:gap-x-0 mobile:pb-2">
                <?php 
                global $wp_query;
                $page_for_posts_id = get_option('page_for_posts');
                $selected_posts = (function_exists('get_field')) ? get_field('selected_articles', $page_for_posts_id) : false;
                
                $blog_query = new WP_Query(array(
                    'post_type'      => 'post',
                    'posts_per_page' => 12,
                    'post_status'    => 'publish'
                ));
                
                if ($selected_posts && is_array($selected_posts) && !empty($selected_posts)) {
                    $post_ids = array_map(function($p) { return is_object($p) ? $p->ID : $p; }, $selected_posts);
                    $blog_query = new WP_Query(array(
                        'post_type'      => 'post',
                        'post__in'       => $post_ids,
                        'orderby'        => 'post__in',
                        'posts_per_page' => -1,
                        'post_status'    => 'publish'
                    ));
                }
                
                if ($blog_query->have_posts()) : while ($blog_query->have_posts()) : $blog_query->the_post(); 
                    $post_img = (function_exists('get_field') && get_field('article_image')) ? (is_array(get_field('article_image')) ? get_field('article_image')['url'] : get_field('article_image')) : (has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'full') : 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=800&auto=format&fit=crop');
                ?>
                <div class="col-span-6 fade-in pb-28 mobile:col-span-full mobile:pb-14">
                    <a href="<?php the_permalink(); ?>" class="cover block relative after:pb-[67.5%] after:block after:content-[''] overflow-hidden" aria-label="<?php echo esc_attr(get_the_title()); ?>">
                        <img src="<?php echo esc_url($post_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="absolute top-0 left-0 w-full h-full object-cover" <?php if( $blog_query->current_post === 0 ) { echo 'fetchpriority="high" decoding="sync"'; } else { echo 'loading="lazy" decoding="async"'; } ?> />
                    </a>
                    <a class="pt-6 block" href="<?php the_permalink(); ?>">
                        <h4 class="text-left text-lg"><?php the_title(); ?></h4>
                        <p class="text-base max-w-[85%] mt-3 mb-6 line-clamp-2 mobile:mb-4"><?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?></p>
                        <span class="underlineLink">Xem thêm</span>
                    </a>
                </div>
                <?php 
                endwhile; 
                wp_reset_postdata();
                else: 
                ?>
                    <div class="col-span-full text-center">Không tìm thấy bài viết nào.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <?php
    $page_for_posts_id = get_option('page_for_posts');
    $cta_1_title = (function_exists('get_field') && get_field('cta_1_title', $page_for_posts_id)) ? get_field('cta_1_title', $page_for_posts_id) : 'Bạn muốn <em class="font-italic">Mua</em><br />nhà?';
    $cta_1_link = (function_exists('get_field') && get_field('cta_1_link', $page_for_posts_id)) ? get_field('cta_1_link', $page_for_posts_id) : '/buy';
    $cta_1_text = (function_exists('get_field') && get_field('cta_1_text', $page_for_posts_id)) ? get_field('cta_1_text', $page_for_posts_id) : 'Khám phá ngay';
    $cta_1_img = (function_exists('get_field') && get_field('cta_1_image', $page_for_posts_id)) ? (is_array(get_field('cta_1_image', $page_for_posts_id)) ? get_field('cta_1_image', $page_for_posts_id)['url'] : get_field('cta_1_image', $page_for_posts_id)) : 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=2000&auto=format&fit=crop';
    
    $cta_2_title = (function_exists('get_field') && get_field('cta_2_title', $page_for_posts_id)) ? get_field('cta_2_title', $page_for_posts_id) : 'Bạn muốn <em class="font-italic">Bán</em><br />nhà?';
    $cta_2_link = (function_exists('get_field') && get_field('cta_2_link', $page_for_posts_id)) ? get_field('cta_2_link', $page_for_posts_id) : '/request-a-valuation';
    $cta_2_text = (function_exists('get_field') && get_field('cta_2_text', $page_for_posts_id)) ? get_field('cta_2_text', $page_for_posts_id) : 'Yêu cầu định giá';
    $cta_2_img = (function_exists('get_field') && get_field('cta_2_image', $page_for_posts_id)) ? (is_array(get_field('cta_2_image', $page_for_posts_id)) ? get_field('cta_2_image', $page_for_posts_id)['url'] : get_field('cta_2_image', $page_for_posts_id)) : 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?q=80&w=2000&auto=format&fit=crop';
    
    $cta_3_title = (function_exists('get_field') && get_field('cta_3_title', $page_for_posts_id)) ? get_field('cta_3_title', $page_for_posts_id) : 'Bạn muốn <em class="font-italic">Xây</em><br />nhà?';
    $cta_3_link = (function_exists('get_field') && get_field('cta_3_link', $page_for_posts_id)) ? get_field('cta_3_link', $page_for_posts_id) : '/build-and-developments#contact';
    $cta_3_text = (function_exists('get_field') && get_field('cta_3_text', $page_for_posts_id)) ? get_field('cta_3_text', $page_for_posts_id) : 'Đặt lịch tư vấn';
    $cta_3_img = (function_exists('get_field') && get_field('cta_3_image', $page_for_posts_id)) ? (is_array(get_field('cta_3_image', $page_for_posts_id)) ? get_field('cta_3_image', $page_for_posts_id)['url'] : get_field('cta_3_image', $page_for_posts_id)) : 'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?q=80&w=2000&auto=format&fit=crop';
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