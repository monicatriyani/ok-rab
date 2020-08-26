<div class="startpage mt-5">
    <img src="<?= base_url('assets/img/bgapp.png') ?>" class="backgroundstartpage">
    <div class="centered">
        <div><?= $this->session->flashdata('message'); ?></div>
        <p class="judulaplikasi">Selamat Datang!<br><strong><?= $user['nama_user']; ?> (<?= $user['nip']; ?>)</strong></p>
    </div>
</div>