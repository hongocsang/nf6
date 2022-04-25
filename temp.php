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
    <!-- <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="click.js"></script> -->
    <link href="style.css" rel="stylesheet"/>

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
            location.href = 'add_ct_kc.php';
        }
        function ThemCG()
        {
            location.href = 'add_ct_cg.php';
        }
        function ThemBSTT()
        {
            location.href = 'add_ct_bs_tt.php';
        }
    
    </script>
    
</head>

<body>
Chúc mừng bạn có username là <?php echo $_SESSION['username'];  ?> đã đăng nhập thành công !
<br /><br />
<button id="btn_add_ct_neu" onclick="ThemCTNEU()">Thêm chứng thư ngoài EU</button>
<br /><br />
<button id="btn_add_ct_eu" onclick="ThemCTEU()">Thêm chứng thư EU</button>
<br /><br />
<button id="add_kc" onclick="ThemKC()">Thêm lô hàng không cấp chứng thư</button>
<br /><br />
<button id="btn_add_kd" onclick="ThemKD()">Thêm lô hàng không đạt</button>
<br /><br />
<button id="btn_add_bs_tt" onclick="ThemCG()">Thêm giấy chống giả hỏng</button>
<br /><br />
<button id="btn_add_bs_tt" onclick="ThemCG()">Thêm phiếu điều chỉnh bổ sung và tờ trình không cấp chứng thư</button>
<br /><br />
<!-- Kệ 2 -->
<table border="1" width="100%" cellspacing="0" >

    <tr>
        <td colspan="16"> <center>Kệ 2</center></td>
    </tr>

    <?php
        require_once("connection.php");
        for($row=9; $row >= 1; $row--)  
        {  
            echo "<tr  height='75px'>";
            
            for($col=1; $col <=16; $col++)
            {   
                if($col == 3 || $col == 5 || $col == 8 || $col == 11 || $col == 13)
                {   
                    if($row%3 == 0)
                    {
                        echo "<td id='".$row."_".$col."' width='6.25%' class='trt_r' >".chr(64+$row)."-".$col."</td>";
                    }else
                    {
                        echo "<td id='".$row."_".$col."' width='6.25%' class='tdright' >".chr(64+$row)."-".$col."</td>";
                    }
                }else
                {   
                    if($row%3 == 0)
                    {
                        echo "<td id='".$row."_".$col."' width='6.25%' class='tdtop'>".chr(64+$row)."-".$col. "</td>";
                    }else
                    {
                        echo "<td id='".$row."_".$col."' width='6.25%' >".chr(64+$row)."-".$col."</td>";
                    }
                    
                }   
            }  
            echo "</tr>";  
        }
    ?>

</table>
<!-- <div id="noidung">
<?php
// if(isset($_POST['tdID']))
// {
//  echo 'Data = '.$_POST['tdID'].' thành công';
// }else{
//  echo 'Không nhận được dữ liệu';
// }
?>
</div>
<dialog id="favDialog">
  <form method="dialog">
    <p><label>Favorite animal:
      <select>
        <option></option>
        <option>Brine shrimp</option>
        <option>Red panda</option>
        <option>Spider monkey</option>
      </select>
    </label></p>
    <menu>
      <button>Cancel</button>
      <button>Confirm</button>
    </menu>
  </form>
</dialog> -->
</body>
    
</html>