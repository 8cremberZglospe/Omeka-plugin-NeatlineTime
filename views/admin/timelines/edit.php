<?php
/**
 * The edit view for the Timelines administrative panel.
 *
 * PHP 5
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at http://www.apache.org/licenses/LICENSE-2.0 Unless required by
 * applicable law or agreed to in writing, software distributed under the
 * License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS
 * OF ANY KIND, either express or implied. See the License for the specific
 * language governing permissions and limitations under the License.
 */

queue_timeline_assets();
queue_js('tiny_mce/tiny_mce');
$head = array('bodyclass' => 'timelines primary', 
              'title' => html_escape('Neatline Time | Edit a Timeline'));
head($head);
?>
<h1><?php echo $head['title']; ?></h1>
<div id="primary">
<?php echo $form; ?>

<script>
jQuery(document).ready(function($){
    Omeka.wysiwyg();
});
</script>

</div>
<?php foot(); ?>
