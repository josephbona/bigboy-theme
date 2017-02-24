<?php
/**
 * Template part for displaying next section button.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpstarter
 */

$next_section = [];
$next_section['id'] = intval(get_post_meta( get_the_ID(), 'next_section_id', true ));
$next_section['title'] = get_page($next_section['id'])->post_title;
if ($next_section['id']) :
?>
<div class="col-sm-12">
  <div class="next-step text-center hidden-xs">
    <h4>Continue To Next Section:</h4>
    <p>
      <a href="<?php echo get_page_link($next_section['id']); ?>" class="btn btn-primary"><?php echo $next_section['title']; ?></a>
      <!-- <a href="<?php echo get_page_link(29); ?>" class="btn btn-primary">Apply Now!</a> -->
    </p>
  </div>
</div>
<?php
endif;
