<ul class="nav pull-right">
	<li class="dropdown">
		<a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon-lock"></i><strong class="caret"></strong></a>
                    <div class="dropdown-menu" id="login-form">
<?php if(!isset($_SESSION['auth_level']) || $_SESSION['auth_level']>2): ?>
		
                    <?php
                    if(isset($_SESSION['login_error']) && !empty($_SESSION['login_error'])):
                        foreach ($_SESSION['login_error'] as $msg) :
                    ?>
                    <span class='msg-error'><?php echo $msg; ?></span>&nbsp;
                    <?php
                        endforeach; 
                    endif;
                    ?>
			<form method="post" action="/Login" accept-charset="UTF-8">
				<input  type="text" placeholder="login" id="username" name="login" class="input-small">
				<input  type="password" placeholder="mot de passe" id="password" name="password"  class="input-small">
				<input class="btn  btn-inverse btn-block btn-small" type="submit" id="connexion" value="Connexion">
    			</form>
             
<?php else: ?>
            <a href="/BackOffice" class="btn btn-inverse">back office</a>
            <a href="/Login/deconnect" class="btn btn-inverse">déconnection</a>
<?php endif; ?>
               </div>
	</li>
    
</ul>