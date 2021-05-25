<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Inventaris</h4>
                <p class="card-title-desc">Tambah Barang</p>

                <form action="<?=base_url('inventaris/input')?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="jenis" class="col-md-2 col-form-label">Jenis</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="" name="jenis" id="jenis" placeholder="Jenis Barang..." required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="merk" class="col-md-2 col-form-label">Merk</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="" name="merk" id="merk" placeholder="Merk Barang..." required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nomor" class="col-md-2 col-form-label">Nomor</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="" name="nomor" id="nomor" placeholder="Nomor Barang...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kode" class="col-md-2 col-form-label">Kode</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="" name="kode" id="kode" placeholder="Kode Barang..." required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kondisi" class="col-md-2 col-form-label">Kondisi</label>
                        <div class="col-md-10">
                            <select id="kondisi" class="form-control" name="kondisi" required>
                                <option value="">-PILIH-</option>
                                <option value="BAIK">BAIK</option>
                                <option value="RUSAK">RUSAK</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan" class="col-md-2 col-form-label">Keterangan</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="" name="keterangan" id="keterangan" placeholder="Keterangan Barang...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lokasi" class="col-md-2 col-form-label">Lokasi</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="" name="lokasi" id="lokasi" placeholder="Lokasi Barang..." required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="submit" value="Input Barang" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
<?php
if(!empty($this->session->flashdata('error'))):
    $error = $this->session->flashdata('error')['error'];
?>

$(document).ready(function() {
    Swal.fire(
        'Failed',
        '<?= $error ?>',
        'error'
    );
});

<?php
endif;
?>
</script>
