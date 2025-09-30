<!-- This below code is for displaying date, tag and number of comments in the header -->
<div class="container">
				<header class="content-header">
					<div class="meta mb-3">
                        <!-- retrieves date from post metadata -->
                        <span class="date"><?php the_date(); ?></span>

                        <!-- retrieves tags from post metadata -->
                        <?php
                        the_tags(' <span class="tag"><i class="fa fa-tag"></i>', '</span><span class="tag"><i class="fa fa-tag"></i>', '</span>');
                        ?>

                        <!-- retrieves comment numbers from post metadata -->
                        <span class="comment"><a href="#comments"><i class='fa fa-comment'></i><?php comments_number(); ?></a></span>
                </div>
				</header>

                <!-- This the_content() function displays the post content -->
                <?php
                the_content();
                ?>

                <!-- This comments_template() function pulls the comments.php file and displays the output -->
                <?php
                comments_template();
                ?>


</div>