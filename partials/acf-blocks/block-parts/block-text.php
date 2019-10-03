<?php
    if(isset($column) && ($column === 'column_1' || $column === 'column_2')) {
        $advanced_sections = $col['advanced_sections'];
        if(in_array('video', $col['advanced_sections'])) {
            $content_block_content = '<div class="name">'.$col['text_line_2'].'</div>';
            $content_block_content .= '<div class="title">'.$col['description'].'</div>';
            $content_block_content .= '<div class="description"><p>'.$col['text_line_1'].'</p></div>';
        } else {
            $content_block_content = $col['content_block_content'];
        }
    } else if(isset($col['advanced_sections'])) {
        $advanced_sections = $col['advanced_sections'];
        if(in_array('video', $col['advanced_sections']) && isset($col_set) && $col_set == 1) {
            $content_block_content = '<div class="name">'.$col['text_line_2'].'</div>';
            $content_block_content .= '<div class="title">'.$col['description'].'</div>';
            $content_block_content .= '<div class="description"><p>'.$col['text_line_1'].'</p></div>';
        } else {
            $content_block_content = $col['content_block_content'];
        }
    } else if(isset($col['content_block'])) {
        $advanced_sections = ['content-block'];
        if($col['video'] && isset($col_set) && $col_set == 1) {
            $content_block_content = '<div class="name">'.$col['text_line_2'].'</div>';
            $content_block_content .= '<div class="title">'.$col['description'].'</div>';
            $content_block_content .= '<div class="description"><p>'.$col['text_line_1'].'</p></div>';
        } else {
            $content_block_content = $col['content_block_content'];
        }
    } else {
        $advanced_sections = get_field('advanced_sections');
        $content_block_content = get_field('content_block_content');
    }
?>
<?php if(in_array('content-block', $advanced_sections)) { ?>
    <div class="content-block animate">
        <?= $content_block_content; ?>
    </div>
<?php } ?>