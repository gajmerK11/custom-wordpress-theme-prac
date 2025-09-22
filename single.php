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
					
					// 'the_content()' function grabs the content in the post and displays it
					the_content();
				
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

 