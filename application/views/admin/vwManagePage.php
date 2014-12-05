<?php // echo @$js_header;  ?> 
<?php //if (isset($content)) { echo $content; }  ?> 
<?php // echo @$js_footer; ?>


<?php $this->load->view('admin/vwHeader');?>
<div id="page-wrapper">
<?php if (isset($content)) { echo $content; }  ?> 
</div>
<?php $this->load->view('admin/vwFooter'); ?>

