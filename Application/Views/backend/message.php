<?php
if (isset($this->data['message'])) {
?>
  <div class="callout primary">
    <div class="row column text-center">
      <p class="success"><?php echo $this->data['message'] ?><br/>
      </p>
      
    </div>
  </div>
<?php } ?>
