
<div id="carousel-name" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner " role="listbox">

        <?php 
        $i = 0;

        while(have_rows('carousel')) { the_row(); ?>
            <div class="carousel-item <?php if($i == 0) { $i++; echo 'active';}?>" style="background-image: url(<?php echo get_sub_field('background')['sizes']['large'];?>);">
                <div class="carousel-caption">
                    <h3><?php the_sub_field('heading');?></h3>
                    <?php the_sub_field('content');?>
                    <?php $cta = get_sub_field('cta');
                    if($cta) { ?>
                        <a class="btn btn-primary" href="<?php echo $cta['url']; ?>" target="<?php echo $cta['target']; ?>">
                            <?php echo $cta['title']; ?>                         
                        </a>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>

    </div>
    <?php if(sizeof(get_field('carousel'))>1) { ?> 
        <a class="carousel-control-prev" href="#carousel-name" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-name" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    <?php } ?>
</div>