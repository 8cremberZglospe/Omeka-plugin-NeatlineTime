<?php
/**
 * The browse view for the Timelines administrative panel.
 *
 * @author Scholars' Lab
 * @copyright 2011 The Board and Visitors of the University of Virginia
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @package Timeline
 * @subpackage Views
 * @link http://omeka.org/codex/Plugins/NeatlineTime
 * @since 1.0
 */

$head = array('bodyclass' => 'timelines primary', 
              'title' => html_escape('Neatline Time | Timelines'));
head($head);
?>
<h1><?php echo $head['title']; ?></h1>
<p id="add-timeline" class="add-button"><a class="add" href="<?php echo html_escape(uri('neatline-time/timelines/add')); ?>">Add a Timeline</a></p>
<div id="primary">
<?php echo flash(); ?>
<?php if (has_timelines_for_loop()) : ?>
<div class="pagination"><?php echo pagination_links(); ?></div>
<table>
    <thead id="timelines-table-head">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <?php if (has_permission('NeatlineTime_Timelines', 'edit')): ?>
            <th>Edit Metadata</th>
            <th>Edit Item Query</th>
            <?php endif; ?>
            <?php if (has_permission('NeatlineTime_Timelines', 'delete')): ?>
            <th>Delete</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody id="types-table-body">
<?php while (loop_timelines()) : ?>
        <tr>
            <td class="timeline-title"><?php echo link_to_show_timeline(); ?></td>
            <td><?php echo snippet_by_word_count(timeline('description'), '50'); ?></td>
            <?php if (has_permission(get_current_timeline(), 'edit')): ?>
            <td><?php echo link_to_edit_timeline('Edit Metadata'); ?></td>
            <td><?php echo link_to_edit_timeline_query('Edit Query'); ?></td>
            <?php endif; ?>
            <?php if (has_permission(get_current_timeline(), 'delete')): ?>
            <td><?php echo timeline_delete_button(get_current_timeline()); ?></td>
            <?php endif; ?>
        </tr>
<?php endwhile; ?>
    </tbody>
</table>
<?php else : ?>
    <p>There are no timelines. <?php if (has_permission('NeatlineTime_Timelines', 'add')): ?><a href="<?php echo html_escape(uri('neatline-time/timelines/add')); ?>">Add a new Timeline.</a><?php endif; ?></p>
<?php endif; ?>
</div>
<?php foot(); ?>
