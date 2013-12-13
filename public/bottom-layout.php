<?php include VIEW.'middle-layout.php' ; ?>
<?php 
try{
    $class = new ReflectionClass('controller\\Recrutement');
    $instance = $class->newInstance();
    $method = $class->getMethod('alerteRecrutement');
    $method->invoke($instance);
}catch(Exception $ex){
    include VIEW.'error.php';
}
try{
    $class = new ReflectionClass('controller\\Concerts');
    $instance = $class->newInstance();
    $method = $class->getMethod('alerteNextConcert');
    $method->invoke($instance);
}catch(Exception $ex){
    include VIEW.'error.php';
}

?>
			</article>
		</section>
	</div>
</div>
    </div>
</div>
</body>