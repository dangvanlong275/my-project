<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class</title>
</head>
<style>
    body{
        margin: 0 auto;
        width: 960px;
    }
    input{
        margin: 5px;
    } 
    
    .list-class tr:hover{
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
    #update_class input{
        background:#48b4f3;
        border:0px;
    }
    #update_class input:focus{
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
        <div class="add-class" style = "margin-left: 210px;">
            <div class="search">
                <form action="#" method="post">
                    <input type="text" name="keyword" id="keyword" onkeyup="search_cl(this.value)" placeholder="Nhập thông tin tìm kiếm">
                </form>
            </div>
            <form action="./addclass" method="post">
                <table border="0">
                    <tr>
                        <th><label for="id">Mã lớp :</label></th>
                        <th><input type="text" name="id" id="id" required autofocus></th>
                    </tr>
                    <tr>
                        <th><label for="name">Tên lớp :</label></th>
                        <th><input type="text" name="name" id="name" required></th>
                    </tr>
                   
                </table>
                <input type="submit" value="Add CLass" style = "margin-left: 100px; border-radius : 6px;">
            </form>
            <div class="list-class" style = "margin-left: -120px;">
            <table border="0" cellpadding = "5">
                <?php
                    if(count($list_class) != 0){
                        echo "<thead style = 'background :rgb(87, 218, 223)'>
                        <th>Mã lớp</th>
                        <th>Tên lớp</th>
                        <th>Action</th>
                        </thead>";
                    }
                ?>
                <tbody id="update_class">
                        <?php
                            foreach ($list_class as $class) {
                        ?>
                        <tr>
                            <form action='./update_class' method='post' >
                                <th scope="row"><input type="text" name="malop" value=" <?= $class->malop ?>" readonly style="width:50px;"></th>
                                <td><input type="text" name="namecl"  value="<?= $class->namecl ?>"></td>
                                <td>
                                    <button style = "border-radius : 6px" type="submit"> Save</button>
                                <button type="button" <?php echo 'onclick=\'window.open("join_subject?id='.$class->malop.'","_self")\'' ?> style = "border-radius : 6px">
                                        Join Subject
                                    </button>
                                    <button type="button" style = "border-radius : 6px" onclick = "delete1(<?= $class->malop ?>)">Delete</button>
                                    <button type="button" style = "border-radius : 6px" <?php echo 'onclick=\'window.open("detail_class?id='.$class->malop.'","_self")\'' ?>>
                                        Detail Class
                                    </button>
                                </td>
                            </form>
                        </tr>
                        <?php }?>
                        </tbody>
            </table>
        </div>
        </div>
    </div>
</body>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script type='text/javascript'>
    function delete1(id) {
        option = confirm('Bạn có muốn xoá lớp học này không')
        if(!option) {
            return;
        }
        console.log(id);
        $.post('../Controller/delete_cl.php', {
            'id': id
        }, function(data) {
            alert(data);
            location.reload()
        })
    }
    function search_cl(str){
        console.log(str);
        $.post('../Controller/search_cl.php', {
            'keyword': str
        },function(data) {
            $('.list-class').html(data);
        })

    }
</script>
</html>