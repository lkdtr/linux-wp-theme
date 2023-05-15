<?php // Do not delete these lines
    if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly. Thanks!');

    if (!empty($post->post_password)) { // if there's a password
        if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
            ?>

            <p class="nocomments">Bu yazı, parola korumalıdır. Yorumları görüntülemek için lütfen parolanızı giriniz.</p>

            <?php
            return;
        }
    }

    /* This variable is for alternating comment background */
    $oddcomment = 'alt';
?>

<!-- You can start editing here. -->

<div id="comments">
<?php if (have_comments()) : ?>
    <h3 id="comments">&#8220;<?php the_title(); ?>&#8221; için <?php comments_number('Yorum Yok', '1 Yorum', '% Yorum' );?></h3>

    <ul class="commentlist">

    <?php foreach ($comments as $comment) : ?>
        <li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
            <?php if(function_exists('get_avatar')){ echo get_avatar($comment, '50'); } ?>
            <h4><?php comment_author_link() ?>:</h4>
            <small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('j F Y') ?>, <?php comment_time('g:i a') ?></a></small>

            <p><?php comment_text() ?></p>

            <?php if ($comment->comment_approved == '0') : ?>
            <em>(Yorumunuz onaylandıktan sonra yayınlanacaktır.)</em>
            <?php endif; ?>

            <?php edit_comment_link('Düzenle','',''); ?>
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

    <h3 id="respond">Yorum Yazın</h3>
    <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
        <p>Yorum yazmak için <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">giriş yapmalısınız</a>.</p>
    <?php else : ?>

    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
        <?php if ( $user_ID ) : ?>
        <p><a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> olarak giriş yapıldı. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Bu hesaptan çıkış yap">Çıkış yap &raquo;</a></p>

        <?php else : ?>
        <p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
        <label for="author"><small>İsim, Soyisim (gerekli)</small></label></p>

        <p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
        <label for="email"><small>Eposta (yayınlanmayacaktır) (gerekli)</small></label></p>

        <p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
        <label for="url"><small>İnternet Sitesi</small></label></p>

        <?php endif; ?>

        <p><textarea name="comment" id="comment"></textarea></p>

        <input name="submit" type="submit" id="submit" tabindex="5" value="Gönder" />
        <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
        <?php do_action('comment_form', $post->ID); ?>

    </form>

<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head :) ?>
</div>
