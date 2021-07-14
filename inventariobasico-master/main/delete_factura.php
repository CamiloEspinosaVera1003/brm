<?php
    session_start();
    require_once "../Database/Database.php";
    if ($_SESSION['login'] == null){
        echo "<script>alert('Favor ingresar con tus credenciales')</script>";
        header("Refresh:0 , url = ../index.html");
        exit();

    }
    extract($_REQUEST);
    $delete_num = $id;

    $sql_pro=" UPDATE productos set cantidad_disponible=cantidad_disponible+$cantidad where id=".$idproducto;

    

    $query_upd = mysqli_query($conn,$sql_pro);
    

    if($query_upd){


        $sql_delete =  "DELETE FROM facturas WHERE id = '$delete_num'";
        
        $query_delete = mysqli_query($conn,$sql_delete);

        
        //$row = mysqli_fetch_assoc($query_delete,MYSQLI_ASSOC);
        if($query_delete>0){
            echo "<script>alert('Factura eliminada exitosamente')</script>";        
            header("Refresh: 0 , url = ../list.php");
            exit();

        }
        else{
            echo "<script>alert('No se pudo eliminar la factura')</script>";
            header("Refresh: 0 , url = ../list.php");
            exit();

        }

    }


    
    mysqli_close($conn);
?>