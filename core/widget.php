<?php
class Widget_Contents_Post extends Widget_Abstract_Contents
{
    public function execute()
    {
        $select = $this->select();
        $select->cleanAttribute('fields');
        $this->db->fetchAll(
            $select
                ->from('table.contents')
                ->where('table.contents.type = ?', 'post')
                ->where('table.contents.cid = ?', $this->parameter->cid)
                ->limit(1),
            array($this, 'push')
        );
    }
}
//后台编辑器加按钮
Typecho_Plugin::factory('admin/write-post.php')->bottom = array('Editor', 'edit');
Typecho_Plugin::factory('admin/write-page.php')->bottom = array('Editor', 'edit');

class Editor
{
    public static function edit()
    {
        echo "<script src='" . Helper::options()->themeUrl . '/assets/editor/editor.min.js' . "'></script>";
    }
}
