<?php
/**
 * @param array $args - override the module with custom content (ie: page builder or some other special content)
 * @param bool $use_page_content - pull in defaults from the page ACF fields
 * @param string $get_field_type - either get_field or get_sub_field depending on if this is coming from page builder or not
 * @param string $field_location - either an ID of the page or 'option' if it is an archive page
 * @param bool $prefix - prepended to the get_field for things like archive site options
 * @return bool
 * Usage on page template / $page_id = get_the_ID(); / e11_module_name(array(), true, 'get_field', $page_id);
 */
function e11_text_block($args = array(), $use_page_content = false, $get_field_type = 'get_field', $field_location = '', $prefix = false)
{

    $prefix = "tb_";
    if (empty($args) && !$use_page_content):
        return false;
    endif;

    if ($use_page_content):
        $defaults = array(
            'type' => $get_field_type($prefix . 'type', $field_location),
            'title' => $get_field_type($prefix . 'title', $field_location),
            'title-strong' => $get_field_type($prefix . 'title-strong', $field_location),
            'description' => $get_field_type($prefix . 'description', $field_location),
            'content-grid' => $get_field_type($prefix . 'content-grid', $field_location),
            'settings' => $get_field_type($prefix . 'setting', $field_location),
        );
    else:
        $defaults = array(
            'type' => false,
            'content' => false,
            'title' => false,
            'title-strong' => false,
            'description' => false,
            'content-grid' => array(),
            'settings' => '',
        );
    endif;

    $data = array_merge($defaults, $args);
    if ($data['settings']['module_status'] == '1'):
        if (!empty($data['title']) or !empty($data['title-strong']) or !empty($data['description']) or !empty($data['content-grid'])):
            include 'tpl/text-block.tpl.php';
        endif;
    endif;
    return true;
}
