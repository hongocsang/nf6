<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php

        if(isset($_POST['delete']))
        {
            $ke = $_POST['delete'];
        }
        $vt = explode('_', $ke);

        require_once("connection.php");
        $sql_ke = "select `id_ke`, `bang`, `id_bang` from ke where `vt_ke` = ".$vt[0]." and `vt_cot` = ".$vt[2]." and `vt_hang` = ".$vt[1]."";    
        $result_id_ke = mysqli_query($conn, $sql_ke);
        $data_ke = mysqli_fetch_assoc($result_id_ke);
        $id_ke = $data_ke["id_ke"];
        $bang = $data_ke["bang"];
        $id_bang = $data_ke["id_bang"];



        $sql_delete_ke = "delete from ke where id_ke = ".$id_ke."";
        echo $sql_delete_ke . "<br>";
        $sql_delete_bang = "delete from ".$bang." where id = ".$id_bang."";
        echo $sql_delete_bang;
        if (mysqli_query($conn, $sql_delete_ke) && mysqli_query($conn, $sql_delete_bang))
        {
            echo "Xóa thành công";  
            echo "<script>alert('Xóa thành công'); window.location.href='index.php';</script>";
        }else
        {   
            echo "Lỗi : " . $sql . "<br>" . mysqli_error($conn);
        }

    ?>
</body>
</html>