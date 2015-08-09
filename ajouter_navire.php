<!DOCTYPE html>
<?php

$title = "Ajouter navire";
include('includes/header.php');

?>
<style>


#panel {
    width:350px;
    height:100%;
    background: rgba(0, 9, 22, 0.8) none repeat scroll 0 0;
    margin-left:0;
    margin-right:0;
    
}

#panel .wrap {
    margin:20px;
    
}

#panel h2 {
    color: white;
    text-align: center;
}

#panel input {
    clear:both;
    display:block;
}
#panel a {
    text-decoration:none;
    color:white;
    display:inline-block;
    margin:10px 0;
    font-size:14px;
}


#panel input[type=text], input[type=password]  {
    background: transparent;
    color: white;
    border: 0;
    border-bottom: 1px solid white;
    width:100%;
    margin:20px 0;
    font-size:18px;
}

#panel input[type=submit] {
    color:white;
    background: #008eff;
    border:0;
    padding: 4px;
    width:100%;
    
    font-size:20px;
}
</style>

	<div id="ajouter_navire">
	
	    <div id="panel">
	        <div class="wrap">
	        	<form action="ajouter_navire.php" method="">
			        <h2>Ajouter un navire</h2>
				
					<input type="text" placeholder="Nom du navire" name="nom" />
				    <input type="text" placeholder="Capacité (nombre de conteneur max.)" name="capacite" />
				  
			  
				    <input type="submit" value="Ajouter" />
			    </form>
		        
	        </div>
	        
	    </div>
		
	</div>
	
<?php

include('includes/footer.php');

?>


