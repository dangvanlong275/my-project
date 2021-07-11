<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject</title>
</head>
<style>
    body{
        margin: 0 auto;
        width: 960px;
    }
    input{
        margin: 5px;
    } 
    
    .list-subject tr:hover{
        background: rgb(87, 218, 223);
    }
    .content{
        margin-left: 180px; 
        padding: 20px;
        border: 0px solid;
        background: #48b4f3;
        box-shadow: 0px 7px 12px #70bbcc;
    }
    .search{
        position: relative;
    }
    #keyword{
        width: 280px;
        height: 40px;
        border-radius: 5px;
    }
  
    ul{
        list-style: none;
        width: 150px;
        margin: 0;
        padding: 0;
        overflow: hidden; 
        text-align: center;
        
    }
    li{
        float: left;
    }
    li a , .dropbtn{
        text-decoration: none;
        padding: 15px;
        display: inline-block;
        
        color: white;
    }
    a:hover{
        background-color: gray;
    }
    .dropbtn{
        display: none;
        position: absolute; 
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgb(0, 0, 0,0,2);
        z-index: 1;
        margin-right:200px ;
    }
    .dropbtn a{
        color: white;
        padding: 15px;
        text-decoration: none;
        display: block;
        clear: both;
        float: left;
    }
    .dropbtn a:hover{
        background-color: rgb(33, 208, 214);
    }
    .dropdown:hover .dropbtn{
        display: block;
    }
    #update_subject input{
        background:#48b4f3;
        border:0px;
        text-align: center;
    }
    #update_subject input:focus{
        background:white;
    }
</style>
<body>
    <div class="content">
        <div class="menu" style = "margin-left: 40px;">
            <ul>
            <li class="dropdown"> 
                    <a href="students">Students</a>
                    <div class="dropbtn">
                        <a href="major">Major</a>
                    </div>
                </li>
                <li class="dropdown"><a href="class">Class</a>
                    <div class="dropbtn">
                        <a href="subject">Subject</a>
                    </div></li>
            </ul>
        </div>
        <div class="add-subject" style = "margin-left: 210px;">
            <div class="search">
                <form action="#" method="post">
                    <input type="text" name="keyword" id="keyword" onkeyup="search_sub(this.value)" placeholder="Nhập thông tin tìm kiếm">
                </form>
            </div>
            <form action="./addsubject" method="post">
                <table border="0">
                    <tr>
                        <th><label for="name">Tên môn :</label></th>
                        <th><input type="text" name="name" id="name" required autofocus></th>
                    </tr>
                    <tr>
                        <th><label for="sotinchi">Số tín chỉ :</label></th>
                        <th><input type="text" name="sotinchi" id="sotinchi" required></th>
                    </tr>
                   
                </table>
                <input type="submit" value="Add Subject" style = "margin-left: 100px; border-radius : 6px;">
            </form>
            <div class="list-subject" style = "margin-left: -180px;">
            <table border="0" cellpadding = "5">
                <?php
                    if(count($list_subject) != 0){
                        echo "<thead style = 'background :rgb(87, 218, 223)'>
                        <th>Mã môn</th>
                        <th>Tên môn</th>
                        <th>Số tín chỉ</th>
                        <th>Action</th>
                        </thead>";
                    }
                ?>
                <tbody id="update_subject">
                        <?php
                            foreach ($list_subject as $subject) {
                        ?>
                        <tr>
                            <form action="./update_subject" method="post" >
                                <th scope="row"><input type="text" name="mamon" value=" <?= $subject->mamon ?>" style="width:50px;"></th>
                                <td><input type="text" name="tenmon"  value="<?= $subject->tenmon ?>"></td>
                                <td><input type="text" name="sotinchi"  value="<?= $subject->sotinchi ?>"></td>
                                <input type="text" name="s_mamon"  value="<?= $subject->mamon ?>" style="display: none ">
                                <td>
                                    <button style = "border-radius : 6px" type="submit"> Save</button>
                            </form>
                                    <button style = "border-radius : 6px" onclick = "delete1(<?= $subject->mamon ?>)">Delete</button>
                                    <button style = "border-radius : 6px" <?php echo 'onclick=\'window.open("detail_subject?id='.$subject->mamon.'","_self")\'' ?>>
                                        Detail Subject
                                    </button>
                                </td>
                        </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</body>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script type='text/javascript'>
    function delete1(id) {
        option = confirm('Bạn có muốn xoá môn học này không')
        if(!option) {
            return;
        }
        console.log(id);
        $.post('../Controller/delete_sub.php', {
            'id': id
        }, function(data) {
            alert(data);
            location.reload()
        })
    }
    function search_sub(str){
        console.log(str);
        $.post('../Controller/search_sub.php', {
            'keyword': str
        },function(data) {
            $('.list-subject').html(data);
        })

    }
</script>
</html>