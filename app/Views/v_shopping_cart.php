<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nama Barang</th>
                                <th>Jumlah Beli</th>
                                <th>Harga</th>
                                <th>Sub Total</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $countItem = 0 ?>
                            <?php $totalPrice = 0 ?>
                            <?php foreach ($cart as $item): ?>
                                <tr>
                                    <td></td>
                                    <td>
                                        <?= isset($item['nama']) ? $item['nama'] : '' ?>
                                    </td>
                                    <td>
                                        <?= $item['jumlah'] ?>
                                    </td>
                                    <td>Rp
                                        <?= isset($item['harga']) ? number_format($item['harga'], 2, ',', '.') : '' ?>
                                    </td>
                                    <td>Rp
                                        <?= number_format($item['subtotal'], 2, ',', '.') ?>
                                    </td>
                                    <td>
                                        <a href="/delete/<?= $countItem ?>" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                                <?php $totalPrice = $totalPrice + $item['subtotal']; ?>
                                <?php $countItem = $countItem + 1; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <center>
                            <h5 class="card-title">Transaksi Barang</h5>
                        </center>
                        <h6 class="card-subtitle mb-2 text-muted">Total Produk</h6>
                        <p class="card-text">
                            <?= $countItem ?> Produk
                        </p>
                        <h6 class="card-subtitle mb-2 text-muted">Total Harga</h6>
                        <p class="card-text">Rp
                            <?= number_format($totalPrice, 2, ',', '.') ?>
                        </p>
                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                            data-bs-target="#exampleModalCenter">Pesan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Proses Checkout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-toggle="modal"
                        data-bs-target="#cartModal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/checkout" method="post">
                        <div class="form-group py-2">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" placeholder="Nama" name="nama" id="">
                        </div>
                        <div class="form-group py-2">
                            <label for="no_telp">Nomor Telepon:</label>
                            <input type="text" class="form-control" placeholder="Nomor Telepon" name="no_telp" id="">
                        </div>
                        <div class="form-group py-2">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" placeholder="Alamat" name="alamat" id="">
                        </div>
                        <div class="form-group py-2">
                            <label for="kode_pos">Kode Pos</label>
                            <input type="text" class="form-control" placeholder="Kode Pos" name="kode_pos" id="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                data-bs-toggle="modal" data-bs-target="#cartModal">Close</button>
                            <button type="submit" class="btn btn-outline-success"><i
                                    class="fa-solid fa-cart-shopping"></i> Checkout</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>

<style>
    /* Media queries */
    @media (min-width: 576px) {
        .table-responsive {
            overflow-x: auto;
        }
    }

    @media (min-width: 992px) {
        .card-deck .card {
            flex: 1 0 0;
        }
    }
</style>

<?= $this->endSection(); ?>