<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>title</title>
    <link rel="stylesheet" href="style.css">
    <script src="jquery-1.11.3.min"></script>
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
  
  #connect{
      margin-left: 100px;
  }
  
  </style>
    
	<div id="spa-window">
	   	<div id="spa-title">
	   	    Compagnies: Consulter
	   	    <input type="button" class="btn btn-primary" id="connect" value="Se Connecter"/>
	   	    <input type="button" class="btn btn-warning"  value="S'inscrire"/>
		</div>
		<div id="spa-column">
		<ul>
		    <li><b> Acceuil </b> </li>
		    <li><b>Compagnie</b>
		        <ul>
		            <li>Consulter</li>
		            <li>Ajouter</li>
		            <li> Ajouter un bateau</li>
		        </ul>
		    </li>
		    <li><b>Client</b>
		        <ul>
		            <li>Consulter</li>
		            <li>Ajouter</li>
		        </ul>
		    </li>
		    <li> <b>Mon compte</b>
		        <ul>
		            <li>Statistiques</li>
		        </ul>
		    </li>
		    <li> <b>A propos</b> </li>
		</ul>
		</div>
		<div id="spa-board">
            		    
            <div class="spa-res spa-res-main" id="res-company-list">
                <table class="table">
                    <thead>
                      <tr>
                        <th>Compagnie</th>
                        <th>Num Bateau</th>
                        <th class="spa-controls">Username</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark I</td>
                        <td>@mk</td>
                        <td><input type="button" class="btn btn-warning" value="Modifier" /> <input type="button" class="btn btn-danger" value="Supprimer" /></td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob II</td>
                        <td>@jcb</td>
                        <td><input type="button" class="btn btn-warning" value="Modifier" /> <input type="button" class="btn btn-danger" value="Supprimer" /></td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Larry III</td>
                        <td>@lar</td>
                        <td><input type="button" class="btn btn-warning" value="Modifier" /> <input type="button" class="btn btn-danger" value="Supprimer" /></td>
                      </tr>
                    </tbody>
                  </table>
            </div>
            
            <div class="spa-res" id="res-company">
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="pwd">Password:</label>
                  <input type="password" class="form-control" id="pwd" placeholder="Enter password">
                </div>
                <div class="checkbox">
                  <label><input type="checkbox"> Remember me</label>
                </div>
            </div>
            
		    <input type="button" class="spa-control btn btn-primary" value="Enregitrer" />
		    
		</div>
	</div>
	
  </body>
</html>

