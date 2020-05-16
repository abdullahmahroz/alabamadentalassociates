<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to imedica_comment() which is
 * located in the functions.php file.
 *
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	<div class="imedica-row comments-area">
		<div class="container imedica-container">
			<?php // You can start editing here -- including this comment! ?>
			<?php if ( have_comments() ) : ?>
				<h2 class="imedica-comments-title">
					<?php
					printf( _n( 'One Comment', '%1$s Comments', get_comments_number(), 'imedica' ),
						number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
					?>
				</h2>
				<ol class="imedica-commentlist">
					<?php wp_list_comments( array( 'callback' => 'imedica_comment', 'style' => 'ol' ) ); ?>
				</ol><!-- .commentlist -->
				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
					<nav id="comment-nav-below" class="navigation" role="navigation">
						<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'imedica' ); ?></h1>

						<div
							class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'imedica' ) ); ?></div>
						<div
							class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'imedica' ) ); ?></div>
					</nav>
				<?php endif; // check for comment navigation ?>
				<?php
				/* If there are no comments and comments are closed, let's leave a note.
				 * But we only want the note on posts and pages that had comments in the first place.
				 */
				if ( ! comments_open() && get_comments_number() ) : ?>
					<p class="imedica-nocomments"><?php _e( 'Comments are closed.', 'imedica' ); ?></p>
				<?php endif; ?>
			<?php endif; // have_comments() ?>
			<?php //comment_form();
			$commenter = wp_get_current_commenter();
			$req       = get_option( 'require_name_email' );
			$aria_req  = ( $req ? " aria-required='true'" : '' );
			$args      = array(
				'id_form'              => 'imedica-commentform',
				'title_reply'          => __( 'Leave a Comment', 'imedica' ),
				'cancel_reply_link'    => __( 'Cancel Reply', 'imedica' ),
				'label_submit'         => __( 'Post Comment', 'imedica' ),
				'comment_field'        => '<fieldset class="comment-form-comment"><div class="comment-form-textarea"><textarea id="comment" name="comment" placeholder="' . __( "Comment...", "imedica" ) . '" cols="45" rows="8" aria-required="true">' .
				                          '</textarea></div></fieldset>',
				'must_log_in'          => '<p class="must-log-in">' .
				                          sprintf(
					                          __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
					                          wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
				                          ) . '</p>',
				'logged_in_as'         => '<p class="logged-in-as">' .
				                          sprintf(
					                          __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
					                          admin_url( 'profile.php' ),
					                          $user_identity,
					                          wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) )
				                          ) . '</p>',
				'comment_notes_before' => '<p class="comment-notes">' .
				                          '' .
				                          '</p>',
				'comment_notes_after'  => '<p class="form-allowed-tags"></p>',
				'fields'               => apply_filters( 'comment_form_default_fields', array(
						'author' =>
							'<div class="imedica-comment-formwrap"><p class="comment-form-author">' .
							'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
							'" placeholder="' . __( "Name*", "imedica" ) . '" size="30"' . $aria_req . ' /></p>',
						'email'  =>
							'<p class="comment-form-email">' .
							'<input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) .
							'" placeholder="' . __( "Email*", "imedica" ) . '"" size="30"' . $aria_req . ' /></p>',
						'url'    =>
							'<p class="comment-form-url"><label for="url">' .
							'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
							'" placeholder="' . __( "Website", "imedica" ) . '" size="30" /></label></p></div>'
					)
				),
			);
			comment_form( $args );
			?>
		</div>
		<!-- comments container -->
	</div>
	<!-- comments row -->
</div><!-- #comments .comments-area -->
