<?php
use App\Models\ActivityLogModel;
if (!function_exists('log_activity')) {
    function log_activity($action, $description)
    {
        $logModel = new ActivityLogModel();
        $user_id = (function_exists('user') && user()) ? user()->id : 0;
        $logModel->insert([
            'user_id' => $user_id,
            'action' => $action,
            'description' => $description,
            ]);
    }
}