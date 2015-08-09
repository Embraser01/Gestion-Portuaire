<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>title</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery.min.js"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  </head>
  <body>
  
  <style>
  body {
    background: url("images/background.jpg");
   
    background-size: cover;
    height:100%;
    width:100%;
    position:absolute;

    margin:0;
    padding:0;
    

    
    font-family: Trebuchet MS, Helvetica;
  }
  #spa-window {
    position:absolute;
    left:50%;
    top:50%;
    margin-left:-500px;
    margin-top:-300px;
    
    width:1000px;
    height:600px;
    
    color:#555;
  
    background-color: #ffffff;
    border-radius: 0;
    box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.1);
  }
  
  #spa-title {
      height:50px;
      border-bottom:1px solid #e9e9e9;
      line-height:50px;
      padding: 0 20px;
      font-weight: bold;
      font-size:18px;
      
      
  }
  
  
  #spa-column {
      width:300px;
      height:550px;
      border-right:1px solid #e9e9e9;
      padding: 10px 0 0 0;
  }
  
  #spa-column ul{
    margin: 8px 0 8px;
    padding: 0 0 0 20px;
  }
  
  #spa-column li{
    list-style:none;
  }
  
  #spa-board {
height: 510px;
    left: 300px;
    padding: 20px;
    position: absolute;
    top: 50px;
    width: 660px;
    overflow-y:auto;
  }
  
  .spa-control {
    position:absolute;
    bottom:20px;
    right:20px;
    color:white;
    border:0;
    padding: 6px 12px;
    
    font-size:20px;
  }
  
  .spa-res {
      display:none;
  }
  
  .spa-res-main {
      display:block;
      
  }
  
  .spa-controls {
      width:200px;
  }
  
  .error {
      border: 1px solid red;
      color: red;
  }
  </style>
    
	<div id="spa-window">
	   	<div id="spa-title">
	   	    Ajouter un navire
		</div>
		<div id="spa-column">
		
		<ul>
		    <li><b>Compagnie</b>
		        <ul>
		            <li>Consulter</li>
		            <li>Ajouter</li>
		        </ul>
		    
		    </li>
		    <li><b>Compagnie</b>
		        <ul>
		            <li>Consulter</li>
		            <li>Ajouter</li>
		        </ul>
		    
		    </li>
		    <li><b>Compagnie</b>
		        <ul>
		            <li>Consulter</li>
		            <li>Ajouter</li>
		        </ul>
		    
		    </li>

		</ul>
		
		</div>
		<div id="spa-board">
		    




<script>
function _loadSingleData(title) {

    $("#spa-title").text(title);

    $("#spa-control-save").show();
    
    
    
}

function _loadListData(title) {

$("#spa-title").text(title);

   $("#spa-control-save").hide();
   
    
}

function _pushData(req, res, ctx) {

    
}

function loadCompanySingleData() {

    
        obj = {req : "company", res : "select", ctx : ""};
    
    
         $.post( "spa.ajax.php", obj, function( data ) {
         
         //alert(data);
         
            $(".spa-res").fadeOut();
            $("#res-list-company").fadeIn();
     console.log(data);
            html = "";
            
            dat = JSON.parse(data);
     
            for(i in dat) {
           // alert(data[i]);
                html += "<td>"+data[i].nom+"</td><td>"+data[i].adresse+"</td><td>"+data[i].pays+"</td><td></td>";
            }
            
            $("#res-list-company tbody").html(html);
            
            
            
            });
    
    
     
     
    
}

function pushSingleCompany() {

    error = 0;
    
    nom = $.trim($("#r-company-data-nom").val());
    adresse = $.trim($("#r-company-data-adresse").val());
    pays = $.trim($("#r-company-data-pays").val());

    if(nom.length == 0){
         $("#r-company-data-nom").addClass("error");
         error++; alert(8);
    }
       
        
    if(adresse.length == 0) {
         $("#r-company-data-adresse").addClass("error");
         error++;
    }
       
        
    if(pays.length == 0) {
        $("#r-company-data-pays").addClass("error");
         error++;
    }
    
   
    
    if(error == 0){
    
        obj = {req : "company", res : "create", ctx : nom+"|"+adresse+"|"+pays};
    
    
         $.post( "spa.ajax.php", obj, function( data ) {
            $("#res-single-company").fadeOut();
            
            
            $("#res-list-company").fadeIn();
            
            
            
            });
    }

        
    
}




</script>


<div class="spa-res spa-res" id="res-single-company">
  <div class="form-group">
      <label for="nom">Nom:</label>
      <input type="text" class="form-control" id="r-company-data-nom" placeholder="Entrer un nom">
    </div>
    <div class="form-group">
      <label for="pwd">Adresse:</label>
      <input type="text" class="form-control" id="r-company-data-adresse" placeholder="Entrer une adresse">
    </div>
     <div class="form-group">
      <label for="pwd">Pays:</label>
      <input type="text" class="form-control" id="r-company-data-pays" placeholder="Entrer un  pays">
    </div>
   
   
</div>


<div class="spa-res spa-res-main" id="res-list-company">
<table class="table">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Pays</th>
            <th class="spa-controls"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td></td>
            <td><input type="button" class="btn btn-warning" value="Modifier" /> <input type="button" class="btn btn-danger" value="Supprimer" /></td>
          </tr>
        </tbody>
      </table>
   
</div>


	
		   	    <input onclick="pushSingleCompany();" id="spa-control-save" type="button" class="spa-control btn btn-primary" value="Enregitrer" />
	    
		</div>
	</div>
	
	<script>
loadCompanySingleData();
	</script>
	
  </body>
</html>

