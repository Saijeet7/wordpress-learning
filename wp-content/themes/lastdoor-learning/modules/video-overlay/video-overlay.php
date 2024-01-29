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
function e11_video_overlay($args = array(), $use_page_content = false, $get_field_type = 'get_field', $field_location = '', $prefix = false)
{

    $prefix = "vo_";
    if (empty($args) && !$use_page_content):
        return false;
    endif;

    if ($use_page_content):
        $defaults = array(
            'type' => $get_field_type($prefix . 'type', $field_location),
            'title' => $get_field_type($prefix . 'title', $field_location),
            'subtitle' => $get_field_type($prefix . 'subtitle', $field_location),
            'option' => $get_field_type($prefix . 'option', $field_location),
            'media' => $get_field_type($prefix . 'media', $field_location),
            'link' => $get_field_type($prefix . 'link', $field_location),
            'play' => $get_field_type($prefix . 'play', $field_location),
            'background' => $get_field_type($prefix . 'background', $field_location),
            'settings' => $get_field_type($prefix . 'setting', $field_location),
            'height_desktop' => $get_field_type($prefix . 'height_desktop', $field_location),
            'height_tablet' => $get_field_type($prefix . 'height_tablet', $field_location),
            'height_mobile' => $get_field_type($prefix . 'height_mobile', $field_location),
        );
    else:
        $defaults = array(
            'type' => false,
            'title' => false,
            'subtitle' => false,
            'option' => false,
            'media' => array(),
            'link' => array(),
            'play' => false,
            'background' => false,
            'settings' => '',
            'height_desktop' => false,
            'height_tablet' => false,
            'height_mobile' => false,
        );
    endif;

    $data = array_merge($defaults, $args);
    if ($data['settings']['module_status'] == '1'):
        if (!empty($data['title']) or !empty($data['subtitle']) or !empty($data['media']) or !empty($data['link'])):
            include 'tpl/video-overlay.tpl.php';
        endif;
    endif;
    return true;
}
