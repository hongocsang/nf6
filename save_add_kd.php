<?php

    require_once("connection.php");

    $vt_ke= 1;
    $vt_cot = 1;
    $vt_hang = 1;
    $nam = "2019";
    $ktb = 1;
    $nguoi_luu="admin";
    $ghi_chu="ghiChu";

    if(isset($_POST['ke']))
    {
        $vt_ke = $_POST['ke'];
    }
    if(isset($_POST['cot']))
    {
        $vt_cot = $_POST['cot'];
    }
    if(isset($_POST['hang']))
    {
        $vt_hang = $_POST['hang'];
    }
    if(isset($_POST['nam']))
    {
        $nam = $_POST['nam'];
    }
    if(isset($_POST['ktb']))
    {
        $ktb = $_POST['ktb'];
    }
    if(isset($_POST['nguoiLuu']))
    {
        $nguoi_luu = $_POST['nguoiLuu'];
    }
    if(isset($_POST['ghiChu'])){
        $ghi_chu = $_POST['ghiChu'];
    }

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = date('H:i:s d-m-Y', time());
    $ghi_chu = "---Ngày lưu: " .$date. "---Người lưu: " .$nguoi_luu. "---Nội dung: " .$ghi_chu."<br />";

    $sql = "insert into khongdat(`nam`, `sl_ktb`, `nguoi_luu`, `ghi_chu`)
    values('[".$nam."]', ".$ktb.",'".$nguoi_luu."','".$ghi_chu."')";

    $sqlVT = "insert into ke(`vt_ke`, `vt_cot`, `vt_hang`) value (".$vt_ke.",".$vt_cot.",".$vt_hang.")";
    if(mysqli_query($conn, $sqlVT))
    {   
        if (mysqli_query($conn, $sql))
        {
            $id_bang = $conn->insert_id;

            $sqlKe = "update ke set `bang` ='khongdat',`id_bang` = ".$id_bang."
            WHERE `vt_ke` = ".$vt_ke." and `vt_cot` = ".$vt_cot." and `vt_hang` = ".$vt_hang."";

            if (mysqli_query($conn, $sqlKe))
            {
                echo "Thêm ct thành công";  
                echo "<script>alert('thêm thành công'); window.location.href='add_kd.php';</script>";
            }else
            {   

                echo "Lỗi : " . $sql . "<br>" . mysqli_error($conn);
            }
        }else 
        {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }

    }else 
    {
        echo "<script>alert('Vị trí trên kệ đã tồn tại! Mời bạn đổi sang vị trí khác'); history.back();</script>";
    }

    /*
    if (mysqli_query($conn, $sql))
    {
        $id_bang = $conn->insert_id;
        $sqlKe = "insert into ke(`vt_ke`, `vt_cot`, `vt_hang`, `bang`, `id_bang`) 
            values(".$vt_ke.",".$vt_cot.",".$vt_hang.",'khongdat',".$id_bang.")";
        //echo "Thêm ct thành công -". $id_bang. "<br>";
        echo "Thêm ct thành công";  
        echo "<script>alert('thêm thành công'); window.location.href='add_kd.php';</script>";
        // echo "<a href='index.php'>Tiếp tục thêm</a> <br/> <br/>"
        if (mysqli_query($conn, $sqlKe))
        {
            echo "Thêm kệ thành công -". $id_bang. "<br>";
        }else
        {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
    }else 
    {
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
    }
    */

?>