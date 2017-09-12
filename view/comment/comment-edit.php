<div class="col-12">
    <form method="post" action="<?= $this->url("comments/update/{$comment["id"]}") ?>">
        <fieldset>
            <legend class="strong">Redigera kommentar #<?= $comment["id"] + 1 ?></legend>
            <div class="field-group">
                <label for="email">E-post</label>
                <input class="field" type="email" id="email" name="email" required value="<?= htmlentities($comment["email"]) ?>">
            </div>
            <div class="field-group">
                <label for="comment">Kommentar</label>
                <textarea class="field" id="comment" name="comment" rows="10" required><?= htmlentities($comment["text"]) ?></textarea>
            </div>
            <input type="submit" value="Uppdatera" class="button">
            <a class="button" href="<?= $this->url("comments/delete/" . $comment["id"]) ?> ">Ta bort kommentar</a>
        </fieldset>
    </form>
</div>
