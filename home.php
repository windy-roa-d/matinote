<?php
/****************************************

	Template Name: Top

トップページ（フロントページ）用のphpファイルです。
WordPress上の指定固定ページをフロントページに設定し
固定ページの属性＞テンプレートを「top」に指定することで適応されます。
上段のTemplate Nameを取得しているため削除しないようお気をつけて。

*****************************************/
?>
<?php get_header(); ?>
<style type="text/css">
    /* フロントページのみ、2カラム表示を取り消す */
    #sidebar{
        display:none;
    }
    #main{
        width:auto;
        border: none;
    }
    .ad-right{
        float:left;
    }
</style>

<div id="frontPage-wrap">
    <div id="frontPage-topics">
        <div class="frontPage-newTopic">
        <?php
        global $post;
        $args = array( 'posts_per_page' => 1,'post_type' => 'post' );
        $myposts = get_posts( $args );
        foreach( $myposts as $post ) { setup_postdata($post); ?>
            <a class="topicCard" href="<?php the_permalink() ?>">
            <div>
                <div class="frontPage-date"><?php the_time('Y.m.d') ?></div>
                <h2><?php the_title(); ?></h2>
                <?php the_post_thumbnail('medium'); ?>
                <div class="frontPage-excerpt"><?php the_excerpt(); ?></div>
            </div>
            </a>
            <div class="frontPage-tags"><ul><?php the_tags('<li  class="tags">#','</li><li class="tags">#','</li>'); ?></ul></div>
        <?php
        }
        wp_reset_postdata();
        ?>
        </div>
        <div class="frontPage-randomTopic">
        <?php
        $args = array( 'numberposts' => 1, 'orderby' => 'rand', 'post_type' => 'post');
        $rand_posts = get_posts( $args );
        foreach( $rand_posts as $post ) : ?>
            <a class="topicCard" href="<?php the_permalink() ?>">
            <div>
                <div class="frontPage-date"><?php the_time('Y.m.d') ?></div>
                <h2><?php the_title(); ?></h2>
                <?php the_post_thumbnail('medium'); ?>
                <div class="frontPage-excerpt"><?php the_excerpt(); ?></div>
            </div>
            </a>
            <div class="frontPage-tags"><ul><?php the_tags('<li  class="tags">#','</li><li class="tags">#','</li>'); ?></ul></div>
        <?php endforeach; ?>
        </div>
    </div>
    
    <hr>
    
    <div id="frontPage-others">
        
        <div class="tag-and-search">
            <div class="googlesearch">
                <script>
                  (function() {
                    var cx = '*********************:_poipsd0myy';
                    var gcse = document.createElement('script');
                    gcse.type = 'text/javascript';
                    gcse.async = true;
                    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
                        '//www.google.com/cse/cse.js?cx=' + cx;
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(gcse, s);
                  })();
                </script>
                <gcse:searchbox-only></gcse:searchbox-only>
            </div>
            <div class="tagcloud"><h2>タグから見る</h2>
            <?php
                $args = array(
					'order' 	=> "RAND",
                    'number' 	=> 15,
                    'format' 	=> "list",
                    'smallest'  => 13,
                    'largest'   => 13,
                    'unit'   => "px"
				);
                $posttags = wp_tag_cloud( $args );
            ?>
            
            </div>
        </div>
                
        <div class="frontPage-info"><h2>インフォメーション</h2>
        <aside id="information">
				<?php /** カスタム投稿タイプ「お知らせ」を表示 */
				$args = array(
					'post_type' 		=> 'information',
					'posts_per_page' 	=> 3,
				);
				$information = new WP_Query( $args );
				if ( $information->have_posts() ) : /** 「お知らせ」用のサブループ開始 */ ?>
					<ul>
						<?php while ( $information->have_posts() ) : $information->the_post(); ?>
							<li class="frontPage-infodate">
								<a href="<?php the_permalink(); ?>">
								<span><?php the_time('Y.m.d') ?>&nbsp;&nbsp;</span><span><?php the_title(); ?></span></a>
							</li>

						<?php endwhile; ?>
					</ul>
				<?php else : ?>
					<p>現在お知らせはありません。</p>
				<?php endif; /** サブループ終了 */
				wp_reset_postdata(); ?>
		</aside><!-- / information -->
        </div>
    </div>
</div>

<?php get_footer(); ?>