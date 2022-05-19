<style>
    #duoi {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
</style>
<div id="duoi">
    <div class="paginate">
        <?php for($i = 1; $i <= $pages; $i++){?>
            <a href="?trang=<?php echo $i?>"><?php echo $i?></a>    
        <?php }?>
    </div>
    <div class="text">
        <h4>No copyright</h4>
    </div>
</div>