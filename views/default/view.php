
<a href="/"><button type="submit" class="btn btn-primary">Import data</button></a>

<h2>CSV records</h2>

<?php if($error):?>
    <p class="text-danger"><?=$error?></p>
<?php else:?>
    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <?php foreach ($sortLinks as $link): ?>
                <th scope="col"><?=$link?></th>
            <?php endforeach; ?>
        </tr>
<!--         filters -->
        <tr>
            <?php foreach ($filterLinks as $filter): ?>
                <td scope="col"><?=$filter?></td>
            <?php endforeach; ?>
        </tr>
        </thead>

        <?php if (!empty($records)): ?>
            <tbody>
            <?php foreach ($records as $record): ?>
                <tr>
                    <th scope="row"><?=$record['UID']?></th>
                    <td><?=$record['Name']?></td>
                    <td><?=$record['Age']?></td>
                    <td><?=$record['Email']?></td>
                    <td><?=$record['Phone']?></td>
                    <td><?=$record['Gender']?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        <?php endif;?>
    </table>
    <a href="?route=default/export" target="_blank"><button type="submit" class="btn btn-outline-success">Export to CSV</button></a>
    <hr>
<?php endif;?>


