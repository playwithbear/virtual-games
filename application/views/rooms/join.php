<div class="container">
    <section>
        <?php echo form_open('rooms/join'); ?>
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <h1><?= $title; ?></h1>

                    <div class="form-group">
                        <label for="room-code">Room Code:</label>
                        <input type="text" class="form-control" name="room-code" id="room-code" pattern="[A-Za-z]{4}" value="<?= isset($post['room-code']) ? $post['room-code'] : '' ; ?>" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="display-name">Your Display Name*:</label>
                        <input type="text" class="form-control" name="display-name" id="display-name"   value="<?= isset($post['display-name']) ? $post['display-name'] : '' ; ?>" pattern="[A-Za-z]{,20}" required>
                        <small>*Max 10 characters</small>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Join Game">

                    <div class="error">
                        <p><?= isset($error) ? $error : ''; ?></p>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>
