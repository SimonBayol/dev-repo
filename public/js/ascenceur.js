/* ascensur récupère une class="ascenseur" et fait l'ascenseur pour monter et descendre la ul suivante au click  merci Arthur*/ 
jQuery().ready(function(){
	
        if($(".ascenseur").parent("li").class === "active"){
            $(".ascenseur").next("ul").hide();
        }
	$(".ascenseur").click(function(){
		if($(this).next("ul").is(":hidden")){
                    $(".ascenseur").next("ul:visible").slideUp();
                    $(this).next("ul").slideDown();
		}else{
                    $(this).next("ul").slideUp();
                }
		});
	});