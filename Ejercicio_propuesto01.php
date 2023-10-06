<!DOCTYPE html>
<html>
<head>
    <title>Calcular Sueldo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffcccb; /* Cambia el color de fondo */
            color: #333; /* Cambia el color del texto */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        input[type="text"] {
            width: calc(100% - 22px); /* 22px son los márgenes y el borde */
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            display: inline-block;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #ff4040; /* Cambia el color del botón */
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s; /* Agrega una transición suave al cambio de color */
        }
        input[type="submit"]:hover {
            background-color: #ff8080; /* Cambia el color del botón al pasar el mouse sobre él */
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post" action="">
            Ingresar Sueldo Básico: <br> <input type="text" name="sueldoBasico"> <br>
            Ingresar Porcentaje de Comisión:<br> <input type="text" name="porcentajeComision"><br>
            Ingresar Importe Vendido del Mes:<br> <input type="text" name="importeVendido"><br>
            Ingresar Cantidad de Hijos en Edad Escolar:<br> <input type="text" name="numHijos"><br>
            <input type="submit" name="Calcular" value="Calcular">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sueldoBasico = $_POST['sueldoBasico'];
            $porcentajeComision = $_POST['porcentajeComision'];
            $importeVendido = $_POST['importeVendido'];
            $numHijos = $_POST['numHijos'];

            $bonificacionPorHijo = 50 * $numHijos;
            $comision = $porcentajeComision * $importeVendido;
            $sueldoBruto = $sueldoBasico + $comision + $bonificacionPorHijo;
            $descuento = 0.11 * $sueldoBruto;
            $sueldoNeto = $sueldoBruto - $descuento;

            echo "<br>Resultado:<br>";
            echo "Comisión: " . $comision . "<br>";
            echo "Bonificación: " . $bonificacionPorHijo . "<br>";
            echo "Sueldo Bruto: " . $sueldoBruto . "<br>";
            echo "Descuento: " . $descuento . "<br>";
            echo "Sueldo Neto: " . $sueldoNeto . "<br>";
        }
        ?>
    </div>
</body>
</html>
