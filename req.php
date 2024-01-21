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
    $sql = 'SELECT * FROM Filliere ORDER BY nom_f ';         
    $stmt = $dbh->prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
    $stmt->execute();
}
catch(PDOException $e){
    header('Location: index.php');
}
?>
<?php 

if(isset($_GET['res'])){
    $res=$_GET['res'];
    if($res==0.1){
    $title =$_POST['title'];
    $title1 =$_POST['title1'];
    $id =$_POST['id'];
    $title=str_replace("'", "\'", $title);
    $q="INSERT INTO Filliere  VALUES ($id,'".$title."')";
     $stmt = $dbh->prepare($q);
    $stmt->execute();
    
    header("location:accueil.php?res=1");
    }
        if($res==0.4){
    $nom =$_POST['nom'];
    $id_f =$_POST['filiere'];
    $prenom =$_POST['prenom'];
    $date =$_POST['date'];
    $lieu =$_POST['lieu'];
    $adress =$_POST['adress'];
    $id =$_POST['id'];
    echo "$id $id_f $nom $prenom $date $lieu $adress";
    $nom=str_replace("'", "\'", $nom);
    $prenom=str_replace("'", "\'", $prenom);
    $date=str_replace("'", "\'", $date);
    $lieu=str_replace("'", "\'", $lieu);
    $adress=str_replace("'", "\'", $adress);
   $q="INSERT INTO Etudiant VALUES ($id, $id_f, '".$nom."', '".$prenom."', '".$date."', '".$lieu."', '".$adress."')";
 $stmt = $dbh->prepare($q);
    $stmt->execute();
        header("location:etd.php?res=1");
    }
        if($res==0.5){
    $nom =$_POST['nom'];
    $id_f =$_POST['filiere'];
    $prenom =$_POST['prenom'];
    $date =$_POST['date'];
    $lieu =$_POST['lieu'];
    $adress =$_POST['adress'];
    $id =$_POST['id'];
    $nom=str_replace("'", "\'", $nom);
    $prenom=str_replace("'", "\'", $prenom);
    $date=str_replace("'", "\'", $date);
    $lieu=str_replace("'", "\'", $lieu);
    $adress=str_replace("'", "\'", $adress);
      $sql = "BEGIN add_prof($id,'".$nom."','".$prenom."','".$date."','".$lieu."','".$adress."'); END;";
  $stm=oci_parse($dbh1,$sql);
    $re=oci_execute($stm); 
        header("location:prof.php?res=1");
    }
     
if($res==0.2){
    if(isset($_GET['res3'])){
    $res3=$_GET['res3'];
    $id =$_POST['id'];
    $title =$_POST['title'];
    $title=str_replace("'", "\'", $title);
    $q="INSERT INTO Module  VALUES ($id, $res3 ,'".$title."')";
    $stmt = $dbh->prepare($q);
    $stmt->execute();
  header("location:accueil1.php?res=1&res2=$res3");
    }
    
}

if($res==0.3){
        if(isset($_GET['res8'])){
      $res8=$_GET['res8'];
                $id =$_POST['id'];
      $title=$_POST['title'];
    $title=str_replace("'", "\'", $title);
    $q="INSERT INTO Element_M VALUES ($id, $res8 ,1,'".$title."')";
    $stmt = $dbh->prepare($q);
    $stmt->execute();
  header("location:accueil2.php?res=1&res2=$res8");
    }}
 

  
    }
if(isset($_GET['res1'])){
      $res1=$_GET['res1'];
    if(isset($_POST['sub1'])){
    $sql1 = 'SELECT * FROM Filliere WHERE code_f='.$res1.'ORDER BY nom_f';         
    $stmt1 = $dbh->prepare($sql1, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
    $stmt1->execute();
    while ($row = $stmt1->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
      $id = $row[0];
      $title = $row[1];
      $semestre = $row[2];
        $title  = $_POST['title2'];
            $title=str_replace("'", "\'", $title);
        $q="UPDATE Filliere SET nom_f= '".$title."'  WHERE code_f= $res1";

     $stmt = $dbh->prepare($q);
    $stmt->execute();
    }
    header("location:accueil.php?res=1");
}}

if(isset($_GET['res15'])){
      $res15=$_GET['res15'];
    if(isset($_POST['sub1'])){
      $nom =$_POST['nom'];
    $prenom =$_POST['prenom'];
    $date =$_POST['date'];
    $lieu =$_POST['lieu'];
    $adress =$_POST['adress'];
    $nom=str_replace("'", "\'", $nom);
    $prenom=str_replace("'", "\'", $prenom);
    $date=str_replace("'", "\'", $date);
    $lieu=str_replace("'", "\'", $lieu);
    $adress=str_replace("'", "\'", $adress);
            $q="UPDATE Etudiant SET nom_etd= '".$nom."', prenom_etd= '".$prenom."', date_nais= '".$date."', lieu_nais= '".$lieu."', adress= '".$adress."' WHERE code= $res15";

 $stmt = $dbh->prepare($q);
            $stmt->execute();
    }
    header("location:etd.php?res=1");
}

if(isset($_GET['res25'])){
      $res25=$_GET['res25'];
    if(isset($_POST['sub1'])){
      $nom =$_POST['nom'];
    $prenom =$_POST['prenom'];
    $date =$_POST['date'];
    $lieu =$_POST['lieu'];
    $adress =$_POST['adress'];
    $nom=str_replace("'", "\'", $nom);
    $prenom=str_replace("'", "\'", $prenom);
    $date=str_replace("'", "\'", $date);
    $lieu=str_replace("'", "\'", $lieu);
    $adress=str_replace("'", "\'", $adress);
  $sql = "BEGIN modify_prof($res25,'".$nom."','".$prenom."','".$date."','".$lieu."','".$adress."'); END;";
  $stm=oci_parse($dbh1,$sql);
    $re=oci_execute($stm); 
    }
    header("location:prof.php?res=1");
}

if(isset($_GET['res4'])){
      $res4=$_GET['res4'];
if(isset($_GET['res5'])){
      $res5=$_GET['res5'];
          
        $title  = $_POST['title2'];
        $title=str_replace("'", "\'", $title);
        $q="UPDATE Module SET nom_M='".$title."' WHERE code_M=$res4";
            $stmt = $dbh->prepare($q);
            $stmt->execute();
    }
  header("location:accueil1.php?res=1&res2=$res5");
   

    
}

if(isset($_GET['res9'])){
      $res9=$_GET['res9'];
if(isset($_GET['res10'])){
      $res10=$_GET['res10'];
      $title= $_POST['title2'];
        $title=str_replace("'", "\'", $title);
        $q="UPDATE Element_M SET nom_E='".$title."' WHERE code_E=$res9";
            $stmt = $dbh->prepare($q);
            $stmt->execute();
    

    }
    header("location:accueil2.php?res=1&res2=$res10");
}

if(isset($_GET['res2'])){
      $res2=$_GET['res2'];
 $q=" DELETE FROM Filliere WHERE code_f = $res2";
  $stmt = $dbh->prepare($q);
    $stmt->execute();
    header("location:accueil.php?res=4");

}
if(isset($_GET['res16'])){
      $res16=$_GET['res16'];
 $q=" DELETE FROM Etudiant WHERE code = $res16";
  $stmt = $dbh->prepare($q);
            $stmt->execute();
    header("location:etd.php?res=4");

}
if(isset($_GET['res26'])){
      $res26=$_GET['res26'];
  $sql = "BEGIN delete_prof($res26); END;";
  $stm=oci_parse($dbh1,$sql);
    $re=oci_execute($stm); 
    header("location:prof.php?res=4");

}
if(isset($_GET['res6'])){
      $res6=$_GET['res6'];
    if(isset($_GET['res7'])){
      $res7=$_GET['res7'];
 $q=" DELETE FROM Module WHERE code_M =$res6";
        
     $stmt = $dbh->prepare($q);
    $stmt->execute();

   header("location:accueil1.php?res=4&res2=$res7");

}}
if(isset($_GET['res11'])){
      $res11=$_GET['res11'];
    if(isset($_GET['res12'])){
      $res12=$_GET['res12'];
 $q=" DELETE FROM Element_M WHERE code_E = $res11";
  $stmt = $dbh->prepare($q);
            $stmt->execute();
    header("location:accueil2.php?res=4&res2=$res12");

}}


?>