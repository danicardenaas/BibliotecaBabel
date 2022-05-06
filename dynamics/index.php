<html>
  <head>
    <title>Biblioteca de babel</title>
  </head>
  <body>
    <?php 
      //Inicialización de variables
      $booleano = true;
      $cont1 = 0;
      $cont2 = 0;
      $arr_frase = NULL;
      $arr_insertar = NULL;

      $textProfundo = "No se ha introducido una búsqueda, la torre de babel no puede dar respuestas a quien no hace preguntas"; //Se usará si no se introduce una búsqueda

      //Variables obtenidas del formulario (ternario para verificar valor)
      $modo = (isset($_POST["mod"]) && $_POST["mod"] != "") ? $_POST["mod"] : "No especifico";
      $frase = (isset($_POST["buscar"]) && $_POST["buscar"] != "") ? $_POST["buscar"] : "$textProfundo";
      $zonah = (isset($_POST["zonah"]) && $_POST["zonah"] != "") ? $_POST["zonah"] : "No especifico";

      if($frase == "$textProfundo"){
        $modo = "Normal";
      } else {
        $frase = trim($frase); //Elimina espacios en blanco del inicio/final de la frase si es que hay        
      }

      $arr_frase = explode(" ", $frase); //Arreglo con las palabras de la frase
      $num_palabras = count($arr_frase); //#palabras de la frase
      $longitud = 500 - $num_palabras; //Calcula el máx de palabras del texto

      //Variables para generar números aleatorios
      $long_texto = rand(300, $longitud); //número de palabras en el texto
      $long_identificador = rand(); //número aleatorio del título del libro
      if($modo != "Palabras"){
          $insertar = rand(0, $long_texto); //número aleatorio para la colocación de la $frase
      }

      //Asigna valor a la frase según el modo
      if($modo == "Orden"){
          sort($arr_frase); //Ordena el arreglo de la frase alfabéticamente
          $frase = implode(" ", $arr_frase); //Guarda el arreglo ordenado en la frase
      }
      if($modo == "Palabras"){
          //Obtener n números aleatorios diferentes (según el #palabras)
          for($i=0; $i<$num_palabras; $i++){
              do {
                  $booleano = true;
                  //Genera número aleatorio
                  $arr_insertar[$i] = rand (0, $long_texto);
                  //Comprueba que sean diferentes
                  if($i > 0){
                      for($j=0; $j<(count($arr_insertar)-1); $j++){
                          if($arr_insertar[$i] == $arr_insertar[$j]){
                              $booleano = false;
                              $j = count($arr_insertar);
                          }
                      }
                  }
              } while ($booleano == false);
          }
          //Ordena arreglo de números aleatorios de menor a mayor
          sort($arr_insertar);
      }

      //Despliegue de datos
      echo "Libro $long_identificador <br><br>";
      for($i=0; $i<$long_texto; $i++){
          $long_palabra = rand(4,10); //número aleatorio para la longitud de la palabra
          
          for($p=0; $p<$long_palabra; $p++){
              $ascii = rand(97, 122); //número aleatorio para el carácter de la palabra
              $letra = chr($ascii); 
              echo "$letra"; 
          }
          echo " ";

          if($modo != "Palabras"){
              if($i == $insertar){
                  echo "<strong>$frase </strong>";
              }
          } else {
              if($i == $arr_insertar[$cont1])
              {
                  echo "<strong>$arr_frase[$cont2] </strong>";
                  if($cont1 < (count($arr_insertar) - 1)){
                      +$cont1++;
                  }
                  if($cont2 < (count($arr_frase) - 1)){
                      +$cont2++;
                  }
              }
          }
      }
      echo "La fecha de consulta de este libro  fue $date a las $hrs en $ubi"
    ?> 
  </body>
</html>