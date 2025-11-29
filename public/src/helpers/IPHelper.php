<?php

class IPHelper {
    public static function validateIP($ip) {
        return filter_var($ip, FILTER_VALIDATE_IP) !== false;
    }

    public static function formatIP($ip) {
        return strtolower(trim($ip));
    }
}