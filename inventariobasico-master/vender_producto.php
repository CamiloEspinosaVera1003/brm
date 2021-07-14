<?php
session_start();
require_once "Database/Database.php";
if ($_SESSION['login'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=index.html");
}
$login = $_SESSION['login'];
$sql_fetch_todos = "SELECT f.id,f.cc_cliente,f.nombre_cliente,p.producto,p.precio,p.id as idproducto,f.cantidad,f.valor_total,f.fecha_registro FROM facturas f JOIN productos p on (p.id=f.idproducto) ORDER BY id ASC";

$query = mysqli_query($conn, $sql_fetch_todos);

?>
<!doctype html>
<html lang="en">

<head>
    <title>Vender Productos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="brm.png">
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #1bfdef;
        }
        .header {
            position: fixed;
            top: 0px;
            left: 0px;
            right: 0px;
            height: 50px;
            padding: 5px 13px 11px 0px;
            width: 100%;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            margin-top: 0px;
            bottom: 0;
            background-color: #298dba;
        }
        .header p {
            margin-left: 20px;
            text-align: left;
        }
        .button-logout {
            position: relative;
            margin-top: -50px;
            margin-right: 20px;
            float: right;
            text-decoration: none;
            border: transparent;
            border-radius: 15px;
            background-color: #e60000;
            padding: 10px 10px 10px 10px;
            color: white;
            transition: 0.5s;
        }
        .button-logout:hover {
            background-color: #D9ddd4;
            color: red;
        }
        .container {
            margin: 90px auto;
            margin-bottom: 50px;
            border-radius: 30px;
            text-align: center;
            background-color: white;
            width: 40%;
            padding-bottom: 10px;
        }

        table th,
        tr,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px 0px 10px 0px;
        }

        table {
            width: 100%;
        }

        th {
            color: white;
            background-color: #298dba;
        }

        tr {
            background-color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .timeregis {
            text-align: center;
        }

        .form-group {
            margin-left: 600px;
        }

        [type=text], [type=number] {
            font-family: "Mitr", sans-serif;
            border-radius: 15px;
            border: transparent;
            padding: 7px 200px 7px 5px;
        }

        .return {
            border-radius: 15px;
            background-color: #ffcc33;
            color: black;
            text-decoration: none;
            padding: 4px 40px 4px 40px;
            margin: 0px 0px 50px 100px;
            font-size: 20px;
            transition: 0.5s;

        }

        .delete .bdelete {
            border-radius: 15px;
            background-color: #e60000;
            text-decoration: none;
            color: white;
            padding: 4px 20px 4px 20px;
            transition: 0.5s;
        }

        .return:hover {
            background-color: #fdb515;
            color: white;
        }

        .modify {
            border-radius: 15px;
            border: transparent;
            color: white;
            padding: 4px 40px 4px 40px;
            margin: 0px 50px 50px 100px;
            font-size: 20px;
            border-collapse: collapse;
            background-color: #00A600;
            font-family: "Mitr", sans-serif;
            transition: 0.5s;

        }

        .modify:hover {
            color: black;
            background-color: #BBFFBB;
        }
    </style>
</head>

<body>
    <div class="header">
        <p>BRM</p>
        <a name="" id="" class="button-logout" href="logout.php" role="button">Cerrar Sesión</a>
    </div>
    <div class="container">
        <h1>Vender Productos</h1>
        <h2>Has accedido como <?php echo $str = strtoupper($login) ?></h2>
    </div>
    <div class="table-product">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Orden</th>
                <th scope="col">ID:Factura</th>
                <th scope="col">Nombre:Cliente</th>
                <th scope="col">CC:Cliente</th>
                <th scope="col">Producto</th>
                <th scope="col">Valor Producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Valor Total</th>
                <th scope="col">Fecha Registro</th>
                <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $idpro = 1;
                while ($row = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td scope="row"><?php echo $idpro ?></td>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['nombre_cliente'] ?></td>
                        <td><?php echo $row['cc_cliente'] ?></td>
                        <td><?php echo $row['producto'] ?></td>
                        <td>$ <?php echo $row['precio'] ?></td>
                        <td><?php echo $row['cantidad'] ?></td>
                        <td>$ <?php echo $row['valor_total'] ?></td>
                        <td class="timeregis"><?php echo $row['fecha_registro'] ?></td>
                        <td class="delete"><a name="id" id="" class="bdelete" href="main/delete_factura.php?id=<?php echo $row['id'] ?>&cantidad=<?php echo $row['cantidad'] ?>&idproducto=<?php echo $row['idproducto'] ?>" role="button">
                                Eliminar
                            </a></td>
                    </tr>
                <?php
                    $idpro++;
                } ?>
            </tbody>
        </table>
        <br>
        <div class="addproduct">
            <form method="POST" action="main/vender.php">
                <div class="form-group">

               <?php 
               
             
              // require_once "Database/Database.php";
               $sql_fetch_todos2 = "SELECT * FROM productos ORDER BY id ASC";
               //echo $conn;
               $query2 = mysqli_query($conn, $sql_fetch_todos2);
               ?>
               

                <label for="exampleInputEmail1">Producto</label>
                    <br>
                    <select name="idproducto" >
                      
                
                 
                <?php while ($row = mysqli_fetch_array($query2)) { ?>
                    <option value="<?php echo $row['id'] ?>" > <?php echo $row['producto'] ?> </option>
                <?php } ?>
                    </select>
                    
                   
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Cedula Cliente</label>
                    <br>
                    <input type="text" class="form-control" name="cc_cliente" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre Cliente</label>
                    <br>
                    <input type="text" class="form-control" name="nombre_cliente" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Cantidad</label>
                    <br>
                    <input type="number" class="form-control" name="cantidad" required> </div>
                    
                <br>
                <div class="form-button">
                    <button type="submit" class="modify" style="float:right">Vender Producto</button>
                    <a name="" id="" class="return" href="list.php" role="button" style="float:left">Volver</a>
                </div>
            </form>
        </div>
    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>

</html>