<?php
    session_start();
    require_once "../Database/Database.php";
    if($_SESSION['login'] == null){
    echo "<script>alert('Please login.')</script>";
    header("Refresh:0 , url = ../index.html");
    exit();

    }

    extract($_POST);

    //print_r($_POST);//exit;

    $sql_fetch_todos = "SELECT * FROM productos where id=".$_POST['idproducto'] ;
    $query = mysqli_query($conn, $sql_fetch_todos);
    $pro = mysqli_fetch_array($query);

    if($pro['cantidad_disponible']>=$cantidad){

        if($cantidad>0){
            $vr_total=($cantidad*$pro['precio']);
        }

    }else{
        echo "<script>alert('El producto excede la cantidad ingresada en el inventario, por favor verifique')</script>";
            header("Refresh:0 , url = ../vender_producto.php");
            exit();
    }


 //echo " vr_total:$vr_total <br><br><br> ";
   // print_r($pro);exit;

    if($_POST['cc_cliente'] != null && $_POST['nombre_cliente'] != null && $_POST['cantidad']>0  ){
        $sql = "INSERT INTO facturas (cc_cliente,nombre_cliente,idproducto,cantidad,valor_total)
        
        
         VALUES ('". trim($cc_cliente). "','".trim($nombre_cliente)."',". trim($idproducto) ." , ".trim($cantidad).", ".trim($vr_total) .")";
        if($conn->query($sql)){

            #actualizo las cantidades del producto

            $sql_upd=" UPDATE PRODUCTOS SET cantidad_disponible=cantidad_disponible-$cantidad where id=".$idproducto;

            if($conn->query($sql_upd)){

                echo "<script>alert('Factura Creada Correctamente')</script>";
                header("Refresh:0 , url = ../list.php");
                exit();
            }

           

        }
        else{
            echo "<script>alert('Add failed')</script>";
            header("Refresh:0 , url = ../list.php");
            exit();

        }
    }
    else{
        echo "<script>alert(Por favor ingrese toda la informacion.')</script>";
        header("Refresh:0 , url = ../list.php");
        exit();

    }
    mysqli_close($conn);
?>