<?php

    require_once("connection.php");

    $vt_ke= 1;
    $ke= 1;
    $vt_cot = 1;
    $vt_hang = 1;
    $nam = 2019;
    $thungso = "1";
    $yk_start = 10000;
    $yk_end = 99999;
    $nguoi_sua="admin";
    $ghi_chu="ghiChu";

    // $sqlID = "select max(id_ct) from chungthu";
    // $id_bang = mysqli_query($conn, $sqlID);

    // $id_bang = $conn->query("select max(id_ct) from chungthu");
    // $id_bang++;

    //ALTER TABLE chungthu AUTO_INCREMENT = 1

    if(isset($_POST['edit_ke']))
    {
        $ke = $_POST['edit_ke'];
        echo "ke ".$ke;
        
    }
    $vt = explode('_', $ke);


    if(isset($_POST['ke']))
    {
        $vt_ke = $_POST['ke'];
        echo "ke ".$vt_ke;
    }
    if(isset($_POST['cot']))
    {
        $vt_cot = $_POST['cot'];
        echo "cot ".$vt_cot;
    }
    if(isset($_POST['hang']))
    {
        $vt_hang = $_POST['hang'];
        echo "hang ".$vt_hang;
    }


    if($vt_ke != $vt[0] || $vt_cot != $vt[2] || $vt_hang != $vt[1])
    {
        
    }

    // $sql = "select * from ke where manv='".$manhanvien."'";
    // //update `ke` set `vt_ke`=[value-2],`vt_cot`=[value-3],`vt_hang`=[value-4]
    // // where 1
    // $sqlVT = "update ke set ";
    // if(mysqli_query($conn, $sqlVT))
    // {   
    //     if (mysqli_query($conn, $sql))
    //     {
    //         $id_bang = $conn->insert_id;

    //         // $sqlKe = "insert into ke(`vt_ke`, `vt_cot`, `vt_hang`, `bang`, `id_bang`) 
    //         // values(".$vt_ke.",".$vt_cot.",".$vt_hang.",'bs_tt',".$id_bang.")";

    //         $sqlKe = "update ke set `bang` ='chungthu',`id_bang` = ".$id_bang."
    //         WHERE `vt_ke` = ".$vt_ke." and `vt_cot` = ".$vt_cot." and `vt_hang` = ".$vt_hang."";

    //         if (mysqli_query($conn, $sqlKe))
    //         {
    //             echo "Thêm ct thành công";  
    //             echo "<script>alert('thêm thành công'); window.location.href='add_ct_eu.php';</script>";
    //         }else
    //         {   
    //             echo "Lỗi : " . $sql . "<br>" . mysqli_error($conn);
    //         }
    //     }else 
    //     {
    //         echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
    //     }

    // }else 
    // {
    //     echo "<script>alert('Vị trí trên kệ đã tồn tại! Mời bạn đổi sang vị trí khác'); history.back();</script>";
    // }

?>