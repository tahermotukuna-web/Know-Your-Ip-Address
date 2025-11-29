# Know Your IP Address

## Overview
"Know Your IP Address" is a simple PHP application that displays the user's IP address. It is designed to be user-friendly and provides a straightforward interface for users to quickly find their IP address.

## Features
- Displays the user's IP address on the main page.
- Utilizes a clean and responsive design.
- Easy to navigate and understand.

## Project Structure
The project is organized into several directories and files:

```
know-your-ip-address
├── src
│   ├── index.php               # Entry point of the application
│   ├── controllers
│   │   └── IPController.php     # Handles requests related to IP address retrieval
│   ├── services
│   │   └── IPService.php        # Contains logic for retrieving and processing IP addresses
│   ├── helpers
│   │   └── IPHelper.php         # Provides utility functions for IP address handling
│   └── types
│       └── constants.php        # Defines constants used throughout the application
├── public
│   ├── css
│   │   └── style.css            # CSS styles for the application
│   ├── js
│   │   └── script.js            # JavaScript code for client-side functionality
│   └── index.php                # Public-facing entry point for the application
├── config
│   └── config.php               # Configuration settings for the application
├── vendor
│   └── autoload.php             # Autoloading for project dependencies
├── .htaccess                     # URL rewriting and server configuration
├── composer.json                 # Composer configuration file
└── README.md                     # Documentation for the project
```

## Installation
1. Clone the repository:
   ```
   git clone <repository-url>
   ```
2. Navigate to the project directory:
   ```
   cd know-your-ip-address
   ```
3. Install dependencies using Composer:
   ```
   composer install
   ```
4. Configure your web server to point to the `public` directory.

## Usage
- Open your web browser and navigate to the application URL.
- The application will display your current IP address on the main page.

## Contributing
Contributions are welcome! Please feel free to submit a pull request or open an issue for any suggestions or improvements.

## License
This project is licensed under the MIT License. See the LICENSE file for more details.