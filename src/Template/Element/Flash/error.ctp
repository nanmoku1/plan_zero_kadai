<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<?php /*<div class="message error" onclick="this.classList.add('hidden');"><?= $message ?></div>*/ ?>
<?= $message ?>
