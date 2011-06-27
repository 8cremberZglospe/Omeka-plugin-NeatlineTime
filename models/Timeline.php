<?php
/**
 * Timeline record.
 *
 * @author      Scholars' Lab
 * @author      Jeremy Boggs
 * @copyright   2011 The Board and Visitors of the University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0
 * @version     $Id$
 * @package     Timeline
 * @link        http://omeka.org/codex/Plugins/Timeline
 */
class Timeline extends Omeka_Record implements Zend_Acl_Resource_Interface
{
    public $title;
    public $description;
    public $creator_id;
    public $public = 0;
    public $featured = 0;
    public $added;
    public $modified;

    protected $_related = array('Tags'=>'getTags');

    protected function _initializeMixins()
    {
        $this->_mixins[] = new Taggable($this);
        $this->_mixins[] = new PublicFeatured($this);
    }

    /**
     * Things to do in the beforeInsert() hook:
     *
     * Set the creator_id to the current user.
     *
     * @return void
     */
    protected function beforeInsert()
    {
        $user = Omeka_Context::getInstance()->getCurrentUser();
        $this->creator_id = $user->id;
    }

    /**
     * Things to do in the beforeSave() hook:
     *
     * Explicitly set the modified timestamp.
     *
     * @return void
     */
    protected function beforeSave()
    {
        $this->modified = Zend_Date::now()->toString(self::DATE_FORMAT);
    }

    /**
     * Required by Zend_Acl_Resource_Interface.
     *
     * Identifies Timeline records as relating to the Timelines ACL resource.
     *
     * @return string
     */
    public function getResourceId()
    {
        return 'Timeline_Timelines';
    }
}