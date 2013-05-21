<?php
/**
 * The show view for the Timelines administrative panel.
 */

queue_timeline_assets();
$timelineTitle = metadata($neatline_time_timeline, 'title');
$head = array('bodyclass' => 'timelines primary', 
              'title' => __('Neatline Time | %s', strip_formatting($timelineTitle))
              );
echo head($head);
?>
  <h1><?php echo $timelineTitle; ?> <span class="view-public-page">[ <a href="<?php echo html_escape(public_url('neatline-time/timelines/show/'.timeline('id'))); ?>"><?php echo __('View Public Page'); ?></a> ]</h1>
<?php if (is_allowed($neatline_time_timeline, 'edit')): ?>
<p id="edit-timeline" class="edit-button">
    <?php echo link_to($neatline_time_timeline, 'edit', __('Edit Metadata'), array('class' => 'edit')); ?>
    <?php echo link_to($neatline_time_timeline, 'query', __('Edit Items Query'), array('class' => 'edit')); ?>
</p>
<?php endif; ?>

<div id="primary">

    <!-- Construct the timeline. -->
    <?php echo $this->partial('timelines/_timeline.php'); ?>

        <h2><?php echo __('Items Query'); ?></h2>
        <p><strong><?php echo __('The &#8220;%s&#8221; timeline displays items that match the following query:', $timelineTitle); ?></strong></p>
        <?php $query = unserialize($neatline_time_timeline->query); echo item_search_filters($query); ?>

</div>
<?php foot(); ?>
