<?php
/**
 * Template part for displaying top banner on child pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpstarter
 */

$parent = get_ancestors($post->ID,'page')[0];
$parent_title = get_page( $parent )->post_title;
$parent_content = get_page( $parent )->post_content;
?>
<section class="page-banner">
  <h2 class="title"><?php echo $parent_title; ?></h2>
  <?php echo $parent_content; ?>
  <ul class="list-inline">
    <li class="descriptor">In This Section:</li>
    <?php
    wp_list_pages(array(
      'child_of' => $parent,
      'title_li' => null,
    ));
    ?>
  </ul>
</section>