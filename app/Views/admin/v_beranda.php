<?= $this->extend('template/template-backend') ?>

<?= $this->section('content') ?>

<!-- flashdata sweetalert -->
<div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan') ?>"></div>


<div class="col-md-12">
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">
                <strong>Beranda</strong>
            </h3>
        </div>
        <?= form_open('admin/saveBeranda') ?>
        <div class="card-body">
            <div class="form-group">
                <textarea id="summernote" cols="10" class="form-control" name="beranda"><?= $beranda['beranda'] ?></textarea>
            </div>

        </div>
        <div class="card-footer">
            <div class="form-group">
                <button type="submit" class="btn bg-lightblue btn-flat"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <?= form_close() ?>
    </div>
</div>

<script>
    $(function() {
        // Summernote
        $('#summernote').summernote()

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
</script>

<?= $this->endSection() ?>