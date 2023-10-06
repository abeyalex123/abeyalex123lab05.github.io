<!DOCTYPE html>
<html>
<head>
    <title>Calcular Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #cfe2f3; /* Cambia el color de fondo */
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
            background-color: #4caf50; /* Cambia el color del botón */
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s; /* Agrega una transición suave al cambio de color */
        }
        input[type="submit"]:hover {
            background-color: #45a049; /* Cambia el color del botón al pasar el mouse sobre él */
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post" action="">
            Ingresar Precio Actual: <br> <input type="text" name="precioActual"><br>
            Ingresar Cantidad Comprada:<br> <input type="text" name="cantidadComprada"><br>
            <input type="submit" name="Calcular" value="Calcular">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $precioActual = $_POST['precioActual'];
            $cantidadComprada = $_POST['cantidadComprada'];

            function calcularCompra($precioActual, $cantidadComprada) {
                $descuento = 0.07 * ($precioActual * $cantidadComprada);
                $precioConDescuento = $precioActual - ($precioActual * 0.05);
                $importeCompra = $precioConDescuento * $cantidadComprada;
                $obsequioCaramelos = 2 * $cantidadComprada;
            
                return [
                    "nuevoPrecio" => $precioConDescuento,
                    "importeCompra" => $importeCompra,
                    "descuento" => $descuento,
                    "obsequioCaramelos" => $obsequioCaramelos
                ];
            }

            $resultadoCompra = calcularCompra($precioActual, $cantidadComprada);

            echo "<br>Resultados:<br>";
            echo "Nuevo Precio: " . $resultadoCompra['nuevoPrecio'] . "<br>";
            echo "Importe de la Compra: " . $resultadoCompra['importeCompra'] . "<br>";
            echo "Descuento: " . $resultadoCompra['descuento'] . "<br>";
            echo "Obsequio Caramelos: " . $resultadoCompra['obsequioCaramelos'] . "<br>";
        }
        ?>
    </div>
</body>
</html>
