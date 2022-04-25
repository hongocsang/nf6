<?php

    require_once("connection.php");

    $vt_ke= 1;
    $vt_cot = 1;
    $vt_hang = 1;
    $nam_bs = "2019";
    $nam_tt = "2019";
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
    if(isset($_POST['nam_bs']))
    {
        $nam_bs = $_POST['nam_bs'];
    }
    if(isset($_POST['nam_tt']))
    {
        $nam_tt = $_POST['nam_tt'];
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
    //$ghi_chu = "---Ngày lưu: " .$date. " ---Người lưu: " .$nguoi_luu. " ---Nội dung: " .$ghi_chu."<br />";
    $ghi_chu = "---Ngày lưu: " .$date. " ---Người lưu: " .$nguoi_luu. " ---Nội dung: " .$ghi_chu;

    $sql = "insert into bs_tt(`nam_bs`, `nam_tt`, `nguoi_luu`, `ghi_chu`)
    values('[".$nam_bs."]', '[".$nam_tt."]', '".$nguoi_luu."', '".$ghi_chu."')";

    $sqlVT = "insert into ke(`vt_ke`, `vt_cot`, `vt_hang`) value (".$vt_ke.",".$vt_cot.",".$vt_hang.")";
    if(mysqli_query($conn, $sqlVT))
    {   
        if (mysqli_query($conn, $sql))
        {
            $id_bang = $conn->insert_id;

            // $sqlKe = "insert into ke(`vt_ke`, `vt_cot`, `vt_hang`, `bang`, `id_bang`) 
            // values(".$vt_ke.",".$vt_cot.",".$vt_hang.",'bs_tt',".$id_bang.")";

            $sqlKe = "update ke set `bang` ='bs_tt',`id_bang` = ".$id_bang."
            WHERE `vt_ke` = ".$vt_ke." and `vt_cot` = ".$vt_cot." and `vt_hang` = ".$vt_hang."";

            if (mysqli_query($conn, $sqlKe))
            {
                echo "Thêm ct thành công";  
                echo "<script>alert('thêm thành công'); window.location.href='add_bs_tt.php';</script>";
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
    kiểm tra kệ trước khi lưu    
    if (mysqli_query($conn, $sql))
    {
        $id_bang = $conn->insert_id;
        $sqlKe = "insert into ke(`vt_ke`, `vt_cot`, `vt_hang`, `bang`, `id_bang`) 
            values(".$vt_ke.",".$vt_cot.",".$vt_hang.",'bs_tt',".$id_bang.")";
        //echo "Thêm ct thành công -". $id_bang. "<br>";
        // echo "<a href='index.php'>Tiếp tục thêm</a> <br/> <br/>"
        if (mysqli_query($conn, $sqlKe))
        {
            echo "Thêm ct thành công";  
            echo "<script>alert('thêm thành công'); window.location.href='add_bs_tt.php';</script>";
        }else
        {   
            echo "<script>alert('Vị trí trên kệ đã tồn tại! Mời bạn đổi sang vị trí khác'); history.back();</script>";
            //echo "Lỗi trùng: " . $sql . "<br>" . mysqli_error($conn);
        }
    }else 
    {
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
    }
    */

?>