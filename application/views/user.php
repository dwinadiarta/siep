<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="float-right ml-2">
                    <a href="<?=base_url('user_management/tambah')?>" class="btn btn-info">
                        Tambah User
                    </a>
                </div>
                <h5 class="header-title mb-4">User Management</h5>
                <div class="table-responsive">
                    <table id="tabel_user" class="table table-centered table-hover mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Role</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($user as $u): ?>
                            <tr>
                                <td><?=$u->username?></td>
                                <td><?=$u->email?></td>
                                <td><?=$u->full_name?></td>
                                <td><?=$u->phone?></td>
                                <td><?=$u->role?></td>
                                <td><img src="<?=base_url("uploads/$u->photo")?>" width="100px"></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="<?=base_url('user_management/lihat').'/'.$u->id?>" type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="View">
                                            <i class="mdi mdi-eye"></i>
                                        </a>
                                        <a href="<?=base_url('user_management/ubah').'/'.$u->id?>" type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="mdi mdi-pencil"></i>
                                        </a>
                                        <a href="<?=base_url('user_management/hapus').'/'.$u->id?>" type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">
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
    $('#tabel_user').DataTable();
});
</script>
