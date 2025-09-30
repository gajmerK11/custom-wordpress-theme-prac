<?php
get_header();
?>


		<article class="content px-3 py-5 p-md-5">
	    <!-- Main content goes here and we are loading it dynamically through the use of while loop -->
		 <?php
		 	if (have_posts()) {
				while (have_posts()){
					// 'the_post()' function activates the current post from all the available posts
					the_post();
					
					get_template_part('template-parts/content', 'archive');
				
				}
			}
		
			
			
		 ?> 
	    </article>
	    
    </div>
	
<?php
get_footer();
?>
		
</body>
</html> 

 