<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm phiếu bổ sung + tờ trình</title>
    <link rel="stylesheet" href="add.css">
    <!-- <style>
        .btn {
            background-color: white; 
            border: 2px solid #4CAF50;
            color: red;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            cursor: pointer;
            font-weight: bold;
            border-radius: 12px
        }

        .btn:hover {
            background-color: #4CAF50;
        }

        #customers {
            border-collapse: collapse;
            width: 100%;
            }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd; 
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style> -->
</head>
<body>
    <h1>THÊM PHIẾU ĐIỀU CHỈNH BỔ SUNG VÀ TỜ TRÌNH CẤP CHỨNG THƯ</h1>
    <a href="index.php">Trở về trang chủ <br /><br /></a>
    <table border="1" cellspacing="0" id="customers">
        <?php
            echo "<form action='save_add_bs_tt.php' method='post' enctype='multipart/form-data'>";
            if(isset($_POST['add']))
            {
                $data = $_POST['add'];
                $vt = explode('_', $data);
                if($vt[0] == 2){
                    echo "<tr><td>Kệ:</td>   <td>Số 2 <input type='radio' name='ke' value='2' checked>";
                    echo "      Số 3 <input type='radio' name='ke' value='3'></td></tr>";
                }else{
                    echo "<tr><td>Kệ:</td>   <td>Số 2 <input type='radio' name='ke' value='2'>";
                    echo "      Số 3 <input type='radio' name='ke' value='3' checked></td></tr>";
                }

                echo "<tr><td>Cột:</td> <td><input type='number' name='cot' value='".$vt[2]."'></td></tr>";
                echo "<tr><td>Hàng:</td> <td><input type='number' name='hang' value='".$vt[1]."'></td></tr>";
            }else
            {
                echo "<tr><td>Kệ:</td>  <td> Số 2 <input type='radio' name='ke' value='2' checked>";
                echo "      Số 3 <input type='radio' name='ke' value='3'></td></tr>";
                echo "<tr><td>Cột:</td> <td><input type='number' name='cot' ></td></tr>";
                echo "<tr><td>Hàng:</td> <td><input type='number' name='hang'></td></tr>";
            }
            echo "<tr><td>Phiếu điều chỉnh bổ sung năm:</td> <td><input type='text' name='nam_bs'></td></tr>";
            echo "<tr><td>Tờ trình cấp chứng thư năm:</td> <td><input type='text' name='nam_tt'></td></tr>";
            echo "<tr><td>Người lưu:</td> <td><input type='text' name='nguoiLuu'></td></tr>";
            echo "<tr><td>Ghi chú:</td> <td><textarea rows='10' cols='50' name='ghiChu'></textarea></td></tr>";
            echo "<tr><td colspan='2'><center><input type='submit' class='btn' name='submit' value='Thêm Hồ Sơ Vào Kệ'></center></td></tr>";
            echo"</form>";
        ?>

    </table>   

</body>
</html>