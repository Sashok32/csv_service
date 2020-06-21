
<form enctype="multipart/form-data" method="post">
    <fieldset class="form-group">
        <label for="fileInput">Download CSV</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
        <input type="file" class="form-control-file" id="fileInput" name="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
    </fieldset>

    <button type="submit" class="btn btn-primary">Import</button>
</form>

<?php if($error):?>
    <p class="text-danger"><?=$error?></p>
<?php endif;?>
<hr class="mt-5 mb-5">
<div class="btn-group" role="group">
    <form action="?route=default/delete" method="post" >
        <input type="text" name="delete" class="delete" value="0" hidden/>
        <button type="submit" class="btn btn-danger clear-records">Clear all records</button>
    </form>
    <a href="?route=default/view" class="btn btn-success">View results</a>
</div>
