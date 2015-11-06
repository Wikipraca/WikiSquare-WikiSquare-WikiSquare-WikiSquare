<?php
 
//Add support for WordPress 3.0's custom menus
add_action( 'init', 'register_my_menu' );
 
//Register area for custom menu
function register_my_menu() {
    register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
}
// Enable post thumbnails
add_theme_support('post-thumbnails');
set_post_thumbnail_size(520, 250, true);

//Some simple code for our widget-enabled sidebar
add_action( 'widgets_init', 'theme_slug_widgets_init' );
if ( function_exists('register_sidebar') ) {

   register_sidebar(array(
   'name' => 'Esquerda',
   'before_widget' => '<div id="%1$s" class="widget %2$s">',
   'after_widget' => '</div>',
   'before_title' => '<h2>',
   'after_title' => '</h2>'
    ));

   register_sidebar(array(
   'name' => 'Direita',
   'before_widget' => '<div id="%1$s" class="widget %2$s">',
   'after_widget' => '</div>',
   'before_title' => '<h2>',
   'after_title' => '</h2>'
   ));
}
	//Code for custom background support
add_theme_support( 'custom-background');

//Enable post and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );
 function network_latest_posts($how_many=10, $how_long=0, $titleOnly=true, $begin_wrap="\n<li>", $end_wrap="</li>", $blog_id='null', $thumbnail=false, $cpt="post", $ignore_blog='null', $cat='null', $tag='null', $paginate=false, $excerpt_length='null', $display_root=false) {
        global $wpdb;
        global $table_prefix;
        $counter = 0;
            $hack_cont = 0;
            // Custom post type
            $cpt = htmlspecialchars($cpt);
            // Ignore blog or blogs
            // if the user passes one value
            if( !preg_match("/,/",$ignore_blog) ) {
                // Always clean this stuff ;)
                $ignore_blog = htmlspecialchars($ignore_blog);
                // Check if it's numeric
                if( is_numeric($ignore_blog) ) {
                    // and put the sql
                    $ignore = " AND blog_id != $ignore_blog ";
                }
            // if the user passes more than one value separated by commas
            } else {
                // create an array
                $ignore_arr = explode(",",$ignore_blog);
                // and repeat the sql for each ID found
                for($z=0;$z<count($ignore_arr);$z++){
                    $ignore .= " AND blog_id != $ignore_arr[$z]";
                }
            }
        // get a list of blogs in order of most recent update. show only public and nonarchived/spam/mature/deleted
        if ($how_long > 0) {
                    // Select by blog id
                    if( !empty($blog_id) && $blog_id != 'null' ) {
                        $blog_id = htmlspecialchars($blog_id);
                        $blogs = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs WHERE
                       public = '1' AND archived = '0' AND mature = '0' AND spam = '0' AND deleted = '0'
                       AND blog_id = $blog_id $ignore AND last_updated >= DATE_SUB(CURRENT_DATE(), INTERVAL $how_long DAY)
                       ORDER BY last_updated DESC");
                    } else {
                        $blogs = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs WHERE
                       public = '1' $ignore AND archived = '0' AND mature = '0' AND spam = '0' AND deleted = '0'
                       AND last_updated >= DATE_SUB(CURRENT_DATE(), INTERVAL $how_long DAY)
                       ORDER BY last_updated DESC");                    
                    }
        } else {
                    if( !empty($blog_id) && $blog_id != 'null' ) {
                        $blog_id = htmlspecialchars($blog_id);
                        $blogs = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs WHERE
                        public = '1' AND archived = '0' AND mature = '0' AND spam = '0' AND deleted = '0' AND blog_id = $blog_id
                        $ignore ORDER BY last_updated DESC");
                    } else {
                        $blogs = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs WHERE
                        public = '1' AND archived = '0' AND mature = '0' AND spam = '0' AND deleted = '0'
                        $ignore ORDER BY last_updated DESC");                  
                    }
        }
   
        if ($blogs) {
                    // Count how many blogs we've found
                    $nblogs = count($blogs);
                    // Lets dig into each blog
                foreach ($blogs as $blognlp) {
                        // we need _posts and _options tables for this to work
                            // Get the options table for each blog
                            if( $display_root == true ) {
                                if( $blognlp == 1 ) {
                                    $blogOptionsTable = $wpdb->base_prefix."options";
                                    // Get the posts table for each blog
                                    $blogPostsTable = $wpdb->base_prefix."posts";
                                    // Get the terms relationships table for each blog
                                    $blogTermRelationship = $wpdb->base_prefix."term_relationships";
                                    // Get the term taxonomy table for each blog
                                    $blogTermTaxonomy = $wpdb->base_prefix."term_taxonomy";
                                    // Get the terms table for each blog
                                    $blogTerms = $wpdb->base_prefix."terms";
                                } else {
                                    $blogOptionsTable = $wpdb->base_prefix.$blognlp."_options";
                                    // Get the posts table for each blog
                                    $blogPostsTable = $wpdb->base_prefix.$blognlp."_posts";
                                    // Get the terms relationships table for each blog
                                    $blogTermRelationship = $wpdb->base_prefix.$blognlp."_term_relationships";
                                    // Get the term taxonomy table for each blog
                                    $blogTermTaxonomy = $wpdb->base_prefix.$blognlp."_term_taxonomy";
                                    // Get the terms table for each blog
                                    $blogTerms = $wpdb->base_prefix.$blognlp."_terms";
                                }
                            } else {
                                $blogOptionsTable = $wpdb->base_prefix.$blognlp."_options";
                                // Get the posts table for each blog
                                $blogPostsTable = $wpdb->base_prefix.$blognlp."_posts";
                                // Get the terms relationships table for each blog
                                $blogTermRelationship = $wpdb->base_prefix.$blognlp."_term_relationships";
                                // Get the term taxonomy table for each blog
                                $blogTermTaxonomy = $wpdb->base_prefix.$blognlp."_term_taxonomy";
                                // Get the terms table for each blog
                                $blogTerms = $wpdb->base_prefix.$blognlp."_terms";
                            }
                            // --- Because the categories and tags are handled the same way by WP
                            // --- I'm hacking the $cat variable so I can use it for both without
                            // --- repeating the code
                            if( !empty($cat) && $cat != 'null' && (empty($tag) || $tag == 'null') ) {         // Categories
                                $cat_hack = $cat;
                                $taxonomy = "taxonomy = 'category'";
                            } elseif( !empty($tag) && $tag != 'null' && (empty($cat) || $cat == 'null') ) {   // Tags
                                $cat_hack = $tag;
                                $taxonomy = "taxonomy = 'post_tag'";
                            } elseif( !empty($cat) && $cat != 'null' && !empty($tag) && $tag != 'null' ) {  // Categories & Tags
                                $cat_hack = $cat.",".$tag;
                                $taxonomy = "(taxonomy = 'category' OR taxonomy = 'post_tag')";
                            }
                            // --- Categories
                            if( !empty($cat_hack) && $cat_hack != 'null' ) {
                                if( !preg_match('/,/',$cat_hack) ) {
                                    $cat_hack = htmlspecialchars($cat_hack);
                                    // Get the category's ID
                                    $catid = $wpdb->get_results("SELECT term_id FROM $blogTerms WHERE slug = '$cat_hack'");
                                    $cats{$blognlp} = $catid[0]->term_id;
                                } else {
                                    $cat_arr = explode(',',$cat_hack);
                                    for($x=0;$x<count($cat_arr);$x++){
                                        $cat_ids = $wpdb->get_results("SELECT term_id FROM $blogTerms WHERE slug = '$cat_arr[$x]' ");
                                        if( !empty($cat_ids[0]->term_id) ) {
                                            // Get the categories' IDs
                                            $catsa{$blognlp}[] = $cat_ids[0]->term_id;
                                        }
                                    }
                                }
                            }
                            // Let's find the ID for the category(ies) or tag(s)
                            if( count($cats{$blognlp}) == 1 ) {
                                $taxo = $wpdb->get_results("SELECT term_taxonomy_id FROM $blogTermTaxonomy WHERE $taxonomy AND term_id = ".$cats{$blognlp});
                                $taxs{$blognlp} = $taxo[0]->term_taxonomy_id;
                            } elseif( count($catsa{$blognlp}) >= 1 ) {
                                for( $y = 0; $y < count($catsa{$blognlp}); $y++ ) {
                                    $tax_id = $wpdb->get_results("SELECT term_taxonomy_id FROM $blogTermTaxonomy WHERE $taxonomy AND term_id = ".$catsa{$blognlp}[$y]);
                                    if( !empty($tax_id[0]->term_taxonomy_id) ) {
                                        $taxsa{$blognlp}[] = $tax_id[0]->term_taxonomy_id;
                                    }
                                }
                            }
                            // Next, let's find how they are related to the posts
                            if( count($taxs{$blognlp}) == 1 ) {
                                $pids = $wpdb->get_results("SELECT object_id FROM $blogTermRelationship WHERE term_taxonomy_id = ".$taxs{$blognlp});
                                for( $w=0;$w<count($pids);$w++ ) {
                                    $postids{$blognlp}[] = $pids[$w]->object_id;
                                }
                            } elseif( count($taxsa{$blognlp}) >= 1 ) {
                                for( $w = 0; $w < count($taxsa{$blognlp}); $w++ ) {
                                    $p_id = $wpdb->get_results("SELECT object_id FROM $blogTermRelationship WHERE term_taxonomy_id = ".$taxsa{$blognlp}[$w]);
                                    for( $q = 0; $q < count($p_id); $q++ ){
                                        $postidsa{$blognlp}[] = $p_id[$q]->object_id;
                                    }
                                }
                            }
                            // Finally let's find the posts' IDs
                            if( count($postids{$blognlp}) == 1 ) {
                                $filter_cat = " AND ID = ".$postids{$blognlp};
                                if(!empty($filter_cat)) {
                                    if( !preg_match('/\(/',$filter_cat) ) {
                                        $needle = ' AND ';
                                        $replacement = ' AND (';
                                        $filter_cat = str_replace($needle, $replacement, $filter_cat);
                                    }
                                }
                            } elseif( count($postids{$blognlp}) > 1 ) {
                                for( $v = 0; $v < count($postids{$blognlp}); $v++ ) {
                                    if( $v == 0 && $hack_cont == 0 ) {
                                        $filter_cat .= " AND ID = ".$postids{$blognlp}[$v];
                                        $hack_cont++;
                                    } elseif( $hack_cont > 0 ) {
                                        $filter_cat .= " OR ID = ".$postids{$blognlp}[$v];
                                    }
                                }
                                if(!empty($filter_cat)) {
                                    if( !preg_match('/\(/',$filter_cat) ) {
                                        $needle = ' AND ';
                                        $replacement = ' AND (';
                                        $filter_cat = str_replace($needle, $replacement, $filter_cat);
                                    }
                                }
                            } elseif( count($postidsa{$blognlp}) >= 1 ) {
                                for( $v = 0; $v < count($postidsa{$blognlp}); $v++ ) {
                                    if( $v == 0 && $hack_cont == 0 ) {
                                        $filter_cat .= " AND ID = ".$postidsa{$blognlp}[$v];
                                        $hack_cont++;
                                    } elseif( $hack_cont > 0 ) {
                                        $filter_cat .= " OR ID = ".$postidsa{$blognlp}[$v];
                                    }
                                }
                                if(!empty($filter_cat)) {
                                    if( !preg_match('/\(/',$filter_cat) ) {
                                        $needle = ' AND ';
                                        $replacement = ' AND (';
                                        $filter_cat = str_replace($needle, $replacement, $filter_cat);
                                    }
                                }
                            }
                            // --- Categories\\
                            // Get the saved options
                        $options = $wpdb->get_results("SELECT option_value FROM
                                $blogOptionsTable WHERE option_name IN ('siteurl','blogname')
                                ORDER BY option_name DESC");
                        // we fetch the title, excerpt and ID for the latest post
                        if ($how_long > 0) {
                                    if( !empty( $filter_cat ) && !empty($cat_hack) ) {
                                        // Without pagination
                                        if( !$paginate ) {
                                            $thispost = $wpdb->get_results("SELECT ID, post_title, post_excerpt
                                                   FROM $blogPostsTable WHERE post_status = 'publish'
                                                   $filter_cat )
                                                   AND post_type = '$cpt'
                                                   AND post_date >= DATE_SUB(CURRENT_DATE(), INTERVAL $how_long DAY)
                                                   ORDER BY id DESC LIMIT 0,$how_many");
                                        // Paginated results
                                        } else {
                                            $posts_per_page = $how_many;
                                            $page = isset( $_GET['pnum'] ) ? abs( (int) $_GET['pnum'] ) : 1;
                                            $total_records = $wpdb->get_var("SELECT COUNT(ID)
                                                   FROM $blogPostsTable WHERE post_status = 'publish'
                                                   $filter_cat )
                                                   AND post_type = '$cpt'
                                                   AND post_date >= DATE_SUB(CURRENT_DATE(), INTERVAL $how_long DAY)
                                                   ORDER BY id DESC");
                                            $total = $total_records;
                                            $thispost = $wpdb->get_results("SELECT ID, post_title, post_excerpt
                                                   FROM $blogPostsTable WHERE post_status = 'publish'
                                                   $filter_cat )
                                                   AND post_type = '$cpt'
                                                   AND post_date >= DATE_SUB(CURRENT_DATE(), INTERVAL $how_long DAY)
                                                   ORDER BY id DESC LIMIT ".(($page * $posts_per_page) - $posts_per_page) .",$posts_per_page");
                                        }
                                    } elseif( empty( $filter_cat ) && empty($cat_hack) ) {
                                        // Without pagination
                                        if( !$paginate ) {
                                            $thispost = $wpdb->get_results("SELECT ID, post_title, post_excerpt
                                               FROM $blogPostsTable WHERE post_status = 'publish'
                                               AND ID > 1
                                               AND post_type = '$cpt'
                                               AND post_date >= DATE_SUB(CURRENT_DATE(), INTERVAL $how_long DAY)
                                               ORDER BY id DESC LIMIT 0,$how_many");
                                        // Paginated results
                                        } else {
                                            $posts_per_page = $how_many;
                                            $page = isset( $_GET['pnum'] ) ? abs( (int) $_GET['pnum'] ) : 1;
                                            $total_records = $wpdb->get_var("SELECT COUNT(ID)
                                                   FROM $blogPostsTable WHERE post_status = 'publish'
                                                   AND ID > 1
                                                   AND post_type = '$cpt'
                                                   AND post_date >= DATE_SUB(CURRENT_DATE(), INTERVAL $how_long DAY)
                                                   ORDER BY id DESC");
                                            $total = $total_records;
                                            $thispost = $wpdb->get_results("SELECT ID, post_title, post_excerpt
                                                   FROM $blogPostsTable WHERE post_status = 'publish'
                                                   AND ID > 1
                                                   AND post_type = '$cpt'
                                                   AND post_date >= DATE_SUB(CURRENT_DATE(), INTERVAL $how_long DAY)
                                                   ORDER BY id DESC LIMIT ".(($page * $posts_per_page) - $posts_per_page) .",$posts_per_page");
                                        }
                                    }
                        } else {
                                    if( !empty( $filter_cat ) && !empty($cat_hack) ) {
                                        // Without pagination
                                        if( !$paginate ) {
                                            $thispost = $wpdb->get_results("SELECT ID, post_title, post_excerpt
                                                   FROM $blogPostsTable WHERE post_status = 'publish'
                                                   $filter_cat )
                                                   AND post_type = '$cpt'
                                                   ORDER BY id DESC LIMIT 0,$how_many");
                                        // Paginated results
                                        } else {
                                            $posts_per_page = $how_many;
                                            $page = isset( $_GET['pnum'] ) ? abs( (int) $_GET['pnum'] ) : 1;
                                            $total_records = $wpdb->get_var("SELECT COUNT(ID)
                                                   FROM $blogPostsTable WHERE post_status = 'publish'
                                                   $filter_cat )
                                                   AND post_type = '$cpt'
                                                   ORDER BY id DESC");
                                            $total = $total_records;
                                            $thispost = $wpdb->get_results("SELECT ID, post_title, post_excerpt
                                                   FROM $blogPostsTable WHERE post_status = 'publish'
                                                   $filter_cat )
                                                   AND post_type = '$cpt'
                                                   ORDER BY id DESC LIMIT ".(($page * $posts_per_page) - $posts_per_page) .",$posts_per_page");
                                        }
                                    } elseif( empty( $filter_cat ) && empty($cat_hack) ) {
                                        // Without pagination
                                        if( !$paginate ) {
                                            $thispost = $wpdb->get_results("SELECT ID, post_title, post_excerpt
                                                   FROM $blogPostsTable WHERE post_status = 'publish'
                                                   AND ID > 1
                                                   AND post_type = '$cpt'
                                                   ORDER BY id DESC LIMIT 0,$how_many");
                                        } else {
                                            $posts_per_page = $how_many;
                                            $page = isset( $_GET['pnum'] ) ? abs( (int) $_GET['pnum'] ) : 1;
                                            $total_records = $wpdb->get_var("SELECT COUNT(ID)
                                                   FROM $blogPostsTable WHERE post_status = 'publish'
                                                   AND ID > 1
                                                   AND post_type = '$cpt'
                                                   ORDER BY id DESC");
                                            $total = $total_records;
                                            $thispost = $wpdb->get_results("SELECT ID, post_title, post_excerpt
                                                   FROM $blogPostsTable WHERE post_status = 'publish'
                                                   AND ID > 1
                                                   AND post_type = '$cpt'
                                                   ORDER BY id DESC LIMIT ".(($page * $posts_per_page) - $posts_per_page) .",$posts_per_page");
                                        }
                                    }
                        }
                        // if it is found put it to the output
                        if($thispost) {
                                    // Remember we are doing this for multiple blogs?, well we need to display
                                    // the number of posts chosen for each of them
                                    for($i=0; $i < count($thispost); $i++) {
                                        // get permalink by ID.  check wp-includes/wpmu-functions.php
                                        $thispermalink = get_blog_permalink($blognlp, $thispost[$i]->ID);
                                        // If we want to show the excerpt, we do this
                                        if ($titleOnly == false || $titleOnly == 'false') {
                                            // Widget list
                                            if( ( !empty($begin_wrap) || $begin_wrap != '' ) && preg_match("/\bli\b/",$begin_wrap) && $thumbnail == false ) {
                                                echo $begin_wrap.'<div class="network-posts blog-'.$blognlp.'"><a href="'
                                                .$thispermalink.'">'.$thispost[$i]->post_title.'</a><span class="network-posts-source"> '.esc_html__('published in','eGallery').' <a href="'
                                                .$options[0]->option_value.'">'
                                                .$options[1]->option_value.'</a></span><p class="network-posts-excerpt">'.the_excerpt().'</p></div>'.$end_wrap;
                                            // Shortcode
                                            } else {
                                                // Display thumbnail
                                                if( $thumbnail ) {
                                                    if( $i == 0 ) {
                                                        echo '<div id="wrapper-'.$blognlp.'">';
                                                    }
                                                    echo $begin_wrap.'<div class="network-posts blog-'.$blognlp.'"><h1 class="network-posts-title"><a href="'
                                                    .$thispermalink.'">'.$thispost[$i]->post_title.'</a></h1><span class="network-posts-source"> '.__('published in','trans-nlp').' <a href="'
                                                    .$options[0]->option_value.'">'
                                                    .$options[1]->option_value.'</a></span><a href="'
                                                    .$thispermalink.'">'.the_post_thumbnail_by_blog($blognlp,$thispost[$i]->ID).'</a> <p class="network-posts-excerpt">'.custom_excerpt($excerpt_length, $thispost[$i]->post_excerpt, $thispermalink).'</p>';
                                                    if( $i == (count($thispost)-1) && $paginate == true ) {
                                                        echo '<div class="network-posts-pagination">';
                                                        echo paginate_links( array(
                                                            'base' => add_query_arg( 'pnum', '%#%' ),
                                                            'format' => '',
                                                            'prev_text' => __('&laquo;'),
                                                            'next_text' => __('&raquo;'),
                                                            'total' => ceil($total / $posts_per_page),
                                                            'current' => $page,
                                                            'type' => 'list'
                                                        ));
                                                        echo '</div>';
                                                        echo
                                                        '<script type="text/javascript" charset="utf-8">
                                                           jQuery(document).ready(function(){
   
                                                                   jQuery(".blog-'.$blognlp.' .network-posts-pagination a").live("click", function(e){
                                                                           e.preventDefault();
                                                                           var link = jQuery(this).attr("href");
                                                                           jQuery("#wrapper-'.$blognlp.'").html("<img src=\"'.plugins_url('/img/loader.gif', __FILE__) .'\" />");
                                                                           jQuery("#wrapper-'.$blognlp.'").load(link+" .blog-'.$blognlp.'");
   
                                                                   });
   
                                                           });
                                                       </script>';
                                                    }
                                                    echo "</div>".$end_wrap;
                                                    if($i == (count($thispost)-1)){
                                                        echo "</div>";
                                                    }
                                                // Without thumbnail
                                                } else {
                                                    if( $i == 0 ) {
                                                        echo '<div id="wrapper-'.$blognlp.'">';
                                                    }
                                                    echo $begin_wrap.'<div class="network-posts blog-'.$blognlp.'"><h1 class="network-posts-title"><a href="'
                                                    .$thispermalink.'">'.$thispost[$i]->post_title.'</a></h1><span class="network-posts-source"> '.__('published in','trans-nlp').' <a href="'
                                                    .$options[0]->option_value.'">'
                                                    .$options[1]->option_value.'</a></span><p class="network-posts-excerpt">'.custom_excerpt($excerpt_length, $thispost[$i]->post_excerpt, $thispermalink).'</p>';
                                                    if( $i == (count($thispost)-1) && $paginate == true ) {
                                                        echo '<div class="network-posts-pagination">';
                                                        echo paginate_links( array(
                                                            'base' => add_query_arg( 'pnum', '%#%' ),
                                                            'format' => '',
                                                            'prev_text' => __('&laquo;'),
                                                            'next_text' => __('&raquo;'),
                                                            'total' => ceil($total / $posts_per_page),
                                                            'current' => $page,
                                                            'type' => 'list'
                                                        ));
                                                        echo '</div>';
                                                        echo
                                                        '<script type="text/javascript" charset="utf-8">
                                                           jQuery(document).ready(function(){
   
                                                                   jQuery(".blog-'.$blognlp.' .network-posts-pagination a").live("click", function(e){
                                                                           e.preventDefault();
                                                                           var link = jQuery(this).attr("href");
                                                                           jQuery("#wrapper-'.$blognlp.'").html("<img src=\"'.plugins_url('/img/loader.gif', __FILE__) .'\" />");
                                                                           jQuery("#wrapper-'.$blognlp.'").load(link+" .blog-'.$blognlp.'");
   
                                                                   });
   
                                                           });
                                                       </script>';
                                                    }
                                                    echo "</div>".$end_wrap;
                                                    if($i == (count($thispost)-1)){
                                                        echo "</div>";
                                                    }
                                                }
                                            }
                                        // Otherwise we just show the titles (useful when used as a widget)
                                        } else {
                                            // Widget list
                                            if( $i == 0 ) {
                                                echo '<div id="wrapperw-'.$blognlp.'">';
                                            }
                                            if( preg_match("/\bli\b/",$begin_wrap) ) {
                                                echo $begin_wrap.'<div class="network-posts blogw-'.$blognlp.'"><a href="'.$thispermalink
                                                .'">'.$thispost[$i]->post_title.'</a>';
                                                if( $i == (count($thispost)-1) && $paginate == true ) {
                                                    echo '<div class="network-posts-pagination">';
                                                    echo paginate_links( array(
                                                        'base' => add_query_arg( 'pnum', '%#%' ),
                                                        'format' => '',
                                                        'show_all' => false,
                                                        'prev_text' => __('&laquo;'),
                                                        'next_text' => __('&raquo;'),
                                                        'total' => ceil($total / $posts_per_page),
                                                        'current' => $page,
                                                        'type' => 'list'
                                                    ));
                                                    echo '</div>';
                                                    echo
                                                    '<script type="text/javascript" charset="utf-8">
                                                       jQuery(document).ready(function(){
   
                                                               jQuery(".blogw-'.$blognlp.' .network-posts-pagination a").live("click", function(e){
                                                                       e.preventDefault();
                                                                       var link = jQuery(this).attr("href");
                                                                       jQuery("#wrapperw-'.$blognlp.'").html("<img src=\"'.plugins_url('/img/loader.gif', __FILE__) .'\" />");
                                                                       jQuery("#wrapperw-'.$blognlp.'").load(link+" .blogw-'.$blognlp.'");
   
                                                               });
   
                                                       });
                                                   </script>';
                                                }
                                                echo '</div>'.$end_wrap;
                                                if($i == (count($thispost)-1)){
                                                    echo "</div>";
                                                }
                                            // Shortcode
                                            } else {
                                                if( $i == 0 ) {
                                                    echo '<div id="wrapper-'.$blognlp.'">';
                                                }
                                                echo $begin_wrap.'<div class="network-posts blog-'.$blognlp.'"><h1 class="network-posts-title"><a href="'.$thispermalink
                                                .'">'.$thispost[$i]->post_title.'</a></h1>';
                                                if( $i == (count($thispost)-1) && $paginate == true ) {
                                                    echo '<div class="network-posts-pagination">';
                                                    echo paginate_links( array(
                                                        'base' => add_query_arg( 'pnum', '%#%' ),
                                                        'format' => '',
                                                        'prev_text' => __('&laquo;'),
                                                        'next_text' => __('&raquo;'),
                                                        'total' => ceil($total / $posts_per_page),
                                                        'current' => $page,
                                                        'type' => 'list'
                                                    ));
                                                    echo '</div>';
                                                    echo
                                                    '<script type="text/javascript" charset="utf-8">
                                                       jQuery(document).ready(function(){
   
                                                               jQuery(".blog-'.$blognlp.' .network-posts-pagination a").live("click", function(e){
                                                                       e.preventDefault();
                                                                       var link = jQuery(this).attr("href");
                                                                       jQuery("#wrapper-'.$blognlp.'").html("<img src=\"'.plugins_url('/img/loader.gif', __FILE__) .'\" />");
                                                                       jQuery("#wrapper-'.$blognlp.'").load(link+" .blog-'.$blognlp.'");
   
                                                               });
   
                                                       });
                                                   </script>';
                                                }
                                                echo '</div>'.$end_wrap;
                                                if($i == (count($thispost)-1)){
                                                    echo "</div>";
                                                }
                                            }
                                        }
                                    }
                                    // Count only when all posts has been displayed
                                    $counter++;
                        }
                        // don't go over the limit of blogs
                        if($counter >= $nblogs) {
                                break;
                        }
                }
        }
    }
?>