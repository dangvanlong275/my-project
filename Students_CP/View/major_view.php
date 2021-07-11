<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Major</title>
</head>
<style>
    body{
        margin: 0 auto;
        width: 960px;
    }
    input{
        margin: 5px;
    } 
    
    .list-major tr:hover{
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
    #update_major input{
        background:#48b4f3;
        border:0px;
        text-align: center;
    }
    #update_major input:focus{
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
        <div class="add-major" style = "margin-left: 210px;">
            <div class="search">
                <form action="#" method="post">
                    <input type="text" name="keyword" id="keyword" onkeyup="search_mj(this.value)" placeholder="Nhập thông tin tìm kiếm">
                </form>
            </div>
            <form action="./addmajor" method="post">
                <table border="0">
                    <tr>
                        <th><label for="name">Tên nghành :</label></th>
                        <th><input type="text" name="name" id="name" required autofocus></th>
                    </tr>
                    <tr>
                        <th><label for="time">Thời gian đào tạo :</label></th>
                        <th><input type="text" name="time" id="time" required></th>
                    </tr>
                   
                </table>
                <input type="submit" value="Add Major" style = "margin-left: 100px; border-radius : 6px;">
            </form>
            <div class="list-major" style = "margin-left: -180px;">
            <table border="0" cellpadding = "5">
                <?php
                    if(count($list_major) != 0){
                        echo "<thead style = 'background :rgb(87, 218, 223)'>
                        <th>Mã nghành</th>
                        <th>Tên nghành</th>
                        <th>Thời gian đào tạo</th>
                        <th>Action</th>
                        </thead>";
                    }
                ?>
                <tbody id="update_major">
                        <?php
                            foreach ($list_major as $major) {
                        ?>
                        <tr>
                            <form action="./update_major" method="post" >
                                <th scope="row"><input type="text" name="manghanh" value=" <?= $major->manghanh ?>" style="width:50px;"></th>
                                <td><input type="text" name="tennghanh"  value="<?= $major->tennghanh ?>"></td>
                                <td><input type="text" name="thoigiandaotao"  value="<?= $major->thoigiandaotao ?>"></td>
                                <input type="text" name="s_manghanh"  value="<?= $major->manghanh ?>" style="display:none">
                                <td>
                                    <button style = "border-radius : 6px" type="submit"> Save</button>
                            </form>
                                    <button style = "border-radius : 6px" onclick = "delete1(<?= $major->manghanh ?>)">Delete</button>
                                    <button style = "border-radius : 6px" <?php echo 'onclick=\'window.open("detail_major?id='.$major->manghanh.'","_self")\'' ?>>
                                        Detail Major
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
        option = confirm('Bạn có muốn xoá nghành học này không')
        if(!option) {
            return;
        }
        console.log(id);
        $.post('../Controller/delete_mj.php', {
            'id': id
        }, function(data) {
            alert(data);
            location.reload()
        })
    }
    function search_mj(str){
        console.log(str);
        $.post('../Controller/search_mj.php', {
            'keyword': str
        },function(data) {
            $('.list-major').html(data);
        })

    }
</script>
</html>