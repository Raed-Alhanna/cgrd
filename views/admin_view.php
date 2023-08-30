<!-- Admin Area -->
<script src='./views/index.js'></script>
<?php if (count($articles) > 0): ?>
    <h4>All News</h4>
<?php endif; ?>
<div id="articles-container">
    <?php foreach ($articles as $article) {
        $desc = str_replace(array("\r", "\n"), array("\\r", "\\n"), $article->getDescription()) ?>
        <div class="article">

            <div class="article-info">
                <div class="article-title">
                    <p style="margin:auto;">
                        <?php echo $article->getTitle(); ?>
                    </p>
                </div>
                <div class="article-desc">
                    <p>
                        <?php echo nl2br($article->getDescription()); ?>
                    </p>
                </div>
            </div>
            <div class="article-buttons-group">
                <a class="article-button"
                    onclick='populateForm("<?php echo $article->getId(); ?>", "<?php echo $article->getTitle(); ?>", "<?php echo $desc ?>");'><img
                        src="./views/assets/pencil.svg" alt="   ">
                </a>

                <form method="POST" style="display: flex;" action="index.php">
                    <input type="hidden" name="article-id" value="<?php echo $article->getId(); ?>" />
                    <button class="article-button" type="submit" name="delete-article"
                        style="background: none; border: none;">
                        <img src="./views/assets/close.svg" alt="Delete">
                    </button>
                </form>
            </div>

        </div>
    <?php } ?>
</div>

<!-- Form for creating/editing an article -->
<div class="form-container">
    <div class="create-form-label-container">
        <h4 id="form-label">Create News</h4>
        <button class="article-button" style="display: none;background: none; border: none;" id="form-cancel"
            onclick="returnToCreateMode()">
            <img src="./views/assets/close.svg" alt="Cancel">
        </button>

    </div>
    <form id="form" method="POST" action="index.php">
        <div class="form-group">
            <input class="text-form-field" type="hidden" id="article-id" name="article-id" value="" />
        </div>
        <div class="form-group">
            <input class="text-form-field" type="text" id="title" name="title" placeholder="Title" required /><br>
        </div>
        <div class="form-group">
            <textarea class="text-form-field" id="description" name="description" placeholder="Description"
                required></textarea>
        </div><br>
        <button class="button form-group" type="submit" id="form-submit" name="create-article">Create</button>

    </form>
    <a class="button form-group" href="index.php?logout=true">Logout</a>
</div>