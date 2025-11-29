<?php
require_once 'src/controllers/IPController.php';
require_once 'src/services/IPService.php';
require_once 'src/helpers/IPHelper.php';

$controller = new IPController();
$ipAddress = $controller->getIP();
$rawXForwardedFor = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? '';
$isValid = IPHelper::validateIP($ipAddress);
$formattedIP = IPHelper::formatIP($ipAddress);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Primary Meta Tags -->
    <title>Know Your IP Address - Find Your Public IP Online</title>
    <meta name="title" content="Know Your IP Address - Find Your Public IP Address Online">
    <meta name="description" content="Instantly find your public IP address with our free online tool. Get detailed information about your IPv4/IPv6, connection type, and location. Simple, fast, and secure.">
    <meta name="keywords" content="IP address, public IP, my IP, what is my IP address, IPv4, IPv6, IP checker, find IP, IP lookup, IP information, internet protocol">
    <meta name="author" content="Know Your IP Address">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="language" content="en-US">
    <meta name="revisit-after" content="7 days">
    <meta name="rating" content="General">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://knowyourip.com/">
    <meta property="og:title" content="Know Your IP Address - Find Your Public IP Online">
    <meta property="og:description" content="Instantly find your public IP address with our free online tool. Get detailed information about your IPv4/IPv6, connection type, and more.">
    <meta property="og:image" content="https://knowyourip.com/og-image.png">
    <meta property="og:site_name" content="Know Your IP Address">
    <meta property="og:locale" content="en_US">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://knowyourip.com/">
    <meta property="twitter:title" content="Know Your IP Address - Find Your Public IP Online">
    <meta property="twitter:description" content="Instantly find your public IP address with our free online tool. Get detailed information about your IPv4/IPv6, connection type, and more.">
    <meta property="twitter:image" content="https://knowyourip.com/twitter-image.png">
    <meta property="twitter:creator" content="@knowyourip">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="https://knowyourip.com/">
    
    <!-- Alternate Links -->
    <link rel="alternate" hreflang="en" href="https://knowyourip.com/">
    <link rel="alternate" hreflang="x-default" href="https://knowyourip.com/">
    
    <!-- Additional Meta Tags -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Know Your IP">
    <meta name="msapplication-TileColor" content="#667eea">
    <meta name="theme-color" content="#667eea">
    <meta name="color-scheme" content="light dark">
    
    <!-- Preconnect to External Resources -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://cdn.example.com">
    
    <title>Know Your IP Address</title>
    <link rel="stylesheet" href="public/css/style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 60px 40px;
            max-width: 600px;
            width: 100%;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header h1 {
            font-size: 2.5em;
            color: #333;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .header p {
            font-size: 1.1em;
            color: #666;
            line-height: 1.6;
        }

        .info-section {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            border-left: 5px solid #667eea;
        }

        .info-label {
            font-size: 0.9em;
            color: #999;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .info-value {
            font-size: 2em;
            color: #333;
            font-weight: 700;
            font-family: 'Courier New', monospace;
            word-break: break-all;
        }

        .details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 30px;
        }

        .detail-item {
            background: white;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            border: 2px solid #f0f0f0;
            transition: all 0.3s ease;
        }

        .detail-item:hover {
            border-color: #667eea;
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.15);
        }

        .detail-label {
            font-size: 0.85em;
            color: #999;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .detail-value {
            font-size: 1.3em;
            color: #333;
            font-weight: 700;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85em;
            font-weight: 600;
            margin-top: 15px;
        }

        .status-valid {
            background: #d4edda;
            color: #155724;
        }

        .status-invalid {
            background: #f8d7da;
            color: #721c24;
        }

        .features {
            margin-top: 40px;
            padding-top: 30px;
            border-top: 2px solid #f0f0f0;
        }

        .features h3 {
            font-size: 1.2em;
            color: #333;
            margin-bottom: 20px;
        }

        .feature-list {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            color: #666;
            font-size: 0.95em;
        }

        .feature-item::before {
            content: "✓";
            display: inline-block;
            width: 24px;
            height: 24px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 50%;
            text-align: center;
            line-height: 24px;
            margin-right: 10px;
            font-weight: bold;
            flex-shrink: 0;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #999;
            font-size: 0.9em;
        }

        .copy-button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 0.9em;
            cursor: pointer;
            margin-top: 15px;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .copy-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .copy-button:active {
            transform: translateY(0);
        }

        @media (max-width: 600px) {
            .container {
                padding: 40px 20px;
            }

            .header h1 {
                font-size: 2em;
            }

            .info-value {
                font-size: 1.5em;
            }

            .details-grid {
                grid-template-columns: 1fr;
            }

            .feature-list {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🌐 Know Your IP Address</h1>
            <p>Your unique identifier on the internet</p>
        </div>

        <div class="info-section">
            <div class="info-label">Your Public IP Address</div>
            <div class="info-value"><?php echo htmlspecialchars($formattedIP); ?></div>
            <span class="status-badge <?php echo $isValid ? 'status-valid' : 'status-invalid'; ?>">
                <?php echo $isValid ? '✓ Valid IP' : '✗ Invalid IP'; ?>
            </span>
            <button class="copy-button" onclick="copyToClipboard('<?php echo htmlspecialchars($formattedIP); ?>')">
                📋 Copy IP Address
            </button>
        </div>

        <div class="details-grid">
            <div class="detail-item">
                <div class="detail-label">IP Type</div>
                <div class="detail-value">
                    <?php 
                    if (filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
                        echo 'IPv4';
                    } elseif (filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
                        echo 'IPv6';
                    } else {
                        echo 'Unknown';
                    }
                    ?>
                </div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Connection Type</div>
                <div class="detail-value">
                    <?php echo !empty($_SERVER['HTTP_CLIENT_IP']) || !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ? 'Proxy' : 'Direct'; ?>
                </div>
            </div>
            <?php if (!empty($rawXForwardedFor)) : ?>
            <div class="detail-item">
                <div class="detail-label">X-Forwarded-For</div>
                <div class="detail-value" style="font-size:0.95em; font-weight:600; color:#555;">
                    <?php echo htmlspecialchars($rawXForwardedFor); ?>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <div class="features">
            <h3>What is Your IP Address?</h3>
            <div class="feature-list">
                <div class="feature-item">Your unique online identity</div>
                <div class="feature-item">Used for routing data</div>
                <div class="feature-item">Identifies your location</div>
                <div class="feature-item">Visible to websites you visit</div>
            </div>
        </div>

        <div class="footer">
            <p>🔒 Your IP information is displayed securely in your browser</p>
        </div>
    </div>

    <script src="public/js/script.js"></script>
    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                const button = event.target;
                const originalText = button.textContent;
                button.textContent = '✓ Copied!';
                setTimeout(() => {
                    button.textContent = originalText;
                }, 2000);
            }).catch(err => {
                alert('Failed to copy: ' + err);
            });
        }
    </script>
    
    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebApplication",
        "name": "Know Your IP Address",
        "description": "Find your public IP address instantly with detailed information about IPv4, IPv6, and connection type.",
        "url": "https://knowyourip.com/",
        "applicationCategory": "UtilityApplication",
        "offers": {
            "@type": "Offer",
            "price": "0",
            "priceCurrency": "USD"
        },
        "author": {
            "@type": "Organization",
            "name": "Know Your IP Address",
            "url": "https://knowyourip.com/"
        },
        "datePublished": "2025-01-01",
        "dateModified": "2025-11-29"
    }
    </script>
    
    <!-- FAQ Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            {
                "@type": "Question",
                "name": "What is my IP address?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Your IP address is a unique numerical identifier assigned to your device on the internet. It allows your device to communicate with other devices and servers online."
                }
            },
            {
                "@type": "Question",
                "name": "What is the difference between IPv4 and IPv6?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "IPv4 uses 32-bit addresses (like 192.168.1.1) while IPv6 uses 128-bit addresses (like 2001:0db8:85a3:0000:0000:8a2e:0370:7334). IPv6 was created to accommodate the growing number of internet-connected devices."
                }
            },
            {
                "@type": "Question",
                "name": "Is my IP address visible to websites I visit?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Yes, websites can see your public IP address. This is how they identify your location and deliver content. If you want to hide your IP, consider using a VPN (Virtual Private Network)."
                }
            },
            {
                "@type": "Question",
                "name": "Can I change my IP address?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Your IP address is assigned by your Internet Service Provider (ISP). You can temporarily change it by restarting your router or using a VPN service."
                }
            }
        ]
    }
    </script>
    
    <!-- Organization Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Know Your IP Address",
        "url": "https://knowyourip.com/",
        "description": "Find your public IP address with instant information about IPv4, IPv6, and connection details",
        "sameAs": [
            "https://www.facebook.com/knowyourip",
            "https://twitter.com/knowyourip",
            "https://www.linkedin.com/company/knowyourip"
        ]
    }
    </script>
    
    <!-- Breadcrumb Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
            {
                "@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "https://knowyourip.com/"
            }
        ]
    }
    </script>
</body>
</html>
