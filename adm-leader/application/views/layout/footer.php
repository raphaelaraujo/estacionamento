</div>
<script src="<?php echo base_url('public/src/js/vendor/jquery-3.3.1.min.js'); ?>"></script>
<script src="<?php echo base_url('public/plugins/popper.js/dist/umd/popper.min.js'); ?>"></script>
<script src="<?php echo base_url('public/plugins/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('public/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js'); ?>"></script>
<script src="<?php echo base_url('public/plugins/screenfull/dist/screenfull.js'); ?>"></script>
<script src="<?php echo base_url('public/dist/js/theme.min.js'); ?>"></script>=
<?php if (isset($scripts)) : ?>
    <?php foreach ($scripts as $script) : ?>
        <script src="<?php echo base_url('public/' . $script); ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>
</body>

</html>