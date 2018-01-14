<div class="card" style="width: 20rem;">
    <div class="card-block">
        <h4 class="card-title">Share Something!</h4>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label>Share Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label>Body</label>
                <textarea name="body" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label>Link</label>
                <input type="text" name="link" class="form-control">
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
            <a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>shares">Cancel</a>
        </form>
    </div>
</div>