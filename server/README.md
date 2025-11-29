# Know Your IP Address Server

## Overview
The "Know Your IP Address" application is designed to display the user's IP address in a user-friendly manner. This server-side component is built using TypeScript and Express, providing a RESTful API for the client-side application to fetch the user's IP address.

## Project Structure
The server-side code is organized as follows:

- **src/**
  - **index.ts**: Entry point for the server application, initializes the Express server.
  - **app.ts**: Configures the Express application, including middleware and route definitions.
  - **routes/**
    - **ip.ts**: Defines the endpoint for fetching the user's IP address.
  - **controllers/**
    - **ipController.ts**: Contains methods for handling requests related to IP address retrieval.
  - **services/**
    - **ipLookup.ts**: Functions for looking up the user's IP address, possibly using an external API.
  - **types/**
    - **index.ts**: TypeScript types and interfaces used throughout the server application.

## Installation
To set up the server, follow these steps:

1. Clone the repository:
   ```
   git clone <repository-url>
   cd know-your-ip-address/server
   ```

2. Install dependencies:
   ```
   npm install
   ```

3. Start the server:
   ```
   npm start
   ```

## API Endpoints
The server exposes the following endpoint:

- **GET /api/ip**: Returns the user's IP address.

## Usage
Once the server is running, the client application can make requests to the `/api/ip` endpoint to retrieve the user's IP address and display it on the page.

## Contributing
Contributions are welcome! Please submit a pull request or open an issue for any enhancements or bug fixes.

## License
This project is licensed under the MIT License. See the LICENSE file for details.