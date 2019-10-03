<?php

function phone_shortcode($atts, $content)
{

    $phone = get_field('main_phone', 'option');

    return "<a href='tel:" . $phone . "' class='sc--phone'>" . $phone . "</a>";



    // $atts = shortcode_atts([
    //     'class' => '',
    //     'number' => get_field('main_phone', 'option'),
    //     'contact_page' => get_page_by_path('contact')->ID,
    // ], $atts);

    // $number = $atts['number'];
    // $contactPage = $atts['contact_page'];
    // $class = $atts['class'];
    // if ($number) {
    //     $phoneText = $number;
    //     $phoneNum = 'tel:' . $phoneText;
    //     $classes = ['phone'];
    //     if ($class != '') {
    //         $classes[] = $class;
    //     }
    //     return '<a class="' . implode(' ', $classes) . '" href="' . $phoneNum . '">' . $phoneText . '</a>';
    //     if (!wp_is_mobile() && $contactPage) {
    //         return '<a class="' . implode(' ', $classes) . '" href="' . get_permalink($contactPage) . '">' . $phoneText . '</a>';
    //     } else {
    //         return '<a class="' . implode(' ', $classes) . '" href="' . $phoneNum . '">' . $phoneText . '</a>';
    //     }
    // }

    // return 'did';
}

add_shortcode('phone', 'phone_shortcode');

function thee_child_pages()
{

    global $post;

    if (is_page() && $post->post_parent)

        $childpages = wp_list_pages('sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0');
    else
        $childpages = wp_list_pages('sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0');

    if ($childpages) {

        $string = '<ul class="sc--subpages">' . $childpages . '</ul>';
    }

    return $string;

}

add_shortcode('subpages', 'thee_child_pages');

function cta_button_func($atts, $content = null)
{
    extract(shortcode_atts(array(
        'class' => ''
    ), $atts));
    return '<span class="btn '.$atts['class'].'">' . $content . '</span>';
}

add_shortcode('button', 'cta_button_func');

function sitemap_func($atts, $content = null)
{
    $excluded = new \WP_Query([
        'post_type'      => 'page',
        'posts_per_page' => - 1,
        'meta_query'     => [
            [
                'key'   => 'hide_page_from_sidebar_navigation',
                'value' => '1'
            ]
        ]
    ]);
    $ids      = [];
    if ($excluded->have_posts()) {
        foreach ($excluded->posts as $page) {
            $ids[] = $page->ID;
        }
    }

    $args = ['echo' => false, 'title_li' => ''];
    if (!empty($ids)) {
        $args['exclude'] = implode(',', $ids);
    }

    $pages = wp_list_pages($args);
    ?>
    <ul class="sitemap"><?php echo $pages ?></ul>
    <?php
    return ob_get_clean();
}

add_shortcode('sitemap', 'sitemap_func');

function testimonials_func($atts, $content = null)
{
    global $post;
    $atts    = shortcode_atts(array(
        'id'    => $post->ID,
        'n'     => false,
        'title' => false,
        'class' => false,
    ), $atts);
    $classes = ['testimonials'];
    $id      = $atts['id'];
    $n       = $atts['n'];
    $title   = $atts['title'];
    $class   = $atts['class'];

    if($n) {
        $classes[] = 'random-testimonials';
    }
    if($class) {
        $classes[] = $class;
    }
    $output = '';
    if(have_rows('testimonials', $id)) {
        $output .= '<div class="' . implode(' ', $classes) . '">';
        if($title) {
            $output .= $title;
        }
        if($n) {
            $testimonials = get_field('testimonials', $id);
            shuffle($testimonials);
            for($i = 0; $i < $n; $i ++) {
                $classItem = array('item');
                $img       = $testimonials[ $i ]['image'];
                if($img) {
                    $classItem[] = 'has-image';
                }
                $output .= '<div class="' . implode(' ', $classItem) . '">';
                if($img) {
                    $output .= '<div class="image">' . wp_get_attachment_image($img['id'], 'thumbnail') . '</div>';
                }
                $output .= '<div class="testimonial">' . $testimonials[ $i ]['testimonial'] . '</div>';
                $output .= '<div class="client"><span>&ndash; ' . $testimonials[ $i ]['client'] . '</span></div>';
                $output .= '</div>';
            }
        } else {
            while(have_rows('testimonials', $id)) {
                the_row();
                $classItem = array('item');
                $img       = get_sub_field('image');
                if($img) {
                    $classItem[] = 'has-image';
                }
                $output .= '<div class="' . implode(' ', $classItem) . '">';
                if($img) {
                    $output .= '<div class="image">' . wp_get_attachment_image($img['id'], 'thumbnail') . '</div>';
                }
                $output .= '<div class="testimonial">' . get_sub_field('testimonial') . '</div>';
                $output .= '<div class="client"><span>&ndash; ' . get_sub_field('client') . '</span></div>';
                $output .= '</div>';
            }
        }
        $output .= '</div>';
    }

    return $output;
}

add_shortcode('testimonials', 'testimonials_func');

function link_func($atts, $content = null)
{
    $atts   = shortcode_atts(array(
        'id'     => '',
        'class'  => '',
        'title'  => '',
        'target' => '_self'
    ), $atts);
    $id     = $atts['id'];
    $class  = $atts['class'];
    $title  = $atts['title'];
    $target = $atts['target'];

    if($id != '') {
        $attClass = '';
        $attHref  = 'href="' . get_permalink($id) . '"';
        if($class != '') {
            $attClass = 'class="' . $class . '"';
        }
        if($title != '') {
            if($title == 'false') {
                $attTitle = '';
            } else {
                $attTitle = 'title="' . $title . '"';
            }
        } else {
            $attTitle = 'title="' . get_the_title($id) . '"';
        }

        return '<a ' . $attHref . ' ' . $attClass . ' ' . $attTitle . ' target="' . $target . '">' . $content . '</a>';
    }
    return '';
}

add_shortcode('link', 'link_func');
