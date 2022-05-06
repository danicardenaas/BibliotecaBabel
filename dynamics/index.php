<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <?php 
      $buscar = (isset($_POST["buscar"]) && $_POST["buscar"] != "")? $_POST['buscar'] : "no especifico";
      $zonah = (isset($_POST['zonah']) && $_POST["zonah"] != "")? $_POST['zonah'] : "no especifico";
      $mod = (isset($_POST['mod']) && $_POST["mod"] != "")? $_POST['mod'] : "no especifico";

      $long_texto=rand(300,500); 
      $long_identificador=rand(); 
      echo "Libro $long_identificador <br><br>"; 
      $cadena= "Vaquitassss Marinas lol"; 
      $insertar = rand(0, $long_texto);

      for($i=0; $i<$long_texto; $i++)
      {
        $long_palabra=rand(4,10);
        
        for($p=0; $p<$long_palabra; $p++)
        {
            $ascii=rand(97, 122); 
            $letra= chr($ascii); 
            echo "$letra"; 
        }
        echo " "; 
        if($i==$insertar){
          echo "<strong>$cadena </strong>";
        }
      }
      echo "La fecha de consulta de este libro  fue $date a las $hrs en $ubi"
    ?> 
  </body>
</html>