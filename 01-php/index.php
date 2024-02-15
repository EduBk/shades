<?php

    #Ejercicio 1 - Hola mundo
    echo "<h1>Hola Mundo!</h1><br>";

    #Ejercicio 2 - Funcion Sumar
    function sumar($num_1, $num_2){
        $suma = $num_1 + $num_2;
        return $suma;
    }

    $operacion = sumar(3, 5);

    echo "<h3>Resultado: " . $operacion . "</h3>";

    #Ejercicio 3 - Conexion BD y consulta.
    #creamos la conexion a la bd (este caso XAMPP).
    $con = new mysqli("localhost", "root", "", "shades");

    // Verifica conexion
    if ($con->connect_error) {
        die("Error de conexion: " . $con->connect_error);
    }else{
        echo "Conectado... <br>";

        // querys para agregar elementos a la tabla usuarios
        // $query_1 = "INSERT INTO `usuarios` (`id`, `nombre`, `edad`, `correo`) VALUES (NULL, 'Jose', '21', 'jose@ejemplo.com')";
        // $query_2 = "INSERT INTO `usuarios` (`id`, `nombre`, `edad`, `correo`) VALUES (NULL, 'Karla', '17', 'karla_ll@ejemplo.com')";
        // $query_3 = "INSERT INTO `usuarios` (`id`, `nombre`, `edad`, `correo`) VALUES (NULL, 'Jonathan', '18', 'jonathan.mbks@ejemplo.com')";
        // $query_4 = "INSERT INTO `usuarios` (`id`, `nombre`, `edad`, `correo`) VALUES (NULL, 'Rogelio', '12', 'rogelio.mbks@ejemplo.com')";

        // $res_1 = $conn->query($query_1);
        // $res_2 = $conn->query($query_2);
        // $res_3 = $conn->query($query_3);
        // $res_4 = $conn->query($query_4);

        // if ($result1 == false || $result2 == false || $result3 == false || $result4 == false) {
        //     die("Error en una o más consultas: " . $con->error);
        // }

        // query para seleccionar registros donde edad sea mayor o igual a 18
        $query_edad = "SELECT * FROM usuarios WHERE edad >= 18";

        $res = $con->query($query_edad);
        if($res == false){
            die("Error al consultar datos" . $con->error);
        }

        while ($row = $res->fetch_assoc()) {
            echo "<span>" . $row["nombre"] . " - " . $row["edad"] . "</span><br>";
        }

    }

    #Ejercicio 4 - Recorrer Array
    $arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];

    echo "<br>";
    foreach ($arr as $numero) {
        if($numero % 2 == 0){
            echo $numero . " - ";
        }
    }
    echo "<br><br>";

    #Ejercicio 5 - Variables Globales / Locales
    /* 
    - Una variable local se declara en una funcion y solo tiene vida dentro de esta misma a diferencia de una global
    - ya que esta se declara fuera y se puede acceder en cualquier momento 
    */

    #Ejercicio 6 - Leer Archivo Texto.
    $ruta = "datos.txt";

    if(file_exists($ruta)){
        $datos = file_get_contents($ruta);

        echo $datos;
        echo "<br><br>";
    }

    #Ejercicio 7 - Consulta SQL para actualizar
    #creamos la conexion a la bd
    $con = new mysqli("localhost", "root", "", "shades");

    // Verifica conexion
    if ($con->connect_error) {
        die("Error de conexion: " . $con->connect_error);
    }else{

        // query para actualizar el nombre del producto donde el id sea = 5
        $query_update = "UPDATE `productos` SET `nombre` = 'Nuevo Producto' WHERE `productos`.`id` = 5";

        $res = $con->query($query_update);
        if($res == false){
            die("Error al consultar datos" . $con->error);
        }else{
            $query_consulta = "SELECT * FROM productos WHERE id = 5";

            $res_con = $con->query($query_consulta);
            if($res_con->num_rows > 0){
                while ($row = $res_con->fetch_assoc()) {
                    echo "<span>" . $row["clave"] . " - " . $row["nombre"] . " - " . $row["precio"] . "</span><br>";
                }
            }
        }

        echo "<br><br>";

    }

    #Ejercicio 8 - Clases
    class Coche {
        public $marca;
        public $modelo;
    
        public function __construct($marca, $modelo) {
            $this->marca = $marca;
            $this->modelo = $modelo;
        }
    
        public function mostrarInformacion() {
            echo "Marca: " . $this->marca . "<br>";
            echo "Modelo: " . $this->modelo . "<br>";
        }
    }
    
        // Instancia
        $miCoche = new Coche("Toyota", "Camry");
    
        // metodo
        $miCoche->mostrarInformacion();
?>