<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Inventaris</h4>
                <p class="card-title-desc">Detail Barang</p>
                <table class="table">
                        <tr>
                            <th>Jenis</th>
                            <td><?=$barang->jenis?></td>
                        </tr>
                        <tr>
                            <th>Merk</th>
                            <td><?=$barang->merk?></td>
                        </tr>
                        <tr>
                            <th>Nomor</th>
                            <td><?=$barang->nomor?></td>
                        </tr>
                        <tr>
                            <th>Kode</th>
                            <td><?=$barang->kode?></td>
                        </tr>
                        <tr>
                            <th>Kondisi</th>
                            <td><?=$barang->kondisi?></td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td><?=$barang->keterangan?></td>
                        </tr>
                </table>
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
