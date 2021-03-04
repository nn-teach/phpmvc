<?php
if (isset($this->data['errors'])) {
?>

<div class="callout primary">
  <div class="row column text-center">
    <p class="error">Une erreur s'est produite.</p>
  </div>
</div>

<?php
}
?>

<?php
include 'contact-form.php'; 
?>
