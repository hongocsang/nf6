<?php
session_start();
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['username'])) {
	 header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="click.js"></script> 
    <link rel="stylesheet" href="dinhdang.css">

    <script>
        function ThemCTNEU()
        {
            location.href = 'add_ct_neu.php';
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
        function ThemCTUS()
        {
            location.href = 'add_ct_us.php';
        }
    
    </script>
    
</head>

<body>
Chúc mừng <?php echo $_SESSION['username']; ?> đã đăng nhập thành công !
<br /><br />
<button class="btnAdd btnAddNEU" id="btn_add_ct_neu" onclick="ThemCTNEU()">Thêm chứng thư ngoài EU</button>
<button class="btnAdd btnAddUS" id="btn_add_ct_us" onclick="ThemCTUS()">Thêm chứng thư Mỹ</button>
<button class="btnAdd btnAddEU" id="btn_add_ct_eu" onclick="ThemCTEU()">Thêm chứng thư EU</button>
<button class="btnAdd btnAddCGH" id="btn_add_chg" onclick="ThemCG()">Thêm giấy chống giả hỏng</button>
<br />
<button class="btnAdd btnAddDifferent" id="add_kc" onclick="ThemKC()">Thêm lô hàng không cấp chứng thư</button>
<button class="btnAdd btnAddDifferent" id="btn_add_kd" onclick="ThemKD()">Thêm lô hàng không đạt</button>
<button class="btnAdd btnAddDifferent" id="btn_add_bs_tt" onclick="ThemBSTT()">Thêm phiếu điều chỉnh bổ sung và tờ trình không cấp chứng thư</button>
<br /><br />
<!-- Kệ 2 -->
<table border="1" width="100%" cellspacing="0" >

    <tr>
        <td colspan="16"> <center>Kệ 2</center></td>
    </tr>

    <!-- mysqli_num_rows() tổng hàng -->

    <?php
        require_once("connection.php");
        $sql = "select * FROM `ke` WHERE `vt_ke` = 2";
        $result = mysqli_query($conn, $sql);

        for($row=9; $row >= 1; $row--)  
        {  
            echo "<tr  height='75px'>";
            
            for($col=1; $col <=16; $col++)
            {
               
                //echo "<td id='".$row."_".$col."' width='6.25%'>".chr(64+$row)."-".$col."</td>";
                // echo "<td id='".$row."_".$col."' width='6.25%' onclick='editVT(1,".$row.",".$col.")'>"
                // .chr(64+$row)."-".$col."</td>";

                //".chr(64+$row)."-".$col."
                echo "<td width='6.25%'>
                    <form id ='2__".$row."_".$col."' method='post'>
                        <button
                            class = 'btnHS'
                            id = '2_".$row."_".$col."'
                            type = 'submit' 
                            name = 'edit'
                            formaction = 'edit_vt.php' 
                            form = '2__".$row."_".$col."' 
                            value = '2_".$row."_".$col."'
                        >
                        H".$row." - C".$col."
                        </button> 
                    </form>
                </td>";
                // ".chr(64+$row)."-".$col."
            }  
            echo "</tr>";  
        }
        while($data = mysqli_fetch_assoc($result))
        {
            $sqlB = "select * FROM ".$data['bang']." WHERE `id` = '".$data['id_bang']."'";
            $result2 = mysqli_query($conn, $sqlB);
            $data2 = mysqli_fetch_assoc($result2);
            echo '<script>document.getElementById("2_'.$data["vt_hang"].'_'.$data["vt_cot"].'").innerHTML = 
            "'.$data2["nguoi_luu"].'";</script>';

            $str = "";
            if($data['bang'] == "chungthu" && $data2["eu"] == 1)
            {
                $thung = trim($data2["thung_so"], "[]");
                $str = "NEU - " .$data2["nam"]. "<br />Thùng số: ".$thung."<br />".$data2["yk_start"]."-".$data2["yk_end"];

                //if($data2["eu"] == 0)
                //{
                    echo '<script>
                            document.getElementById("2_'.$data["vt_hang"].'_'.$data["vt_cot"].'").innerHTML = "'.$str.'";
                            document.getElementById("2_'.$data["vt_hang"].'_'.$data["vt_cot"].'").className = "btnHS btnNEU"
                        </script>';
                /*}else
                {
                    echo '<script>
                            document.getElementById("2_'.$data["vt_hang"].'_'.$data["vt_cot"].'").innerHTML = "'.$str.'";
                            document.getElementById("2_'.$data["vt_hang"].'_'.$data["vt_cot"].'").className = "btnHS btnEU"
                        </script>';
                }

                if($data2["nam"]<getdate()['year'])
                {
                    echo '<script>
                    document.getElementById("2_'.$data["vt_hang"].'_'.$data["vt_cot"].'").className = "btnHS btnExpired"
                        </script>';
                }
                */
            }
            elseif($data['bang'] == "chungthu" && $data2["eu"] == 2)
            {
                $str = "US - " .$data2["nam"]. "<br />".$data2["yk_start"]."-".$data2["yk_end"];
                echo '<script>
                    document.getElementById("2_'.$data["vt_hang"].'_'.$data["vt_cot"].'").innerHTML = "'.$str.'";
                    document.getElementById("2_'.$data["vt_hang"].'_'.$data["vt_cot"].'").className = "btnHS btnUS"
                </script>';
            }
            elseif($data['bang'] == "chungthu" && $data2["eu"] == 3)
            {
                $str = "EU - " .$data2["nam"]. "<br />".$data2["yk_start"]."-".$data2["yk_end"];
                echo '<script>
                    document.getElementById("2_'.$data["vt_hang"].'_'.$data["vt_cot"].'").innerHTML = "'.$str.'";
                    document.getElementById("2_'.$data["vt_hang"].'_'.$data["vt_cot"].'").className = "btnHS btnEU"
                </script>';
            }
            elseif($data['bang'] == "chonggiahong")
            {
                $str = "Chống giả hỏng<br />" .$data2["nam"]. "<br />Thùng số: ".$data2["thung_so"];
                echo '<script>
                    document.getElementById("2_'.$data["vt_hang"].'_'.$data["vt_cot"].'").innerHTML = "'.$str.'";
                    document.getElementById("2_'.$data["vt_hang"].'_'.$data["vt_cot"].'").className = "btnHS btnCGH"
                </script>';

                if($data2["nam"]<getdate()['year'])
                {
                    echo '<script>
                    document.getElementById("2_'.$data["vt_hang"].'_'.$data["vt_cot"].'").className = "btnHS btnExpired"
                        </script>';
                }
            }elseif($data['bang'] == "bs_tt")
            {
                $nam_bs = trim($data2["nam_bs"], "[]");
                $nam_tt = trim($data2["nam_tt"], "[]");
                $str = "Bổ sung<br />" .$nam_bs."<br />Tờ trình<br />" .$nam_tt;    

                echo '<script>
                    document.getElementById("2_'.$data["vt_hang"].'_'.$data["vt_cot"].'").innerHTML = "'.$str.'";
                    document.getElementById("2_'.$data["vt_hang"].'_'.$data["vt_cot"].'").className = "btnHS btnDifferent"
                </script>';
               

                //
                $end_nam_bs = (int)substr( $nam_bs,-4,4);
                $end_nam_tt = (int)substr( $nam_tt,-4,4);
                if(max($end_nam_bs,$end_nam_tt)<getdate()['year'])
                {
                    echo '<script>
                            document.getElementById("2_'.$data["vt_hang"].'_'.$data["vt_cot"].'").className = "btnHS btnExpired"
                        </script>';
                }
            }else
            {   
                $nam = trim($data2["nam"], "[]");
                if($data['bang'] == "khongcap")
                {
                    $str = "Lô hàng không cấp chứng thư<br />" .$nam;
                }else
                {
                    $str = "Lô hàng không đạt<br />" .$nam;
                }
               
                echo '<script>
                    document.getElementById("2_'.$data["vt_hang"].'_'.$data["vt_cot"].'").innerHTML = "'.$str.'";
                    document.getElementById("2_'.$data["vt_hang"].'_'.$data["vt_cot"].'").className = "btnHS btnDifferent"
                </script>';

                $end_nam = (int)substr( $nam,-4,4);
                if($end_nam<getdate()['year'])
                {
                    echo '<script>
                            document.getElementById("2_'.$data["vt_hang"].'_'.$data["vt_cot"].'").className = "btnHS btnExpired"
                        </script>';
                }
            }

            
        }
    ?>


</table>


<br /><br />
<!-- Kệ 3 -->
<table border="1" width="100%" cellspacing="0" >

    <tr>
        <td colspan="16"> <center>Kệ 3</center></td>
    </tr>

    <!-- mysqli_num_rows() tổng hàng -->

    <?php
        require_once("connection.php");
        $sql = "select * FROM `ke` WHERE `vt_ke` = 3";
        $result = mysqli_query($conn, $sql);

        for($row=9; $row >= 1; $row--)  
        {  
            echo "<tr  height='75px'>";
            
            for($col=1; $col <=16; $col++)
            {
               
                //echo "<td id='".$row."_".$col."' width='6.25%'>".chr(64+$row)."-".$col."</td>";
                // echo "<td id='".$row."_".$col."' width='6.25%' onclick='editVT(1,".$row.",".$col.")'>"
                // .chr(64+$row)."-".$col."</td>";

                echo "<td width='6.25%'>
                    <form id ='3__".$row."_".$col."' method='post'>
                        <button
                            class = 'btnHS'
                            id='3_".$row."_".$col."'
                            type='submit' 
                            name='edit'
                            formaction='edit_vt.php' 
                            form='3__".$row."_".$col."' 
                            value='3_".$row."_".$col."'
                        >
                        H".$row." - C".$col."
                        </button> 
                    </form>
                </td>";
                // ".chr(64+$row)."-".$col."
            }  
            echo "</tr>";  
        }
        while($data = mysqli_fetch_assoc($result))
        {
            $sqlB = "select * FROM ".$data['bang']." WHERE `id` = '".$data['id_bang']."'";
            $result2 = mysqli_query($conn, $sqlB);
            $data2 = mysqli_fetch_assoc($result2);
            echo '<script>document.getElementById("3_'.$data["vt_hang"].'_'.$data["vt_cot"].'").innerHTML = 
            "'.$data2["nguoi_luu"].'";</script>';


            $str = "";
            if($data['bang'] == "chungthu" && $data2["eu"] == 1)
            {
                //$thung = trim($data2["thung_so"], "[]");
                $str = "NEU - " .$data2["nam"]. "<br />Thùng số: ".$thung."<br />".$data2["yk_start"]."-".$data2["yk_end"];

                //if($data2["eu"] == 1)
                //{
                   echo '<script>
                            document.getElementById("3_'.$data["vt_hang"].'_'.$data["vt_cot"].'").innerHTML = "'.$str.'";
                            document.getElementById("3_'.$data["vt_hang"].'_'.$data["vt_cot"].'").className = "btnHS btnNEU"
                        </script>';
                /*}elseif($data2["eu"] == 3)
                {
                    echo '<script>
                            document.getElementById("3_'.$data["vt_hang"].'_'.$data["vt_cot"].'").innerHTML = "'.$str.'";
                            document.getElementById("3_'.$data["vt_hang"].'_'.$data["vt_cot"].'").className = "btnHS btnEU"
                        </script>';
                }else
                {
                    echo '<script>
                            document.getElementById("3_'.$data["vt_hang"].'_'.$data["vt_cot"].'").innerHTML = "'.$str.'";
                            document.getElementById("3_'.$data["vt_hang"].'_'.$data["vt_cot"].'").className = "btnHS btnUS"
                        </script>';
                }*/

                if($data2["nam"]<getdate()['year'])
                {
                    echo '<script>
                    document.getElementById("3_'.$data["vt_hang"].'_'.$data["vt_cot"].'").className = "btnHS btnExpired"
                        </script>';
                }
            }
            elseif($data['bang'] == "chungthu" && $data2["eu"] == 2)
            {
                $str = "US - " .$data2["nam"]. "<br />".$data2["yk_start"]."-".$data2["yk_end"];
                echo '<script>
                    document.getElementById("3_'.$data["vt_hang"].'_'.$data["vt_cot"].'").innerHTML = "'.$str.'";
                    document.getElementById("3_'.$data["vt_hang"].'_'.$data["vt_cot"].'").className = "btnHS btnUS"
                </script>';
            }
            elseif($data['bang'] == "chungthu" && $data2["eu"] == 3)
            {
                $str = "EU - " .$data2["nam"]. "<br />".$data2["yk_start"]."-".$data2["yk_end"];
                echo '<script>
                    document.getElementById("3_'.$data["vt_hang"].'_'.$data["vt_cot"].'").innerHTML = "'.$str.'";
                    document.getElementById("3_'.$data["vt_hang"].'_'.$data["vt_cot"].'").className = "btnHS btnEU"
                </script>';
            }
            elseif($data['bang'] == "chonggiahong")
            {
                $str = "Chống giả hỏng<br />" .$data2["nam"]. "<br />Thùng số: ".$data2["thung_so"];
                echo '<script>
                    document.getElementById("3_'.$data["vt_hang"].'_'.$data["vt_cot"].'").innerHTML = "'.$str.'";
                    document.getElementById("3_'.$data["vt_hang"].'_'.$data["vt_cot"].'").className = "btnHS btnCGH"
                </script>';

                if($data2["nam"]<getdate()['year'])
                {
                    echo '<script>
                    document.getElementById("3_'.$data["vt_hang"].'_'.$data["vt_cot"].'").className = "btnHS btnExpired"
                        </script>';
                }

            }elseif($data['bang'] == "bs_tt")
            {
                $nam_bs = trim($data2["nam_bs"], "[]");
                $nam_tt = trim($data2["nam_tt"], "[]");
                $str = "Bổ sung<br />" .$nam_bs."<br />Tờ trình<br />" .$nam_tt;

                echo '<script>
                    document.getElementById("3_'.$data["vt_hang"].'_'.$data["vt_cot"].'").innerHTML = "'.$str.'";
                    document.getElementById("3_'.$data["vt_hang"].'_'.$data["vt_cot"].'").className = "btnHS btnDifferent"
                </script>';

                $end_nam_bs = (int)substr( $nam_bs,-4,4);
                $end_nam_tt = (int)substr( $nam_tt,-4,4);
                if(max($end_nam_bs,$end_nam_tt)<getdate()['year'])
                {
                    echo '<script>
                            document.getElementById("3_'.$data["vt_hang"].'_'.$data["vt_cot"].'").className = "btnHS btnExpired"
                        </script>';
                }
            }else
            {   
                $nam = trim($data2["nam"], "[]");
                if($data['bang'] == "khongcap")
                {
                    $str = "Lô hàng không cấp chứng thư<br />" .$nam;
                }else
                {
                    $str = "Lô hàng không đạt<br />" .$nam;
                }
               
                echo '<script>
                    document.getElementById("3_'.$data["vt_hang"].'_'.$data["vt_cot"].'").innerHTML = "'.$str.'";
                    document.getElementById("3_'.$data["vt_hang"].'_'.$data["vt_cot"].'").className = "btnHS btnDifferent"
                </script>';


                $end_nam = (int)substr( $nam,-4,4);
                if($end_nam<getdate()['year'])
                {
                    echo '<script>
                            document.getElementById("3_'.$data["vt_hang"].'_'.$data["vt_cot"].'").className = "btnHS btnExpired"
                        </script>';
                }
            }
        }
    ?>


</table>

</body>
    
</html>