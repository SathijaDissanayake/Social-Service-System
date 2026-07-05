<?php
function statusBadge($status) {
    $class = 'app-badge-pending';
    if ($status === 'Approved') $class = 'app-badge-approved';
    if ($status === 'Rejected') $class = 'app-badge-rejected';
    return '<span class="app-badge ' . $class . '">' . htmlspecialchars($status) . '</span>';
}
?>
