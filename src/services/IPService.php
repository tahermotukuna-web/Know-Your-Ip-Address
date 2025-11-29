<?php

class IPService {
    public function fetchIP() {
        $ip = null;

        // Helpers to test IPs
        $isPublicIP = function($candidate) {
            return filter_var($candidate, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false;
        };
        $isAnyIP = function($candidate) {
            return filter_var($candidate, FILTER_VALIDATE_IP) !== false;
        };

        // 1) Check Cloudflare connecting IP header (explicit)
        if (!empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
            $candidate = trim($_SERVER['HTTP_CF_CONNECTING_IP']);
            if ($isAnyIP($candidate)) {
                $ip = $candidate;
            }
        }

        // 2) Check X-Real-IP header
        if (empty($ip) && !empty($_SERVER['HTTP_X_REAL_IP'])) {
            $candidate = trim($_SERVER['HTTP_X_REAL_IP']);
            if ($isAnyIP($candidate)) $ip = $candidate;
        }

        // 3) Check X-Forwarded-For header (may contain comma-separated list)
        if (empty($ip) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // Split and prefer the first *public* IP; fallback to first private one if no public
            $list = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $privateCandidate = null;
            foreach ($list as $entry) {
                $candidate = trim($entry);
                if ($isPublicIP($candidate)) {
                    $ip = $candidate;
                    break;
                }
                if ($privateCandidate === null && $isAnyIP($candidate)) {
                    $privateCandidate = $candidate;
                }
            }
            if (empty($ip) && !empty($privateCandidate)) {
                $ip = $privateCandidate;
            }
        }

        // 4) Check HTTP_CLIENT_IP
        if (empty($ip) && !empty($_SERVER['HTTP_CLIENT_IP'])) {
            $candidate = trim($_SERVER['HTTP_CLIENT_IP']);
            if ($isAnyIP($candidate)) $ip = $candidate;
        }

        

        // 5) REMOTE_ADDR as fallback
        if (empty($ip) && !empty($_SERVER['REMOTE_ADDR'])) {
            $candidate = trim($_SERVER['REMOTE_ADDR']);
            if ($isAnyIP($candidate)) $ip = $candidate;
        }

        // 6) If still empty or it's a loopback IP (localhost), attempt to fetch the server's public IP via ipify as a fallback for local testing only
        if (empty($ip) || in_array($ip, ['127.0.0.1', '::1'])) {
            // Try an external service for public IP (only if allow_url_fopen enabled)
            $publicIp = null;
            $api = 'https://api.ipify.org?format=json';
            try {
                // Use file_get_contents if allowed
                if (ini_get('allow_url_fopen')) {
                    $json = @file_get_contents($api);
                    if ($json) {
                        $data = json_decode($json, true);
                        if (!empty($data['ip']) && $isAnyIP($data['ip'])) {
                            $publicIp = $data['ip'];
                        }
                    }
                } else {
                    // Try CURL as a fallback
                    if (function_exists('curl_version')) {
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $api);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
                        $json = @curl_exec($ch);
                        if ($json) {
                            $data = json_decode($json, true);
                            if (!empty($data['ip']) && $isAnyIP($data['ip'])) {
                                $publicIp = $data['ip'];
                            }
                        }
                        curl_close($ch);
                    }
                }
            } catch (Exception $e) {
                // Ignore, fallback to previous or DEFAULT_IP
            }
            if (!empty($publicIp)) {
                $ip = $publicIp;
            }
        }

        // Final fallback
        if (empty($ip)) {
            $ip = defined('DEFAULT_IP') ? DEFAULT_IP : '0.0.0.0';
        }

        return $ip;
    }
}
