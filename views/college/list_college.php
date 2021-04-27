<!DOCTYPE html>
<html>
    <head>
        <title>College List Page</title>
    </head>
    <link rel="stylesheet" href="<?=baseUrl('/assets/style.css')?> "></link>
    <body>
        <?php require("./views/header.php"); ?>
        <div class="b-body">
            <h4 class="title" >College List</h4>
            <a href="<?=baseUrl('/colleges/createForm') ?>" class="btn-create"> Create College</a>
            <table class="table" width="100%">            
                <tr>
                    <th>ID</th>
                    <th>College Name</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach($rows as $row) { ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['college_name']; ?></td>
                    <td><?= $row['college_address']; ?></td>
                    <td><?= $row['college_phone']; ?></td>
                    <td>
                        <form action="<?= baseUrl('/colleges/updateForm')?>" method="post" >
                            <input type="hidden" name="token" value="<?= $_SESSION["_token"]; ?>">
                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                            <button>Update</button>
                        </form>
                    </td>
                    <td>
                        <form action="<?= baseUrl('/colleges/delete') ?>" method="post" >
                            <input type="hidden" name="token" value="<?= $_SESSION["_token"]; ?>">
                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                            <button>Delete</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </table>            
        </div>
    </body>
</html>

<!-- //php -S localhost:9999 -->