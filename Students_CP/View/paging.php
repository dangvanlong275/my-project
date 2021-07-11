<?php
    if($current_page > 3){
        $prev_page = $current_page - 1;
        echo "<li><a href='./$url?page=$prev_page' class='prev' style='border-radius: 6px 0 0 6px;'>&laquo</a></li>";
    }
    for($page = 1;$page <= $totalPage; $page++){
        if($page != $current_page){
            if($page > $current_page -  3 && $page < $current_page + 3){
                echo "<li><a href='./$url?page=$page'>$page</a></li>";
            }
        }else{
            echo "<li><a style='background:aqua'>$page</a></li>";
        }
    }
    if($totalPage - $current_page > 2 ){
        $next_page = $current_page + 1;
        echo "<li><a href='./$url?page=$next_page' class='next' style='border-radius: 0 6px 6px 0 ;'>&raquo</a></li>";
    }
?>