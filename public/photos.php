<?php include VIEW.'top-layout.php' ; ?>
<section class ="span12">
<?php
foreach ($photos as $photo):
?>
<a class="span3 minPhotos group1" href="/images/photos/<?php echo $photo->getUrl() ; ?>"><img src="/images/photos/mini_<?php echo $photo->getUrl() ; ?>" width="200" class='round' ></a>
<?php
endforeach;
?>
</section>
<?php include VIEW.'bottom-layout.php' ; ?>