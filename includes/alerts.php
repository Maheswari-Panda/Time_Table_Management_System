<?php
session_start();

// Handle Add Faculty Alert
if (isset($_SESSION['status_add']) && $_SESSION['status_add'] != ''):
?>
    <div class="alert alert-<?php echo ($_SESSION['status_code_add'] == 'success') ? 'success' : 'warning'; ?> alert-dismissible fade show" role="alert">
        <strong><?php echo ($_SESSION['status_code_add'] == 'success') ? 'SUCCESS!' : 'ERROR!'; ?></strong>
        <?php echo $_SESSION['status_add']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <script>
    // Delay redirect for 5 seconds after showing the alert
    setTimeout(function() {
        window.location.href = 'faculty-details.php';
    }, 5000);  // 5000 milliseconds = 5 seconds
</script>

<?php
    // Clear the session after displaying the message
    unset($_SESSION['status_add']);
    unset($_SESSION['status_code_add']);
endif;

// Handle Edit Faculty Alert
if (isset($_SESSION['status_edit']) && $_SESSION['status_edit'] != ''):
?>
    <div class="alert alert-<?php echo ($_SESSION['status_code_edit'] == 'success') ? 'success' : 'warning'; ?> alert-dismissible fade show" role="alert">
        <strong><?php echo ($_SESSION['status_code_edit'] == 'success') ? 'SUCCESS!' : 'ERROR!'; ?></strong>
        <?php echo $_SESSION['status_edit']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <script>
    // Delay redirect for 5 seconds after showing the alert
    setTimeout(function() {
        window.location.href = 'faculty-details.php';
    }, 5000);  // 5000 milliseconds = 5 seconds
</script>
<?php
    unset($_SESSION['status_edit']);
    unset($_SESSION['status_code_edit']);
endif;

// Handle Delete Faculty Alert
if (isset($_SESSION['status_delete']) && $_SESSION['status_delete'] != ''):
?>
    <div class="alert alert-<?php echo ($_SESSION['status_code_delete'] == 'success') ? 'success' : 'warning'; ?> alert-dismissible fade show" role="alert">
        <strong><?php echo ($_SESSION['status_code_delete'] == 'success') ? 'SUCCESS!' : 'ERROR!'; ?></strong>
        <?php echo $_SESSION['status_delete']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <script>
    // Delay redirect for 5 seconds after showing the alert
    setTimeout(function() {
        window.location.href = 'faculty-details.php';
    }, 5000);  // 5000 milliseconds = 5 seconds
</script>
<?php
    unset($_SESSION['status_delete']);
    unset($_SESSION['status_code_delete']);
endif;
?>
