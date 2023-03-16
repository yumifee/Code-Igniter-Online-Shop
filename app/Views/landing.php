<?php echo $this->extend('layouts/app'); ?>

<?php echo $this->section('content'); ?>
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php foreach($Product as $P): ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <img class="card-img-top" src="<?php echo base_url('images/' . $P['file']) ?>" alt="..." />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder"><?php echo $P['name'] ?></h5>
                                    Rp.<?= number_format($P['price']) ?>
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php echo $this->endSection(); ?>