<?php
if (mysqli_num_rows($data['todos']) !== 0 && !is_edit_mode()):
    while ($row = mysqli_fetch_object($data['todos'])):
    ?>
	<div class="card mb-3">
	    <div class="card-body">
	        <span class="<?=$row->status ? 'text-decoration-line-through' : ''?>"><?=$row->todo?></span>
	    </div>
	    <div class="card-footer d-flex justify-content-between align-items-center">
	        <small><?=$row->status ? 'Done At: ' . date("d F Y H:i:s", strtotime($row->done_at)) : 'Created At: ' . date("d F Y H:i:s", strtotime($row->created_at))?></small>
	        <div class="d-flex gap-1">
	            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
	                <button type="submit" class="btn btn-<?=$row->status ? 'secondary' : 'success'?> btn-sm">
	                    <i class="bi bi-<?=$row->status ? 'x-lg' : 'check-circle'?>"></i>
	                    <?=$row->status ? 'Undone' : 'Done'?>
	                </button>
	                <input type="hidden" name="id" value="<?=$row->id?>">
	                <input type="hidden" name="action" value="<?=$row->status ? 'undone' : 'done'?>">
	            </form>
	            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
    	            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                    <input type="hidden" name="id" value="<?=$row->id?>">
	                <input type="hidden" name="action" value="delete">
	            </form>
	            <a href="?action=edit&id=<?= $row->id ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
	        </div>
	    </div>
	</div>
<?php
    endwhile;
endif;
?>