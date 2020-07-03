<nav id="pagination">
    <ul id="pagiul">
        <li class="<?php if($page <= 1){ echo 'disabled'; }else {
            echo "pagili";
        } ?>"><a class="pagilia" href="?page=1"><img alt="first" src='pictures/icons/first.png' style="height: 30px; width: 30px;"></a></li>
        <li class="<?php if($page <= 1){ echo 'disabled'; }else {
            echo "pagili";
        } ?>">
            <a class="pagilia" href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?>"><img alt="leftarrow" src='pictures/icons/leftarrow.png' style="height: 30px; width: 30px;"></a>
        </li>
        <?php echo paginate($total_rows,$page,$size,$total_pages)?>
        <li class="<?php if($page >= $total_pages){ echo 'disabled'; }else {
            echo "pagili";
        } ?>">
            <a class="pagilia" href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?page=".($page + 1); } ?>"><img alt="rightarrow" src='pictures/icons/rightarrow.png' style="height: 30px; width: 30px;"></a>
        </li>
        <li class="<?php if($page >= $total_pages){ echo 'disabled'; }else {
            echo "pagili";
        } ?>"><a class="pagilia" href="?page=<?php echo $total_pages; ?>"><img alt="last" src='pictures/icons/last.png' style="height: 30px; width: 30px;"></a></li>
    </ul>
</nav>
