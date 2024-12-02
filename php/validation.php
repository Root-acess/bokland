<?php
function is_empty($var, $text, $location, $ms, $data) {
    if (empty($var)) {
        $em = "The " . htmlspecialchars($text) . " is required";
        $query = http_build_query([$ms => $em]) . '&' . $data;
        header("Location: $location?$query");
        exit;
    }
    return false;
}
