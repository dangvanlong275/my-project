<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join class</title>
</head>
<style>
    body{
        margin: 0 auto;
    }
    /* .join_class{
    margin-left: 500px;
    border: 0px solid;
    background: #48b4f3;
    width: 500px;
    padding: 20px;
    box-shadow: 0px 7px 12px #70bbcc;
    } */
    .submit{
        margin: 20px;
        padding-left: 140px;
    }
</style>
<body>
    
    <div class="join_class">
            <table border="0">
            <?php
                foreach($rs as $result){
            ?>
                <tr>
                    <th>Mã sinh viên :</th>
                    <th><input type="text" name="id" id="id" value = "<?= $result->masv ?>" disabled></th>
                </tr>
                <tr>
                    <th>Họ và tên :</th>
                    <th><input type="text" name="name" id="name" value = "<?= $result->namest ?> " disabled></th>
                </tr>
                <tr>
                    <th>Tuổi :</th>
                    <th><input type="text" name="age" id="age" value = "<?= $result->age ?> " disabled></th>
                </tr>
                <tr>
                    <th>Địa chỉ :</th>
                    <th><input type="text" name="address" id="address" value = "<?= $result->address ?> " disabled></th>
                </tr>
            <?php } ?>
            </table>
        <form action="./join_cl" method="post" style=" margin-left: 120px;" >
            <table cellpadding="10px" border="0" cellspacing="0">
            <div class="submit">
                <input style = "border-radius : 6px" type="submit" value="Save">
                <button style = "border-radius : 6px">
                    <a href="./students" style = "text-decoration: none; color:black;">Back</a>
                </button>
            </div>  
            <tr>
               <?php
                    $column = 0;
                    $i= 1;
                    foreach($cl as $class){
                        if($column % 2 == 0){
                            echo "</tr><tr class='subject'>";
                        }
                        echo "<td>";
                        echo "<h4>Lớp $class->namecl :</h4>";
                    foreach($list_class as $ltclass_dk){ 
                        if($ltclass_dk->namecl === $class->namecl){
                    ?>
                    <input type="checkbox" value="<?=$_GET['id']?>, <?= $class->malop ?>,<?= $ltclass_dk->mamon ?>" name = "class[]" checked id = "<?= $i ?>">
                    <label for="<?= $i ?>"><?=$ltclass_dk->tenmon?></label> <br>
                    <?php $i++;}} ?>
                    <?php
                    foreach($list_class_c as $ltclass_cdk){ 
                        if($ltclass_cdk->namecl === $class->namecl){
                    ?>
                    <input type="checkbox" value="<?=$_GET['id']?>,<?= $class->malop ?>,<?= $ltclass_cdk->mamon ?>" name = "class[]" id = "<?= $i ?>">
                    <label for="<?= $i ?>"><?=$ltclass_cdk->tenmon?></label><br>
                    <?php $i++;}} $column++;echo "</td>";}?>
            </tr>
                </table>
            </table>
            
        </form>
    </div>
</body>
</html>