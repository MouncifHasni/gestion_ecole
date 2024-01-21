<?php 

try {
    $db = 'oci:dbname=//localhost:1521/orcl';
    $dbh =new PDO($db, 'hr', 'root');
     $sql = 'SELECT * FROM Etudiant ORDER BY nom_etd ';         
    $stmt = $dbh->prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
    $stmt->execute();
}
catch(PDOException $e){
    header('Location: index.php');
}
?>
<html>
    <head>
    <title>COURS</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width , initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="biblio/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="biblio/all.min.css">
    <link href="biblio/bootstrap.min.css" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="biblio/all.min.css">
    <link href="biblio/cours.css" rel="stylesheet">
    <link href="biblio/nav.css" rel="stylesheet">
    <link href="biblio/style.css" rel="stylesheet">
    <link href="biblio/bootstrap.min.css" rel="stylesheet">
	  <style> 
    
       .inf{
    width: 90%;
     background-color:  #02202e;
    color:white 
}
    .inf:hover{
           background-color:  #02202e;
         text-decoration: underline;

color:white }

  .inf2{
    width: 100%;
    color: #02202e;
    background-color: white;
}
  .inf2:hover{
    width: 100%;
    color: white;
    background-color: #02202e;
}
  .inf3{
    width: 100%;
    color: #02202e;
    background-color: white;
}
          .height{
            margin: 0% 10%;
            
        }  
        .marg{
            margin: 0% 10%;
        }
        </style>
    </head>
    <body > 
        
	<header class="card" >
        <br>

		<div class="menu ">
    <div style="margin-left:0.5%;">
<span style="font-size:30px;color:#02202e;font-weight: bold;font-style : italic;float : left;align-text:center">Gestion de scolarité</span>
</div>
<div style="margin-right:0.5%;">
</div>
      <ul class="menu__container  ">
        <li class="menu__element  ">      
					<a href="test_admin.php" class="menu__link">Accueil</a>
				</li> 
        <li class="menu__element ">      
					<a href="accueil.php?res=1" class="menu__link">Filière</a>
				</li>
				<li class="menu__element active">
					<a href="etd.php?res=1" class="menu__link">Etudiant</a>
				</li>
				<li class="menu__element">
					<a href="prof.php?res=1" class="menu__link">Professeur</a>
				</li>	
  			</ul>
                      
		</div>
       
  
	</header> 
   
        
        <div>
      <div class="card-group">
         <div class="col-md-3" style="background-color: #02202e">
          <?php    

echo " <br><br> <br> <br> <br><br><br><br>  <div class=\"card-group text-center\" style=\"\">
    <div class=\"inf height\">
     <a class=\"btn inf \" href=\"etd.php?res=1\">
         <h4 >LA LISTE DES ETUDIANTS</h4><br><br>
     </a></div>
         <div class=\"inf height\">
     <a class=\"btn inf \" href=\"etd.php?res=2\">
         <h4 >AJOUTER UN ETUDIANT</h4><br><br>
     </a></div>
              <div class=\"inf height\" >
     <a class=\"btn inf \" href=\"etd.php?res=3\">
         <h4 >MODIFIER UN ETUDIANT</h4><br><br>
     </a></div>
                   <div class=\"inf height\">
     <a class=\"btn inf \" href=\"etd.php?res=4\">
         <h4 >SUPPRIMER UN ETUDIANT</h4><br><br>
     </a></div>
   
</div><br>";
             




        ?>      </div>
              <div class="col-md-9" style="background-image: url('back.png'); background-repeat: no-repeat;">
    <div>
                  
<?php 
          if(isset($_GET['res'])){
    $res=$_GET['res'];
      if($res==1){
echo "<div > 
<h1 class=\"text-center \" style=\"color: white;\"><br><br>GESTION DES ETUDIANTS<br></h1>
<br>    
<h3 class=\"text-center \" style=\"color: white;\">La liste des étudiants<br></h3>
<br>  
        <br>
    <br>     <div class=\"card-group text-center\" style=\"\">
    <div class=\"inf height\">";
           
    while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
    $id= $row[0];
    $nom=  $row[2];
    $prenom=  $row[3] ;
    echo " <a href=\"etd.php?res2=$id \" class=\"btn inf2\"  \">
    <h2>$nom $prenom</h2></a>";             
    }
     echo "</div> 
</div><br>"; 
        echo "
</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br<br><br><br><br></div>";

      }
            if($res==2){   
                  echo "<div > 
                    <h1 class=\"text-center \" style=\"color: white;\"><br><br>GESTION DES ETUDIANTS<br></h1>
                   <br>    <br> 
        <br>
  <div class=\"text-center\" >
      
     <div class=\"modal-dialog modal-lg\">
     <div class=\"modal-content\"><br>
     <div class=\"container \" >
     <div class=\" \" style=\"border: 2px solid #02202e;\">
     <div class=\"card-body\">
     <form action=\"req.php?res=0.4\" method=\"POST\" >
        <div class=\"text-center\"   >  
                <h2 class=\"text1\" id=\"ADMIN\" style=\"color:#02202e;\">Ajouter un étudiant</h2>
        <div class=\"form-group\">
        <input type=\"text\" class=\"form-control\" id=\"text \" placeholder=\"Id\" name=\"id\">
        </div>   
        <div class=\"form-group\">
        <input type=\"text\" class=\"form-control\" id=\"text \" placeholder=\"Nom\" name=\"nom\">
        </div>      
        <div class=\"form-group\">
        <input type=\"text\" class=\"form-control\" id=\"text \" placeholder=\" Prénom \" name=\"prenom\">
        </div>
        <div class=\"form-group\">
        <input type=\"text\" class=\"form-control\" id=\"text \" placeholder=\" Date de naissance  \" name=\"date\">
        </div> 
        <div class=\"form-group\">
        <input type=\"text\" class=\"form-control\" id=\"text \" placeholder=\" Lieu de naissance  \" name=\"lieu\">
        </div> 
        <div class=\"form-group\">
        <input type=\"text\" class=\"form-control\" id=\"text \" placeholder=\" L'adresse  \" name=\"adress\">
        </div>       
";
echo "        <div class=\"form-group\">
    <label for=\"exampleFormControlSelect1\">Filière</label>
    <select class=\"form-control\" id=\"exampleFormControlSelect1\" name=\"filiere\">";
                $sql1 = 'SELECT * FROM Filliere ORDER BY nom_f ';         
    $stmt1 = $dbh->prepare($sql1, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
    $stmt1->execute();
                    while ($row = $stmt1->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
        $id= $row[0] ;
    $title=  $row[1] ;
      echo " <option value=\"$id\">$title</option>";
           
    }
              
    
  echo "  </select>
          </div> ";
                
                echo "
<button type=\"submit\" class=\"btn inf\" name=\"sub\" style=\"margin-left: -0%;\">Ajouter</button>
                </div>
            </form>
    </div>
  </div><br>
</div>
  </div>
</div></div> 
<br>"; 
        echo "
</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br<br><br><br><br></div>";
            } 
        if($res==3){   
                  echo "<div > 
                    <h1 class=\"text-center \" style=\"color: white;\"><br><br>GESTION DES FILIERES<br></h1>
                   <br>    <br>   <br>    <br>   <br>    <br> 
        <br>
  <div class=\"card-group text-center\" style=\"\">
    <div class=\"inf height\">
     <button class=\"btn inf  dropdown-toggle\" data-toggle=\"collapse\" href=\"#c\" role=\"button\" aria-expanded=\"false\"  aria-controls=\"collapseExample\" style=\"text-decoration: none;\">
         <h1 class=\"\">MODIFIER UN ETUDIANT</h1>
     </button></div>
 <div class=\"collapse inf2 height\" id=\"c\"> ";
              
    while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
    $id= $row[0];
    $nom=  $row[2];
    $prenom=  $row[3] ;
 echo " <a href=\"etd.php?res1=$id\" class=\"btn inf2\" style=\"text-decoration: none;\">
  <h2>$nom $prenom</h2>
        </a>";                 
    }
            


echo "</div> 
</div><br>"; 
        echo "
</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br<br><br><br><br></div>";
            }      
              if($res==4){   
                  echo "<div > 
                    <h1 class=\"text-center \" style=\"color: white;\"><br><br>GESTION DES ETUDIANTS<br></h1>
                   <br>    
                   <h3 class=\"text-center \" style=\"color: white;\">Supprimer un etudiant<br></h3>
<br>  
        <br>
    <br>     <div class=\"card-group text-center\" style=\"\">
    <div class=\"inf height\">";
            while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
    $id= $row[0];
    $nom=  $row[2];
    $prenom=  $row[3] ;
 echo " <a href=\"req.php?res16=$id \" class=\"btn inf2\"  onclick=\"return confirm('are you sure?');\">
  <h2>$nom $prenom</h2></a>";              
    }
         


echo " 
</div><br>";



        echo "
</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br<br><br><br><br></div>";
            } 
     
          
          
          } 
      if(isset($_GET['res1'])){
    $res1=$_GET['res1'];

     $sql1 =  'SELECT  * FROM Etudiant WHERE code='.$res1;
      $stmt1 = $dbh->prepare($sql1, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
    $stmt1->execute();
    while ($row = $stmt1->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
        $id= $row[0] ;
    $nom=  $row[2] ;
    $prenom=  $row[3] ;
       $date=  $row[4] ;
    $lieu=  $row[5] ;
    $adress=  $row[6] ;
      

                  echo "<div > 
                  <h1 class=\"text-center \" style=\"color: white;\"><br><br>GESTION DES FILIERES<br></h1>
        <br>
        <br><br><br><br><br><br><div class=\"card-group text-center\" >

     <div class=\"modal-dialog modal-lg\" style=\"width:50%\">
     <div class=\"modal-content\" ><br>
     <div class=\"container cadre\" >
     <div class=\"card center orga-cadre\" style=\"border: 2px solid #1a7271;\">
     <div class=\"card-body\">
     <form action=\"req.php?res15=$res1\" method=\"POST\" >
     <div class=\"text-center\">";

      echo "<div class=\"form-group\">
        <input type=\"text\" class=\"form-control\" id=\"text \" placeholder=\"Titre \" value=\"$nom\" name=\"nom\">
        </div>";   
          echo "<div class=\"form-group\">
        <input type=\"text\" class=\"form-control\" id=\"text \" placeholder=\"Titre \" value=\"$prenom\" name=\"prenom\">
        </div>";
                echo "<div class=\"form-group\">
        <input type=\"text\" class=\"form-control\" id=\"text \" placeholder=\"Titre \" value=\"$date\" name=\"date\">
        </div>"; 
                 echo "<div class=\"form-group\">
        <input type=\"text\" class=\"form-control\" id=\"text \" placeholder=\"Titre \" value=\"$lieu\" name=\"lieu\">
        </div>";  
                 echo "<div class=\"form-group\">
        <input type=\"text\" class=\"form-control\" id=\"text \" placeholder=\"Titre \" value=\"$adress\" name=\"adress\">
        </div>";
echo "<button type=\"submit\" class=\"btn inf\" name=\"sub1\" style=\"margin-left: -0%;\">Modifier </button>
                </div>
            </form>
    </div>
  </div><br>
</div>
  </div>
</div></div> 
"; 
echo " 
</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br<br><br><br><br></div>";
      }
          
          
          }
 if(isset($_GET['res2'])){
    $res2=$_GET['res2'];
     echo "        <h1 class=\"text-center \" style=\"color: white;\"><br><br>GESTION DES ETUDIANTS<br></h1>
                   <br>    
                   <h3 class=\"text-center \" style=\"color: white;\">La liste des étudiants<br></h3>
<br>  
        <br>
    <br>   <div class=\"text-center\" style=\"background-image: url('b.png'); background-repeat: no-repeat;\"> ";
     $sql1 =  'SELECT  * FROM Etudiant WHERE code='.$res2;
      $stmt1 = $dbh->prepare($sql1, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
    $stmt1->execute();
    while ($row = $stmt1->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
        $id= $row[0] ;
    $nom=  $row[2] ;
    $prenom=  $row[3] ;
       $date=  $row[4] ;
    $lieu=  $row[5] ;
    $adress=  $row[6] ;
 

    echo "<br><div class=\"card-group text-center\" ><div class=\"col-md-6\" ><h2>Le nom complet de l'étudiant :</h2></div>
          <div class=\"col-md-6\" ><h2>$nom $prenom</h2></div></div><br>";
 echo "<div class=\"card-group text-center\" ><div class=\"col-md-6\" ><h2>La date de naissance de l'étudiant :</h2></div>
          <div class=\"col-md-6\" ><h2>$date</h2></div></div><br>";
 echo "<div class=\"card-group text-center\" ><div class=\"col-md-6\" ><h2>Le lieu de naissance de l'étudiant :</h2></div>
          <div class=\"col-md-6\" ><h2>$lieu</h2></div></div><br>";
 echo "<div class=\"card-group text-center\" ><div class=\"col-md-6\" ><h2>L'adresse de l'étudiant :</h2></div>
          <div class=\"col-md-6\" ><h2>$adress</h2></div></div><br>";
           
             
             }
          
          echo "</div><br><br><br><br><br><br><br><br><br>";
          }
        
        
        
        ?>
      </div></div>
     </div>
  <script src="biblio/jquery-3.4.1.min.js"></script>
<script src="biblio/bootstrap.bundle.min.js"></script>
    <script src="biblio/jqBootstrapValidation.js"></script>
    <script src ="biblio/swiper.min.css"></script>
  <script src="biblio/bootstrap.bundle.min.js"></script>
<script src="biblio/jqBootstrapValidation.js"></script>
    <script src ="biblio/swiper.min.css"></script>
  
        <script src="biblio/bootstrap.bundle.min.js"></script>
        <script src="biblio/jquery.min.js"></script>
        
              <script src="biblio/custom.js"></script>
      <script src="biblio/singlePageNav.js"></script>
        <script src ="biblio/typed.min.js"></script>
     <script src ="biblio/typed.min.js"></script>
    <script src="biblio/popper.min.js"></script>
<script src="biblio/coverflow-slideshow.js"></script>
 <script src ="biblio/jquery.min.js"></script>
    <script src ="biblio/swiper.min.css"></script>
  <!-- Plugin JavaScript -->
  <script src="biblio/jquery.easing.min.js"></script>
  <!-- Plugin JavaScript -->
  <script src="biblio/jquery.easing.min.js"></script>
        </div>
        
        
     
        
</body>
</html> 




