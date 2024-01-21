<?php
  try {
       
$dbh1 = oci_pconnect("hr", "root", "localhost/orcl");

  }
  catch (PDOException $e) {
    print $e->getMessage();
    echo'error';
  }

?>
<?php 

try {
    $db = 'oci:dbname=//localhost:1521/orcl';
    $dbh =new PDO($db, 'hr', 'root');
     $sql = 'SELECT * FROM Prof ORDER BY nom_prof ';         
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
				<li class="menu__element ">
					<a href="etd.php?res=1 " class="menu__link">Etudiant</a>
				</li>
				<li class="menu__element active">
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
     <a class=\"btn inf \" href=\"prof.php?res=1\">
         <h4 >LA LISTE DES PROFS</h4><br><br>
     </a></div>
         <div class=\"inf height\">
     <a class=\"btn inf \" href=\"prof.php?res=2\">
         <h4 >AJOUTER UN PROF</h4><br><br>
     </a></div>
              <div class=\"inf height\" >
     <a class=\"btn inf \" href=\"prof.php?res=3\">
         <h4 >MODIFIER UN PROF</h4><br><br>
     </a></div>
                   <div class=\"inf height\">
     <a class=\"btn inf \" href=\"prof.php?res=4\">
         <h4 >SUPPRIMER UN PROF</h4><br><br>
     </a></div>    
     <div class=\"inf height\">
     <a class=\"btn inf \" href=\"prof.php?res=5\">
         <h4 >RECHERCHE D'UN PROF</h4><br><br>
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
    $nom=  $row[1];
    $prenom=  $row[2] ;
    echo " <a href=\"prof.php?res2=$id \" class=\"btn inf2\"  \">
    <h2>$nom $prenom</h2></a>";             
    }
     echo "</div> 
</div><br>"; 
        echo "
</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br<br><br><br><br></div>";

      }
            if($res==2){   
                  echo "<div > 
                    <h1 class=\"text-center \" style=\"color: white;\"><br><br>GESTION DES PROFS<br></h1>
                   <br>    <br> 
        <br>
  <div class=\"text-center\" >
      
     <div class=\"modal-dialog modal-lg\">
     <div class=\"modal-content\"><br>
     <div class=\"container \" >
     <div class=\" \" style=\"border: 2px solid #02202e;\">
     <div class=\"card-body\">
     <form action=\"req.php?res=0.5\" method=\"POST\" >
        <div class=\"text-center\"   >  
                <h2 class=\"text1\" id=\"ADMIN\" style=\"color:#02202e;\">Ajouter un prof</h2>
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
                    <h1 class=\"text-center \" style=\"color: white;\"><br><br>GESTION DES PROFS<br></h1>
                   <br>    <br>   <br>    <br>   <br>    <br> 
        <br>
  <div class=\"card-group text-center\" style=\"\">
    <div class=\"inf height\">
     <button class=\"btn inf  dropdown-toggle\" data-toggle=\"collapse\" href=\"#c\" role=\"button\" aria-expanded=\"false\"  aria-controls=\"collapseExample\" style=\"text-decoration: none;\">
         <h1 class=\"\">MODIFIER UN PROF</h1>
     </button></div>
 <div class=\"collapse inf2 height\" id=\"c\"> ";
              
    while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
    $id= $row[0];
    $nom=  $row[1];
    $prenom=  $row[2];
 echo " <a href=\"prof.php?res1=$id\" class=\"btn inf2\" style=\"text-decoration: none;\">
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
                    <h1 class=\"text-center \" style=\"color: white;\"><br><br>GESTION DES PROFS<br></h1>
                   <br>    
                   <h3 class=\"text-center \" style=\"color: white;\">Supprimer un prof<br></h3>
<br>  
        <br>
    <br>     <div class=\"card-group text-center\" style=\"\">
    <div class=\"inf height\">";
            while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
    $id= $row[0];
    $nom=  $row[1];
    $prenom=  $row[2] ;
 echo " <a href=\"req.php?res26=$id \" class=\"btn inf2\"  onclick=\"return confirm('are you sure?');\">
  <h2>$nom $prenom</h2></a>";              
    }
         


echo " 
</div><br>";



        echo "
</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br<br><br><br><br<br><br><br><br></div>";
            } 
     
         if($res==5){   
                  echo "<div > 
                    <h1 class=\"text-center \" style=\"color: white;\"><br><br>GESTION DES PROFS<br></h1>
                   <br>    <br> 
        <br>
  <div class=\"text-center\" >
      
     <div class=\"modal-dialog modal-lg\">
     <div class=\"modal-content\"><br>
     <div class=\"container \" >
     <div class=\" \" style=\"border: 2px solid #02202e;\">
     <div class=\"card-body\">
     <form action=\"prof.php?res=0.6\" method=\"POST\" >
        <div class=\"text-center\"   >  
                <h2 class=\"text1\" id=\"ADMIN\" style=\"color:#02202e;\">Recherche d'un prof</h2>

        <div class=\"form-group\">
        <input type=\"text\" class=\"form-control\" id=\"text \" placeholder=\"Nom\" name=\"nom\">
        </div>      
        <div class=\"form-group\">
        <input type=\"text\" class=\"form-control\" id=\"text \" placeholder=\" Prénom \" name=\"prenom\">
        </div>
        <div class=\"form-group\">
        <input type=\"text\" class=\"form-control\" id=\"text \" placeholder=\" Date de naissance  \" name=\"date\">
        </div>     
";
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
       if($res==0.6){
    $nom =$_POST['nom'];
    $prenom =$_POST['prenom'];
    $date =$_POST['date'];
    $nom=str_replace("'", "\'", $nom);
    $prenom=str_replace("'", "\'", $prenom);
    $date=str_replace("'", "\'", $date);
           // = "search_prof('".$nom."','".$prenom."','05-05-00');";
           $sql = "select search_prof('".$nom."','".$prenom."') from dual";
  $stm=oci_parse($dbh1,$sql);
    $re=oci_execute($stm);
            $stmt1 = $dbh->prepare($sql);
    $stmt1->execute();
             while ($row = $stmt1->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
    $id= $row[0];
               $sql1 = "select * from prof where code_prof=$id";
            $stmt2 = $dbh->prepare($sql1);
    $stmt2->execute();
             while ($row1 = $stmt2->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
    $nom=  $row1[1];
    $prenom=  $row1[2] ;
    $date=  $row1[3] ;
    $lieu=  $row1[4] ;
    $adress=  $row1[5] ;
    echo "<div > 
                    <h1 class=\"text-center \" style=\"color: white;\"><br><br>GESTION DES PROFS<br></h1>
                   <br>    <br> 
        <br>
                <h2 class=\"text1 text-center\" id=\"ADMIN\" style=\"color:white;\">Recherche d'un prof</h2><br>    <br> 
                <div class=\"text-center\" style=\"background-image: url('b.png'); background-repeat: no-repeat;\"> ";

 echo "<br><br><div class=\"card-group text-center\" ><div class=\"col-md-6\" ><h2>Le nom complet de l'étudiant :</h2></div>
          <div class=\"col-md-6\" ><h2>$nom $prenom</h2></div></div><br>";
 echo "<div class=\"card-group text-center\" ><div class=\"col-md-6\" ><h2>La date de naissance de l'étudiant :</h2></div>
          <div class=\"col-md-6\" ><h2>$date</h2></div></div><br>";
 echo "<div class=\"card-group text-center\" ><div class=\"col-md-6\" ><h2>Le lieu de naissance de l'étudiant :</h2></div>
          <div class=\"col-md-6\" ><h2>$lieu</h2></div></div><br>";
 echo "<div class=\"card-group text-center\" ><div class=\"col-md-6\" ><h2>L'adresse de l'étudiant :</h2></div>
          <div class=\"col-md-6\" ><h2>$adress</h2></div></div><br>";   
                 echo "</div><br><br><br><br><br><br><br>";
    }}
           
       // header("location:prof.php?res=1");
    }
          
          
          } 
      if(isset($_GET['res1'])){
    $res1=$_GET['res1'];

     $sql1 =  'SELECT  * FROM Prof WHERE code_prof='.$res1;
      $stmt1 = $dbh->prepare($sql1, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
    $stmt1->execute();
    while ($row = $stmt1->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
        $id= $row[0] ;
    $nom=  $row[1] ;
    $prenom=  $row[2] ;
       $date=  $row[3] ;
    $lieu=  $row[4] ;
    $adress=  $row[5] ;
                  echo "<div > 
                  <h1 class=\"text-center \" style=\"color: white;\"><br><br>GESTION DES FILIERES<br></h1>
        <br>
        <br><br><br><br><br><br><div class=\"card-group text-center\" >

     <div class=\"modal-dialog modal-lg\" style=\"width:50%\">
     <div class=\"modal-content\" ><br>
     <div class=\"container cadre\" >
     <div class=\"card center orga-cadre\" style=\"border: 2px solid #1a7271;\">
     <div class=\"card-body\">
     <form action=\"req.php?res25=$res1\" method=\"POST\" >
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
     $sql1 =  'SELECT  * FROM Prof WHERE code_prof='.$res2;
      $stmt1 = $dbh->prepare($sql1, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
    $stmt1->execute();
    while ($row = $stmt1->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
        $id= $row[0] ;
    $nom=  $row[1] ;
    $prenom=  $row[2] ;
       $date=  $row[3] ;
    $lieu=  $row[4] ;
    $adress=  $row[5] ;
 

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




