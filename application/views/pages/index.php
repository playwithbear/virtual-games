<div class="container">

    <h1><?= $title; ?></h1>

    <section>
        <?php for ($row = 1; $row <= $gallery_data['row_count']; $row++) : ?>

            <div class="card-deck">

            <?php for ($card = 1; $card <= 3; $card++) : ?>

                <?php $key = (($row-1)*3)+($card-1); ?>
            
                <?php if (array_key_exists($key, $library)) : ?>
                
                    <div class="card">
                        <img class="card-img-top" src="<?= base_url() . 'assets/img/thumbnails/' . $library[$key]['thumbnail']; ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= $library[$key]['name']; ?></h5>
                            <p class="card-text"><?= $library[$key]['description']; ?></p>
                            <a href="<?= base_url() . 'create/' . $library[$key]['id']; ?>" class="btn btn-primary">Create Game</a>
                        </div>
                    </div>

                <?php else : ?>

                    <div class="card"></div>

                <?php endif; ?>
                
            <?php endfor; ?>

            </div>

        <?php endfor; ?>

    </section>

</div>
