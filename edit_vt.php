<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chỉnh sửa</title>
    <link rel="stylesheet" href="dinhdang.css">

    <script>
        function ThemCTNEU()
        {
            location.href = 'add_ct_neu.php';
        }

        function ThemCTUS()
        {
            location.href = 'add_ct_us.php';
        }

        function ThemCTEU()
        {
            location.href = 'add_ct_eu.php';
        }
        function ThemKC()
        {
            location.href = 'add_kc.php';
        }
        function ThemKD()
        {
            location.href = 'add_kd.php';
        }
        function ThemCG()
        {
            location.href = 'add_cgh.php';
        }
        function ThemBSTT()
        {
            location.href = 'add_bs_tt.php';
        }
    </script>    

</head>
<body>
<?php 
    //Khai báo chung
    $vt_ke= 1;
    $vt_cot = 1;
    $vt_hang = 1;
    $nam = 2019;
    $thungso = 1;
    $yk_start = 10000;
    $yk_end = 99999;
    $nguoi_luu="admin";
    $ghi_chu="ghiChu";

    require_once("connection.php");
    if(isset($_POST['edit'])){
        //echo $_POST['edit']. "<br />";
        $dataP = $_POST['edit'];
        $vt = explode('_', $dataP);
        // echo " vị trí kệ: " .$vt[0]."<br />";
        // echo " vị trí hàng: " .$vt[1]."<br />";
        // echo " vị trí cột: " .$vt[2]."<br />";
        $sql = "select * from ke where `vt_ke` = ".$vt[0]." and `vt_hang` = ".$vt[1]." and `vt_cot`= ".$vt[2];
        //echo $sql."<br />";
        $result = mysqli_query($conn, $sql);
        //sử lý id các bảng trong sql lại id_.... thành id

        if ($result->num_rows < 1) 
            {   
                echo "<a href='index.php'>Trở về trang chủ</a> <br/> <br/>";
                echo "Vị trí Kệ: ".$vt[0]." --- Cột:  ".$vt[2]." --- Hàng:  ".$vt[1].". Còn trống, chưa có hồ sơ nào được lưu ở vị trí này.";
                echo "<br /><br />";
                echo "<form id ='".$dataP."' method='post'>";
                echo "<button id='btn_add_ct_neu' type='submit' name='add' formaction='add_ct_neu.php' form='".$dataP."' value='".$dataP."'>Thêm chứng thư ngoài EU</button>";
                echo "<br /><br />";
                echo "<button id='btn_add_ct_us' type='submit' name='add' formaction='add_ct_us.php' form='".$dataP."' value='".$dataP."'>Thêm chứng thư Mỹ</button>";
                echo "<br /><br />";
                echo "<button id='btn_add_ct_eu' type='submit' name='add' formaction='add_ct_eu.php' form='".$dataP."' value='".$dataP."'>Thêm chứng thư EU</button>";
                echo "<br /><br />";
                echo "<button id='add_kc' type='submit' name='add' formaction='add_kc.php' form='".$dataP."' value='".$dataP."'>Thêm lô hàng không cấp chứng thư</button>";
                echo "<br /><br />";
                echo "<button id='btn_add_kd' type='submit' name='add' formaction='add_kd.php' form='".$dataP."' value='".$dataP."'>Thêm lô hàng không đạt</button>";
                echo "<br /><br />";
                echo "<button id='btn_add_cgh' type='submit' name='add' formaction='add_cgh.php' form='".$dataP."' value='".$dataP."'>Thêm giấy chống giả hỏng</button>";
                echo "<br /><br />";
                echo "<button id='add_bs_tt' type='submit' name='add' formaction='add_bs_tt.php' form='".$dataP."' value='".$dataP."'>Thêm phiếu điều chỉnh bổ sung và tờ trình không cấp chứng thư</button>";
                echo "</form><br /><br />";
                 
            }
            else {
                echo "<a href='index.php'>Trở về trang chủ</a> <br/> <br/>";
                $data = mysqli_fetch_assoc($result);
                if($data["bang"] === 'chungthu'){
                    $sqlB = "select * from chungthu where `id` = ".$data["id_bang"];

                    $resultB = mysqli_query($conn, $sqlB);
                    $dataB= mysqli_fetch_assoc($resultB);

                    //echo $sqlB."<br />";
                    echo "<h1>Chỉnh sửa &ldquo;HS: CHỨNG THƯ ";
                    if($dataB["eu"] == 1){
                        echo "Ngoài EU:&rdquo;</h1><br />";
                        //echo "<form action='save_edit_ct_neu.php' method='post' enctype='multipart/form-data'>";
                        
                    }elseif($dataB["eu"] == 2){
                        echo "Mỹ:&rdquo;</h1><br />";
                        //echo "<form action='save_edit_ct_eu.php' method='post' enctype='multipart/form-data'>";
                    }else {
                        echo "EU:&rdquo;</h1><br />";
                    }
                    //echo "Kệ: <input type='number' name='ke' maxlength='4' value='".$vt[0]."'><br>";
                    echo "<form method='post' enctype='multipart/form-data'>";
                    if ($vt[0] == 2){
                        echo "Kệ:   2 <input type='radio' name='ke' value='2' checked>";
                        echo "      3 <input type='radio' name='ke' value='3'><br>";
                    }else
                    {
                        echo "Kệ:   2 <input type='radio' name='ke' value='2'>";
                        echo "      3 <input type='radio' name='ke' value='3' checked><br>";
                    }
                    echo "Cột: <input type='number' name='cot' maxlength='1' value='".$vt[2]."'><br>";
                    echo "Hàng: <input type='number' name='hang' maxlength='2' value='".$vt[1]."'><br>";
                    //echo"<input type='submit' name='edit_ke' value='Cập nhật kệ'>";
                    
                    $thung = trim($dataB["thung_so"], "[]");
                    echo "Năm: <input type='number' name='nam' maxlength='4' value='".$dataB["nam"]."'><br>";
                    echo "Thùng số: <input type='text' name='thung' value='".$thung."'><br>";
                    echo "YK bắt đầu: <input type='number' name='ykStart' value='".$dataB["yk_start"]."'><br>";
                    echo "YK kết thúc: <input type='number' name='ykEnd' value='".$dataB["yk_end"]."'><br>";
                    echo "Người chỉnh sửa: <input type='text' name='nguoiSua'><br>";
                    echo "Ghi chú: <input type='text' name='ghiChu'><br>";
                    echo"<button formaction='save_edit_ct.php' type='submit' name='edit_ke' value='".$dataP."'>Cập nhật HỒ SƠ</button>";
                    echo"<button formaction='delete.php' type='submit' name='delete' value='".$dataP."'>Xóa HỒ SƠ</button>";
                    //echo"<input type='submit' name='submit' value='Cập nhật'>";
                    echo"</form>";
                    echo "<br />Lịch sử:<br />" .$dataB["ghi_chu"];
                }elseif($data["bang"] === 'khongcap')
                {
                    $sqlB = "select * from khongcap where `id` = ".$data["id_bang"];

                    $resultB = mysqli_query($conn, $sqlB);
                    $dataB= mysqli_fetch_assoc($resultB);

                    //echo $sqlB."<br />";
                    echo "<h1>Chỉnh sửa &ldquo;HS: KHÔNG CẤP CHỨNG THƯ&rdquo;</h1><br />";
                    echo "<form action='save_edit_kc.php' method='post' enctype='multipart/form-data'>";
                    //echo "Kệ: <input type='number' name='ke' maxlength='4' value='".$vt[0]."'><br>";
                    if ($vt[0] == 2){
                        echo "Kệ:   2 <input type='radio' name='ke' value='2' checked>";
                        echo "      3 <input type='radio' name='ke' value='3'><br>";
                    }else
                    {
                        echo "Kệ:   2 <input type='radio' name='ke' value='2'>";
                        echo "      3 <input type='radio' name='ke' value='3' checked><br>";
                    }

                    $nam = trim($dataB["nam"], "[]");

                    echo "Cột: <input type='number' name='cot' maxlength='1' value='".$vt[2]."'><br>";
                    echo "Hàng: <input type='number' name='hang' maxlength='2' value='".$vt[1]."'><br>";
                    echo "Năm: <input type='text' name='nam' value='".$nam."'><br>";
                    echo "Người chỉnh sửa: <input type='text' name='nguoiSua'><br>";
                    echo "Ghi chú: <input type='text' name='ghiChu'><br>";
                    echo"<button formaction='save_edit_kc.php' type='submit' name='edit_ke' value='".$dataP."'>Cập nhật</button>";
                    echo"<button formaction='delete.php' type='submit' name='delete' value='".$dataP."'>Xóa HỒ SƠ</button>";
                    //echo"<input type='submit' name='submit' value='Cập nhật'>";
                    echo"</form>";
                    echo "<br />Lịch sử:<br />" .$dataB["ghi_chu"];
                }elseif($data["bang"] === 'khongdat')
                {
                    $sqlB = "select * from khongdat where `id` = ".$data["id_bang"];

                    $resultB = mysqli_query($conn, $sqlB);
                    $dataB= mysqli_fetch_assoc($resultB);

                    //echo $sqlB."<br />";
                    echo "<h1>Chỉnh sửa &ldquo;HS: LÔ HÀNG KHÔNG ĐẠT&rdquo;</h1><br />";
                    echo "<form method='post' enctype='multipart/form-data'>";
                    //echo "Kệ: <input type='number' name='ke' maxlength='4' value='".$vt[0]."'><br>";
                    if ($vt[0] == 2){
                        echo "Kệ:   2 <input type='radio' name='ke' value='2' checked>";
                        echo "      3 <input type='radio' name='ke' value='3'><br>";
                    }else
                    {
                        echo "Kệ:   2 <input type='radio' name='ke' value='2'>";
                        echo "      3 <input type='radio' name='ke' value='3' checked><br>";
                    }

                    $nam = trim($dataB["nam"], "[]");

                    echo "Cột: <input type='number' name='cot' maxlength='1' value='".$vt[2]."'><br>";
                    echo "Hàng: <input type='number' name='hang' maxlength='2' value='".$vt[1]."'><br>";
                    echo "Năm: <input type='text' name='nam' maxlength='4' value='".$nam."'><br>";
                    echo "Số lượng không thông báo: <input type='number' name='ktb' maxlength='4' value='".$dataB["sl_ktb"]."'><br>";
                    echo "Người chỉnh sửa: <input type='text' name='nguoiSua'><br>";
                    echo "Ghi chú: <input type='text' name='ghiChu'><br>";
                    echo"<button formaction='save_edit_kd.php' type='submit' name='edit_ke' value='".$dataP."'>Cập nhật</button>";
                    echo"<button formaction='delete.php' type='submit' name='delete' value='".$dataP."'>Xóa HỒ SƠ</button>";
                    //echo"<input type='submit' name='submit' value='Cập nhật'>";
                    echo"</form>";
                    echo "<br />Lịch sử:<br />" .$dataB["ghi_chu"];
                }elseif($data["bang"] === 'chonggiahong')
                {
                    $sqlB = "select * from chonggiahong where `id` = ".$data["id_bang"];

                    $resultB = mysqli_query($conn, $sqlB);
                    $dataB= mysqli_fetch_assoc($resultB);

                    //echo $sqlB."<br />";
                    echo "<h1>Chỉnh sửa &ldquo;HS: GIẤY CHỐNG GIẢ HỎNG&rdquo;</h1><br />";
                    //echo "<form action='save_edit_cgh.php' method='post' enctype='multipart/form-data'>";
                    echo "<form method='post' enctype='multipart/form-data'>";
                    //echo "Kệ: <input type='number' name='ke' maxlength='4' value='".$vt[0]."'><br>";
                    if ($vt[0] == 2){
                        echo "Kệ:   2 <input type='radio' name='ke' value='2' checked>";
                        echo "      3 <input type='radio' name='ke' value='3'><br>";
                    }else
                    {
                        echo "Kệ:   2 <input type='radio' name='ke' value='2'>";
                        echo "      3 <input type='radio' name='ke' value='3' checked><br>";
                    }

                    echo "Cột: <input type='number' name='cot' maxlength='1' value='".$vt[2]."'><br>";
                    echo "Hàng: <input type='number' name='hang' maxlength='2' value='".$vt[1]."'><br>";
                    echo "Năm: <input type='number' name='nam' maxlength='4' value='".$dataB["nam"]."'><br>";
                    echo "Thùng số: <input type='number' name='thung' value='".$dataB["thung_so"]."'><br>";
                    echo "Có quốc huy: <input type='number' name='cqh' value='".$dataB["cqh"]."'><br>";
                    echo "Không có quốc huy: <input type='number' name='kcqh' value='".$dataB["kcqh"]."'><br>";
                    echo "Người chỉnh sửa: <input type='text' name='nguoiSua'><br>";
                    echo "Ghi chú: <input type='text' name='ghiChu'><br>";
                    echo"<button formaction='save_edit_cgh.php' type='submit' name='edit_ke' value='".$dataP."'>Cập nhật</button>";
                    //echo"<input type='submit' name='submit' value='Cập nhật'>";
                    echo"<button formaction='delete.php' type='submit' name='delete' value='".$dataP."'>Xóa HỒ SƠ</button>";
                    echo"</form>";
                    echo "<br />Lịch sử:<br />" .$dataB["ghi_chu"];
                }else{
                    $sqlB = "select * from bs_tt where id = ".$data["id_bang"];

                    $resultB = mysqli_query($conn, $sqlB);
                    $dataB= mysqli_fetch_assoc($resultB);

                    //echo $sqlB."<br />";
                    echo "<h1>CHỈNH SỬA &ldquo;HS: PHIẾU ĐIỀU CHỈNH BỔ SUNG VÀ TỜ TRÌNH CẤP CHỨNG THƯ&rdquo;</h1><br />";
                    echo "<form method='post' enctype='multipart/form-data'>";
                    //echo "Kệ: <input type='number' name='ke' maxlength='4' value='".$vt[0]."'><br>";
                    if ($vt[0] == 2){
                        echo "Kệ:   2 <input type='radio' name='ke' value='2' checked>";
                        echo "      3 <input type='radio' name='ke' value='3'><br>";
                    }else
                    {
                        echo "Kệ:   2 <input type='radio' name='ke' value='2'>";
                        echo "      3 <input type='radio' name='ke' value='3' checked><br>";
                    }

                    $nam_bs = trim($dataB["nam_bs"], "[]");
                    $nam_tt = trim($dataB["nam_tt"], "[]");
                    
                    //$nam_bs = implode(' ',$dataB["nam_bs"]);
                    echo "Cột: <input type='number' name='cot' maxlength='1' value='".$vt[2]."'><br>";
                    echo "Hàng: <input type='number' name='hang' maxlength='2' value='".$vt[1]."'><br>";
                    echo "Phiếu điều chỉnh bổ sung năm: <input type='text' name='nam_bs' value='".$nam_bs."'><br>";
                    echo "Tờ trình cấp chứng thư năm: <input type='text' name='nam_tt'  value='".$nam_tt."'><br>";
                    echo "Người chỉnh sửa: <input type='text' name='nguoiSua'><br>";
                    echo "Ghi chú: <input type='text' name='ghiChu'><br>";
                    echo"<button formaction='save_edit_bs_tt.php' type='submit' name='edit_ke' value='".$dataP."'>Cập nhật</button>";
                    echo"<button formaction='delete.php' type='submit' name='delete' value='".$dataP."'>Xóa HỒ SƠ</button>";
                    //echo"<input type='submit' name='submit' value='Cập nhật'>";
                    echo"</form>";
                    echo "<br />Lịch sử:<br />" .$dataB["ghi_chu"];
                }


            }
    }

?>
   
</body>
</html>