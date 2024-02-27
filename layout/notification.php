<?php
 if (isset($_SESSION['flash_message'])) {
        echo '<div class="alert alert-success mt-1">' . $_SESSION['flash_message'] . '</div>';

        unset($_SESSION['flash_message']);
    }