<?php
$input_value = $_POST['input_value'] ?? '';
function highlightWords($text, $word)
{
    $text = preg_replace('#' . preg_quote($word) . '#i', '<span class="search_colr">\\0</span>', $text);
    return $text;
}

if ($aci_ajx_query->have_posts()) {
    while ($aci_ajx_query->have_posts()) {
        $aci_ajx_query->the_post();

        $aci_item_id        = get_the_ID();
        $aciind_description = get_field('aciind_description');
        $get_the_title      = get_the_title();

        $title              = !empty($input_value) ? highlightWords($get_the_title, $input_value) : $get_the_title;
        $contnet            = !empty($input_value) ? highlightWords($aciind_description, $input_value) : $aciind_description;

        echo $title;
        echo $contnet;
    }
    wp_reset_query();
}
