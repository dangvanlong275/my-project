<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Subject</title>
</head>
<style>
    .join_subject{
    margin-left: 500px;
    border: 0px solid;
    background: #48b4f3;
    width: 500px;
    padding: 20px;
    box-shadow: 0px 7px 12px #70bbcc;
    }
</style>
<body>
    <?php
        // echo "<pre>";
        // print_r ($rs);
        // echo "</pre>";
        foreach($rs as $result){
    ?>
    <div class="join_subject">
            <table border="0">
                <tr>
                    <th>Mã lớp :</th>
                    <th><input type="text" name="id" id="id" value = "<?= $result->malop ?>" disabled></th>
                </tr>
                <tr>
                    <th>Tên lớp :</th>
                    <th><input type="text" name="name" id="name" value = "<?= $result->namecl ?> " disabled></th>
                </tr>
                    
            </table>
        <form action="./join_sub" method="post" style=" margin-left: 120px;">
            <?php
            $i= 1;
            foreach($list_subject as $ltsubject_dk){ 
            ?>
            <input type="checkbox" value="<?= $ltsubject_dk->malop ?>,<?= $ltsubject_dk->mamon ?>" name = "subject[]" checked id = "<?= $i ?>">
            <label for="<?= $i ?>"><?=$ltsubject_dk->tenmon?></label> <br>
            <?php $i++;} ?>
            <?php
            foreach($list_subject_c as $ltsubject_cdk){ 
            ?>
            <input type="checkbox" value="<?= $ltsubject_cdk->malop ?>,<?= $ltsubject_cdk->mamon ?>" name = "subject[]" id = "<?= $i ?>">
            <label for="<?= $i ?>"><?=$ltsubject_cdk->tenmon?></label><br>
            <?php $i++;}?>
            
            <input style = "border-radius : 6px" type="submit" value="Save">
            <button style = "border-radius : 6px">
                <a href="./class" style = "text-decoration: none; color:black;">Back</a>
            </button>
        </form>
    </div>
    <?php } ?>
</body>
</html>