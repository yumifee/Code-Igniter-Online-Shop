<?php echo $this->extend('layouts/app'); ?>

<?php echo $this->section('content'); ?>

<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Handmade Crochet</h1>
            <p class="lead fw-normal text-white-50 mb-0">Made with luph</p>
        </div>
    </div>
</header>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php foreach ($products as $product): ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <img class="card-img-top" src="<?php echo base_url('images/' . $product->file) ?>" alt="..." />
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bolder text-center">
                                    <?php echo $product->name ?>
                                </h5>
                                Rp.
                                <?= number_format($product->price) ?>
                            </div>
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <a class="btn btn-outline-dark mt-auto" data-toggle="modal"
                                    data-target="#myModal<?= $product->id ?>">
                                    View Details
                                </a>

                                <a class="btn btn-outline-dark btn-buy" data-id="<?= $product->id ?>"
                                    href="/addto/<?= $product->id; ?>">
                                    <i class="bi bi-cart-plus"></i>
                                </a>

                            </div>

                        </div>

                    </div>
                </div>
                <div class="modal fade" id="myModal<?= $product->id ?>">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <?php echo $product->name ?>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">

                                <img class="card-img-top img-small mx-auto d-block"
                                    src="<?php echo base_url('images/' . $product->file) ?>" alt="..."
                                    style="width:40%; object-fit: cover; margin-left:auto; margin-right:auto" />


                                <div class="text-center">
                                    <h5>
                                        <br>
                                        <?php echo $product->desc ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a class="btn btn-success btn-buy" data-id="<?php echo $product->id ?>">Buy!</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>

</section>

<script src="<?php echo base_url('js/custom.js'); ?>"></script>

<?php echo $this->endSection(); ?>