<?php
class manageadminController {
    public function index() {
        // Try this absolute path first
        $viewPath = __DIR__ . '/../views/manage-admin.php';
        
        // Debug: Check if file exists
        if (file_exists($viewPath)) {
            include $viewPath;
        } else {
            // Show error with the exact path being searched
            die("File not found. Looking for: " . $viewPath . 
                "<br>Current directory: " . __DIR__);
        }
    }
}