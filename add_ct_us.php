<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chứng Thư Ngoài EU</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
    <h1>THÊM CHỨNG THƯ MỸ</h1>
    <a href="index.php">Trở về trang chủ</a> <br/> <br/>
    <table border="1" cellspacing="0" id="customers">
    <?php
        echo "<form action='save_add_ct_us.php' method='post' enctype='multipart/form-data'>";
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
        echo "<tr><td>Năm:</td> <td><input type='number' name='nam' maxlength='4'></td></tr>";
        echo "<tr><td>Thùng số:</td> <td><input type='text' name='thung'></td></tr>";
        echo "<tr><td>YK bắt đầu:</td> <td><input type='number' name='ykStart'></td></tr>";
        echo "<tr><td>YK kết thúc:</td> <td><input type='number' name='ykEnd'></td></tr>";
        echo "<tr><td>Người lưu:</td> <td><input type='text' name='nguoiLuu'></td></tr>";
        echo "<tr><td>Ghi chú:</td> <td><textarea rows='10' cols='50' name='ghiChu'></textarea></td></tr>";
        echo "<tr><td colspan='2'><center><input type='submit' class='btn' name='submit' value='Thêm Hồ Sơ Vào Kệ'></center></td></tr>";
        echo"</form>";
    ?>
    </table>  
</body>
</html>