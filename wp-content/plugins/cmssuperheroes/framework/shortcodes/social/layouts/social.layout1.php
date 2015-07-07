<?php if ($title != "" || $description != "") { ?>
    <header class="cshero-header <?php echo $heading_style;?>">
        <?php if ($title != "") { ?>
            <<?php echo $heading_size;?> class="cs-title <?php echo $title_align; ?>" style="color:<?php echo $title_color;?>;">
                <span class="line"><?php echo $title; ?></span>
            </<?php echo $heading_size;?>>
        <?php } ?>
        <?php if ($description != "") { ?>
            <p class="cshero-decs"><?php echo $description; ?></p>
        <?php } ?>
    </header>
<?php } ?>                
<div class="cshero_content_<?php echo $date;?> cshero-social-list ">
    <?php if($icon1 !='') {?>
        <a href="<?php echo $icon1_link?>" style="font-size:<?php echo $icon_size; ?>"><i <?php echo $style; ?> class="fa fa-<?php echo $icon1; ?>"></i></a>
    <?php } ?>
    <?php if($icon2 !='') {?>
        <a href="<?php echo $icon2_link?>" style="font-size:<?php echo $icon_size; ?>"><i <?php echo $style; ?> class="fa fa-<?php echo $icon2; ?>"></i></a>
    <?php } ?>
    <?php if($icon3 !='') {?>
        <a href="<?php echo $icon3_link?>" style="font-size:<?php echo $icon_size; ?>"><i <?php echo $style; ?> class="fa fa-<?php echo $icon3; ?>"></i></a>
    <?php } ?>
    <?php if($icon4 !='') {?>
        <a href="<?php echo $icon4_link?>" style="font-size:<?php echo $icon_size; ?>"><i <?php echo $style; ?> class="fa fa-<?php echo $icon4; ?>"></i></a>
    <?php } ?>
    <?php if($icon5 !='') {?>
        <a href="<?php echo $icon5_link?>" style="font-size:<?php echo $icon_size; ?>"><i <?php echo $style; ?> class="fa fa-<?php echo $icon5; ?>"></i></a>
    <?php } ?>
    <?php if($icon6 !='') {?>
        <a href="<?php echo $icon6_link?>" style="font-size:<?php echo $icon_size; ?>"><i <?php echo $style; ?> class="fa fa-<?php echo $icon6; ?>"></i></a>
    <?php } ?>
    <?php if($icon7 !='') {?>
        <a href="<?php echo $icon7_link?>" style="font-size:<?php echo $icon_size; ?>"><i <?php echo $style; ?> class="fa fa-<?php echo $icon7; ?>"></i></a>
    <?php } ?>
    <?php if($icon8 !='') {?>
        <a href="<?php echo $icon8_link?>" style="font-size:<?php echo $icon_size; ?>"><i <?php echo $style; ?> class="fa fa-<?php echo $icon8; ?>"></i></a>
    <?php } ?>
    <?php if($icon9 !='') {?>
        <a href="<?php echo $icon9_link?>" style="font-size:<?php echo $icon_size; ?>"><i <?php echo $style; ?> class="fa fa-<?php echo $icon9; ?>"></i></a>
    <?php } ?>
    <?php if($icon10 !='') {?>
        <a href="<?php echo $icon10_link?>" style="font-size:<?php echo $icon_size; ?>"><i <?php echo $style; ?> class="fa fa-<?php echo $icon10; ?>"></i></a>
    <?php } ?>
    <?php if($icon11 !='') {?>
        <a href="<?php echo $icon11_link?>" style="font-size:<?php echo $icon_size; ?>"><i <?php echo $style; ?> class="fa fa-<?php echo $icon11; ?>"></i></a>
    <?php } ?>
    <?php if($icon12 !='') {?>
        <a href="<?php echo $icon12_link?>" style="font-size:<?php echo $icon_size; ?>"><i <?php echo $style; ?> class="fa fa-<?php echo $icon12; ?>"></i></a>
    <?php } ?>
    <?php if($icon13 !='') {?>
        <a href="<?php echo $icon13_link?>" style="font-size:<?php echo $icon_size; ?>"><i <?php echo $style; ?> class="fa fa-<?php echo $icon13; ?>"></i></a>
    <?php } ?>

</div>