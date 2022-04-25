<?php

    require_once("connection.php");

    $vt_ke= 1;
    $ke= 1;
    $vt_cot = 1;
    $vt_hang = 1;
    $nam = "2019";
    $nguoi_sua="admin";
    $ghi_chu="ghiChu";
    $len_gc = 0;

    if(isset($_POST['edit_ke']))
    {
        $ke = $_POST['edit_ke'];
    }
    $vt = explode('_', $ke);

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
    if(isset($_POST['nguoiSua']))
    {
        $nguoi_sua = $_POST['nguoiSua'];
    }
    if(isset($_POST['ghiChu'])){
        $ghi_chu = $_POST['ghiChu'];
        $len_gc = strlen($ghi_chu);
    }

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = date('H:i:s d-m-Y', time());
    $ghi_chu = "---Ngày chỉnh sửa: " .$date. "---Người chỉnh sửa: " .$nguoi_sua. "---Nội dung: " .$ghi_chu."<br />";

    $sql_ke = "select `id_ke`, `bang`, `id_bang` from ke where `vt_ke` = ".$vt[0]." and `vt_cot` = ".$vt[2]." and `vt_hang` = ".$vt[1]."";    
    $result_id_ke = mysqli_query($conn, $sql_ke);
    $data_ke = mysqli_fetch_assoc($result_id_ke);
    $id_ke = $data_ke["id_ke"];
    $bang = $data_ke["bang"];
    $id_bang = $data_ke["id_bang"];
    
    $sql_kc = "select * from khongcap where id =".$id_bang."";
    $result_kc = mysqli_query($conn, $sql_kc);
    $data_kc = mysqli_fetch_assoc($result_kc);

    if($data_kc){
        if($data_kc["nam"] != $nam)
        {
            $sql = "update khongcap set nam=".$nam." where id=".$id_bang."";
            mysqli_query($conn, $sql);
        }
        
        if($len_gc > 0)
        {   
            $result_ghichu = $data_kc["ghi_chu"]. "<br />" .$ghi_chu;
            $sql = "update khongcap set ghi_chu='".$result_ghichu."' where id=".$id_bang."";
            mysqli_query($conn, $sql);
        }
    }else
    {
         echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    if($vt_ke != $vt[0] || $vt_cot != $vt[2] || $vt_hang != $vt[1])
    {
        $sql = "update ke set vt_ke=".$vt_ke.", vt_cot=".$vt_cot.", vt_hang= ".$vt_hang." where id_ke=".$id_ke."";
        echo $sql;
        if (mysqli_query($conn, $sql))
        {
            echo "Chỉnh sửa thành công";  
            echo "<script>alert('Chỉnh sửa kệ thành công'); window.location.href='index.php';</script>";
        }else
        {   
            echo "<script>alert('Vị trí trên kệ đã tồn tại! Mời bạn đổi sang các vị trí khác'); history.back();</script>";
        }
    }
    else {
        echo "<script>alert('Chỉnh sửa nội dung thành công'); window.location.href='index.php';</script>";
    }

    

    
    

    
?>