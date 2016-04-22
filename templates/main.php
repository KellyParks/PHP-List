<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <h3 class="text-center">Create your list by entering your items to the field below and clicking Add to list. Your list will generate at the bottom of this page.</h3>
        <input type="submit" id="logout" class="btn btn-info" formaction="../logout.php" value="Logout">
        <?php echo $errors ?>
        <form method="post" class="form-horizontal">
            <div class="form-group">
                <label for="item">List:</label>
                <input type="item" class="form-control" name="item" id="item">
            </div>
            <div class="form-group text-right">
                <button type="submit" class="btn btn-danger" name="Submit">Add to list</button>
            </div>
        </form>
        <ul>
            <?php
                $list = showContentRelatedToUserID();

                foreach($list as $key => $values) {
                    echo "<li>" . $values['item'] . "</li>";
                }
            ?>
        </ul>
    </div>
</div>