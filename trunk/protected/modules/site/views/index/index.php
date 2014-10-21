<?php $this->renderPartial('/elements/main_top_content'); ?>
<!-- Main Body -->
<div class="container">
<!-- Main Left side -->
<?php $this->renderPartial('/elements/main_left_content'); ?>
<!-- sidebar right -->
<?php $this->renderPartial('/elements/sidebar_right'); ?>
</div>
<div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            ...
        </div>
    </div>
</div>
<script>
   $(".guestbook-click").click(function(){
       $('#myModal').modal('show');
       $('#myModal').html();
    });
</script>
<style>
    .guestbook-click{
        cursor: pointer !important;
    }
</style>