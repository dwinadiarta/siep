<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="float-right ml-2">
                    <a href="<?=base_url('inventaris/tambah')?>" class="btn btn-info">
                        Tambah User 
                    </a>
                </div>
                <h5 class="header-title mb-4">Inventaris</h5>
                <div class="table-responsive">
                    <table id="tabel_inventaris" class="table table-centered table-hover mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Jenis</th>
                                <th scope="col">Merk</th>
                                <th scope="col">Nomor</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Kondisi</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Lokasi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($barang as $b): ?>
                            <tr>
                                <td><?=$b->jenis?></td>
                                <td><?=$b->merk?></td>
                                <td><?=$b->nomor?></td>
                                <td><?=$b->kode?></td>
                                <td><?=$b->kondisi?></td>
                                <td><?=$b->keterangan?></td>
                                <td><?=$b->lokasi?></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="<?=base_url('inventaris/lihat').'/'.$b->id?>" type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="View">
                                            <i class="mdi mdi-eye"></i>
                                        </a>
                                        <a href="<?=base_url('inventaris/ubah').'/'.$b->id?>" type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="mdi mdi-pencil"></i>
                                        </a>
                                        <a href="<?=base_url('inventaris/hapus').'/'.$b->id?>" type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="mdi mdi-trash-can"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#tabel_inventaris').DataTable();
});
</script>
