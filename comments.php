<?php // Do not delete these lines
    if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly. Thanks!');

    if ( post_password_required() ) { // if there's a password and it doesn't match the cookie
        ?>

        <p class="nocomments"><?php esc_html_e( 'Bu yazı, parola korumalıdır. Yorumları görüntülemek için lütfen parolanızı giriniz.', 'linux-wp-theme' ); ?></p>

        <?php
        return;
    }

    /* This variable is for alternating comment background */
    $oddcomment = 'alt';
?>

<!-- You can start editing here. -->

<div id="comments">
<?php if (have_comments()) : ?>
    <h3 id="comments">&#8220;<?php the_title(); ?>&#8221; <?php esc_html_e( 'için', 'linux-wp-theme' ); ?> <?php comments_number( __( 'Yorum Yok', 'linux-wp-theme' ), __( '1 Yorum', 'linux-wp-theme' ), __( '% Yorum', 'linux-wp-theme' ) );?></h3>

    <ul class="commentlist">

    <?php foreach ($comments as $comment) : ?>
        <li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
            <?php if(function_exists('get_avatar')){ echo get_avatar($comment, '50'); } ?>
            <h4><?php comment_author_link() ?>:</h4>
            <small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('j F Y') ?>, <?php comment_time('g:i a') ?></a></small>

            <p><?php comment_text() ?></p>

            <?php if ($comment->comment_approved == '0') : ?>
            <em>(<?php esc_html_e( 'Yorumunuz onaylandıktan sonra yayınlanacaktır.', 'linux-wp-theme' ); ?>)</em>
            <?php endif; ?>

            <?php edit_comment_link( __( 'Düzenle', 'linux-wp-theme' ), '', '' ); ?>
        </li>

    <?php /* Changes every other comment to a different class */
        if ('alt' == $oddcomment) $oddcomment = '';
        else $oddcomment = 'alt';
    ?>

    <?php endforeach; /* end for each comment */ ?>

    </ul>

 <?php else : // this is displayed if there are no comments so far ?>

    <?php if ('open' == $post->comment_status) : ?>
        <!-- If comments are open, but there are no comments. -->

    <?php else : // comments are closed ?>
        <!-- If comments are closed. -->

    <?php endif; ?>
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>

    <h3 id="respond"><?php esc_html_e( 'Yorum Yazın', 'linux-wp-theme' ); ?></h3>
    <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
        <p>
          <?php esc_html_e( 'Yorum yazmak için', 'linux-wp-theme' ); ?>
          <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>"><?php esc_html_e( 'giriş yapmalısınız', 'linux-wp-theme' ); ?></a>.
        </p>
    <?php else : ?>

    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
        <?php if ( $user_ID ) : ?>
        <p>
          <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo esc_html( $user_identity ); ?></a>
          <?php esc_html_e( 'olarak giriş yapıldı.', 'linux-wp-theme' ); ?>
          <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php esc_attr_e( 'Bu hesaptan çıkış yap', 'linux-wp-theme' ); ?>"><?php echo __( 'Çıkış yap &raquo;', 'linux-wp-theme' ); ?></a>
        </p>

        <?php else : ?>
        <p><input type="text" name="author" id="author" value="<?php echo esc_attr( $comment_author ); ?>" size="22" tabindex="1" />
        <label for="author"><small><?php esc_html_e( 'İsim, Soyisim (gerekli)', 'linux-wp-theme' ); ?></small></label></p>

        <p><input type="text" name="email" id="email" value="<?php echo esc_attr( $comment_author_email ); ?>" size="22" tabindex="2" />
        <label for="email"><small><?php esc_html_e( 'Eposta (yayınlanmayacaktır) (gerekli)', 'linux-wp-theme' ); ?></small></label></p>

        <p><input type="text" name="url" id="url" value="<?php echo esc_attr( $comment_author_url ); ?>" size="22" tabindex="3" />
        <label for="url"><small><?php esc_html_e( 'İnternet Sitesi', 'linux-wp-theme' ); ?></small></label></p>

        <?php endif; ?>

        <p><textarea name="comment" id="comment"></textarea></p>

        <input name="submit" type="submit" id="submit" tabindex="5" value="<?php esc_attr_e( 'Gönder', 'linux-wp-theme' ); ?>" />
        <input type="hidden" name="comment_post_ID" value="<?php echo esc_attr( $id ); ?>" />
        <?php do_action('comment_form', $post->ID); ?>

    </form>

<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head :) ?>
</div>
