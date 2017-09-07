<div class="col-12">
    <form method="post" action="<?= $this->url("comments/add") ?>">
        <fieldset>
            <legend class="strong">Lägg till ny kommentar</legend>
            <div class="field-group">
                <label for="email">E-post</label>
                <input class="field" type="text" id="email" name="email" required>
            </div>
            <div class="field-group">
                <label for="comment">Kommentar</label>
                <textarea class="field" id="comment" rows="5" name="comment" required></textarea>
            </div>
            <input type="submit" value="Kommentera" class="button">
        </fieldset>
    </form>
</div>
