<section class="objet">
<a href='/Concerts/consultation/<?php echo $nextConcert->getId();?>' class="post-it">
    <article>
	<h4 >Concert</h4>
	<p><small>
                <b>"<?php echo $nextConcert->getNom();?>"</b><br>
		<?php echo $nextConcert->getDate()->format('d/m/Y').'<br>'.$nextConcert->getDate()->format('H \h i');?><br/>
                
                <?php echo substr($nextConcert->getAdresse(), 0,25)."...";?>
		
            </small>
	</p>
    </article></a>
</section>