<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="float-right ml-2">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambahDivisi">
                        Tambah Divisi
                    </button>
                    <div id="tambahDivisi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0">Tambah Divisi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('divisi/tambah'); ?>" method="POST">
                                        <div class="form-group row">
                                            <label for="nama" class="col-md-3 col-form-label">Nama</label>
                                            <div class="col-md-9">
                                                <input id="nama" type="text" name="nama" class="form-control" placeholder="Nama Divisi" required>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary waves-effect waves-light" value="Tambah">
                                        <input class="btn btn-secondary waves-effect waves-light" type="reset" value="Batal">
                                    </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>
                <h5 class="header-title mb-4">Data Divisi</h5>
                <div class="table-responsive">
                    <table id="tabel_inventaris" class="table table-centered table-hover mb-0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($divisi as $d) : ?>
                                <tr>
                                    <td><?= $d->id ?></td>
                                    <td><?= $d->nama ?></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="<?= base_url('divisi/hapus') . '/' . $d->id ?>" type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="mdi mdi-trash-can"></i>
                                            </a>
                                            <button data-toggle="modal" data-target="#editDivisi-<?=$d->id?>" type="button" class="btn btn-outline-secondary btn-sm">
                                                <i class="mdi mdi-pencil"></i>
                                            </button>
                                            <div id="editDivisi-<?=$d->id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mt-0">Edit Ruang</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?= base_url('divisi/edit').'/'.$d->id; ?>" method="POST">
                                                                <div class="form-group row">
                                                                    <label for="nama" class="col-md-3 col-form-label">Nama</label>
                                                                    <div class="col-md-9">
                                                                        <input id="nama" type="text" name="nama" class="form-control" placeholder="Nama Divisi" value="<?=$d->nama?>" required>
                                                                    </div>
                                                                </div>
                                                                <input class="btn btn-primary waves-effect waves-light" type="submit" value="Edit">
                                                            </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div>
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
