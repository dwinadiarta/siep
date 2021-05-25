<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="float-right ml-2">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambahBarang">
                        Tambah Barang
                    </button>
                    <div id="tambahBarang" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0" id="myModalLabel">Tambah Barang</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('data/tambah'); ?>" method="POST">
                                        <div class="form-group row">
                                            <label for="no_inventaris" class="col-md-3 col-form-label">No Inventaris</label>
                                            <div class="col-md-9">
                                                <input id="no_inventaris" type="text" name="no_inventaris" class="form-control" placeholder="No Inventaris" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jenis" class="col-md-3 col-form-label">Jenis</label>
                                            <div class="col-md-9">
                                                <input id="jenis" type="text" name="jenis" class="form-control" placeholder="Jenis" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="merek" class="col-md-3 col-form-label">Nama/Merk</label>
                                            <div class="col-md-9">
                                                <input id="merek_id" type="text" name="merek" class="form-control" placeholder="Nama/Merk" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="divisi_id" class="col-md-3 col-form-label">Divisi</label>
                                            <div class="col-md-9">
                                                <select name="divisi_id" id="divisi_id" class="form-control">
                                                    <?php foreach ($divisi as $d) : ?>
                                                        <option value="<?= $d->id ?>"><?= $d->nama ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ruang_id" class="col-md-3 col-form-label">Ruang</label>
                                            <div class="col-md-9">
                                                <select name="ruang_id" id="ruang_id" class="form-control">
                                                    <?php foreach ($ruang as $r) : ?>
                                                        <option value="<?= $r->id ?>"><?= $r->nama ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="keterangan" class="col-md-3 col-form-label">Keterangan</label>
                                            <div class="col-md-9">
                                                <input id="keterangan" type="text" name="keterangan" class="form-control" placeholder="Keterangan" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kondisi" class="col-md-3 col-form-label">Kondisi</label>
                                            <div class="col-md-9">
                                                <input name="kondisi" type="range" onchange="tampilangka()" class="form-control-range" id="kondisi">
                                                <span id="nilai_kondisi">50% Baik</span>
                                                <script>
                                                    function tampilangka() {
                                                        let nilai = $('#kondisi').val();
                                                        $('#nilai_kondisi').text(nilai + "% Baik");
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary waves-effect waves-light" value="Tambah">
                                        <input class="btn btn-secondary waves-effect waves-light" type="reset" value="Clear">
                                    </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>
                <h5 class="header-title mb-4">Data Barang</h5>
                <div class="table-responsive">
                    <table id="tabel_inventaris" class="table table-centered table-hover mb-0">
                        <thead>
                            <tr>
                                <th scope="col">No Inventaris</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Nama/Merk</th>
                                <th scope="col">Divisi</th>
                                <th scope="col">Ruang</th>
                                <th scope="col">Kondisi</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $d) : ?>
                                <tr>
                                    <td><?= $d->no_inventaris ?></td>
                                    <td><?= $d->jenis ?></td>
                                    <td><?= $d->merek ?></td>
                                    <td><?= $this->db->get_where('divisi', array('id' => $d->divisi_id))->result()[0]->nama ?></td>
                                    <td><?= $this->db->get_where('ruang', array('id' => $d->ruang_id))->result()[0]->nama ?></td>
                                    <td><?= $d->kondisi ?> %</td>
                                    <td><?= $d->keterangan ?></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="<?= base_url('data/hapus') . '/' . $d->id ?>" type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="mdi mdi-trash-can"></i>
                                            </a>
                                            <button data-toggle="modal" data-target="#editBarang-<?=$d->id?>" type="button" class="btn btn-outline-secondary btn-sm">
                                                <i class="mdi mdi-pencil"></i>
                                            </button>
                                            <div id="editBarang-<?=$d->id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mt-0" id="myModalLabel">Edit Barang</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?= base_url('data/edit').'/'.$d->id; ?>" method="POST">
                                                                <div class="form-group row">
                                                                    <label for="no_inventaris" class="col-md-3 col-form-label">No Inventaris</label>
                                                                    <div class="col-md-9">
                                                                        <input value="<?=$d->no_inventaris?>" id="no_inventaris" type="text" name="no_inventaris" class="form-control" placeholder="No Inventaris" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="jenis" class="col-md-3 col-form-label">Jenis</label>
                                                                    <div class="col-md-9">
                                                                        <input value="<?=$d->jenis?>" id="jenis" type="text" name="jenis" class="form-control" placeholder="Nama" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="merek" class="col-md-3 col-form-label">Nama/Merk</label>
                                                                    <div class="col-md-9">
                                                                        <input value="<?=$d->merek?>" id="merek_id" type="text" name="merek" class="form-control" placeholder="Merk" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="divisi_id" class="col-md-3 col-form-label">Divisi</label>
                                                                    <div class="col-md-9">
                                                                        <select name="divisi_id" id="divisi_id" class="form-control">
                                                                            <?php foreach ($divisi as $div) : ?>
                                                                            <?php if ($d->divisi_id == $d->id): ?>
                                                                            <option value="<?= $div->id ?>" selected><?= $div->nama ?></option>
                                                                            <?php else: ?>
                                                                            <option value="<?= $div->id ?>"><?= $div->nama ?></option>
                                                                            <?php endif; ?>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="ruang_id" class="col-md-3 col-form-label">Ruang</label>
                                                                    <div class="col-md-9">
                                                                        <select name="ruang_id" id="ruang_id" class="form-control">
                                                                            <?php foreach ($ruang as $r) : ?>
                                                                            <?php if ($d->ruang_id == $r->id): ?>
                                                                            <option value="<?= $r->id ?>" selected><?= $r->nama ?></option>
                                                                            <?php else: ?>
                                                                            <option value="<?= $r->id ?>"><?= $r->nama ?></option>
                                                                            <?php endif; ?>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="keterangan" class="col-md-3 col-form-label">Keterangan</label>
                                                                    <div class="col-md-9">
                                                                        <input value="<?=$d->keterangan?>" id="keterangan" type="text" name="keterangan" class="form-control" placeholder="Keterangan" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="kondisi" class="col-md-3 col-form-label">Kondisi</label>
                                                                    <div class="col-md-9">
                                                                        <input value="<?=$d->kondisi?>" name="kondisi" type="range" onchange="tampilangka()" class="form-control-range" id="kondisi">
                                                                        <span id="nilai_kondisi">50% Baik</span>
<script>
function tampilangka() {
    let nilai = $('#kondisi').val();
    $('#nilai_kondisi').text(nilai + "% Baik");
}
</script>
                                                                    </div>
                                                                </div>
                                                                <input type="submit" class="btn btn-primary waves-effect waves-light" value="Tambah">
                                                                <input class="btn btn-secondary waves-effect waves-light" type="reset" value="Batal">
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
