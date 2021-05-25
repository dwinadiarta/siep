<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Profile</h4>
                <p class="card-title-desc">Ubah profile</p>

                <form action="<?=base_url('profile/input')?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label">Email</label>
                        <div class="col-md-10">
                            <input class="form-control" type="email" value="<?= $user->email ?>" id="email" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-md-2 col-form-label">Username</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="<?= $user->username ?>" id="username" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-2 col-form-label">Password</label>
                        <div class="col-md-10">
                            <input class="form-control" type="password" value="" placeholder="Isi untuk mengganti password.." name="password" id="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="full_name" class="col-md-2 col-form-label">Fullname</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value="<?= $user->full_name ?>" name="full_name" id="full_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-md-2 col-form-label">Phone</label>
                        <div class="col-md-10">
                            <input class="form-control" type="number" value="<?= $user->phone ?>" name="phone" id="phone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="photo" class="col-md-2 col-form-label">Photo</label>
                        <div class="col-md-10">
                            <input class="form-control-file" type="file" name="photo" accept="image/*" id="photo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="submit" value="Ubah profile" class="btn btn-success">
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
