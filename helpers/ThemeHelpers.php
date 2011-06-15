<?php
/**
 * Timeline helper functions
 *
 * @author    Scholars' Lab
 * @copyright 2010-2011 The Board and Visitors of the University of Virginia
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @version   $Id$
 * @package   Timeline
 * @link      http://omeka.org/codex/Plugins/Timeline
 */

/**
 * Create a timeline widget
 *
 * @param Item The Omeka Item object.
 * @return string HTML
 *
 */
function display_timeline_for_item($timelineHeight = '200px;', $echo = false, $item = null) {
    if (!$item) {
        $item = get_current_item();
    }

    $html = '';
    if ($timelineItems = get_items_for_timeline($item)) {
        $div = 'timelinediv'.$item->id;

        $html = '<div id="'.$div.'" style="height: '.$timelineHeight. '"></div>'
              . '<script>'
              . 'SimileAjax.History.enabled = false;'
              . 'var TLtmp = new Object();'
              . 'TLtmp.timelinediv = "'.$div.'";'
              . 'TLtmp.events = [';

        $tmp = array();

        foreach ($timelineItems as $timelineItem) {
            array_push($tmp, get_timeline_json_for_item($timelineItem));
        }

        $json = implode(',',$tmp);

        $html = $html . $json;

        $html = $html . '];'
              . '$(document).ready(function() {'
              . 'Omeka.Timeline.createTimeline(TLtmp);'
              . '});'
              . '$(window).resize(Omeka.Timeline.onResize);'
              . '</script>';
    }
    return $html;
}

/**
 * Returns items with a non-empty Date field that have a Tag from the given 
 * Timeline item.
 *
 * @param Item The Timeline Item object.
 * @return array An array of Omeka Items.
 */
function get_items_for_timeline($item = null) {
    if (!$item) {
        $item = get_current_item();
    }

    // Get the tag associated with the Timeline item type metadata.
    $timelineTags = $item->getElementTextsByElementNameAndSetName('Tag', 'Item Type Metadata');
    $timelineTag = $timelineTags[0]->text;
    
    $db = get_db();
    
    // Get the ID for the Dublin Core: Date field, to use in our other queries.
    $dcDateField = $db->getTable('Element')->findByElementSetNameAndElementName('Dublin Core', 'Date');
            
    // Parameters for searching items with a Dublin Core: Date field that is not empty.
    $params = array('advanced_search' => array(
                    array('element_id' => $dcDateField->id,
                          'type' => 'is not empty'
                        )
                    ),
                    'tags' => array($timelineTag)
              );
              
    // Get all items tagged with Timeline item type Tag with non-empty Date fields.
    return $db->getTable('Item')->findBy($params, null);
}

/**
 * Returns Timeline JSON string for a given item.
 *
 * @param Item
 * @return string JSON string.
 */
function get_timeline_json_for_item($item = null) {
    $html = '';
    if ($item) {
        $html = "{'title' : " . js_escape(item('Dublin Core', 'Title', array(), $item)) . ","
              . " 'start' : " . js_escape(date('r', strtotime(item('Dublin Core', 'Date', array(), $item)))) . ","
              . " 'description' : " . js_escape(item('Dublin Core', 'Description', array(), $item)) . ","
              . " 'link' : " . js_escape(abs_item_uri($item)) . ","
              . " 'durationEvent' : false ,"
              . " 'eventID' : " . $item->id . ","
              . " 'classname': 'neatline-item-" . $item->id . "'"
              . "}";
    }
    return $html;
}