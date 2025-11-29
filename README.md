# Know Your IP Address

## Overview
"Know Your IP Address" is a web application that allows users to easily view their public IP address. The application is built using React for the client-side and Node.js with Express for the server-side. It provides a simple and intuitive interface for users to access their IP information.

## Features
- Displays the user's public IP address.
- Responsive design for optimal viewing on various devices.
- Fetches IP address data from a server endpoint.
- Clean and user-friendly interface.

## Project Structure
The project is organized into two main parts: the client and the server.

### Client
- **src/**: Contains the source code for the React application.
  - **index.tsx**: Entry point for the React application.
  - **App.tsx**: Main application component that sets up routing.
  - **components/**: Contains reusable components.
    - **IPDisplay.tsx**: Component that displays the user's IP address.
    - **Header.tsx**: Component that contains the application header.
  - **hooks/**: Custom hooks for managing state and side effects.
    - **useIP.ts**: Hook for fetching the user's IP address.
  - **services/**: Contains API service functions.
    - **ipService.ts**: Functions for making API calls to retrieve IP address.
  - **pages/**: Contains main application pages.
    - **Home.tsx**: Main page that utilizes the IPDisplay component.
  - **types/**: TypeScript types and interfaces used in the client application.

### Server
- **src/**: Contains the source code for the Node.js server.
  - **index.ts**: Entry point for the server application.
  - **app.ts**: Configures the Express application.
  - **routes/**: Defines API routes.
    - **ip.ts**: Route for fetching the user's IP address.
  - **controllers/**: Contains request handling logic.
    - **ipController.ts**: Controller for IP address retrieval.
  - **services/**: Contains service functions for IP lookup.
    - **ipLookup.ts**: Functions for looking up the user's IP address.
  - **types/**: TypeScript types and interfaces used in the server application.

## Installation
1. Clone the repository:
   ```
   git clone <repository-url>
   ```
2. Navigate to the client directory and install dependencies:
   ```
   cd client
   npm install
   ```
3. Navigate to the server directory and install dependencies:
   ```
   cd ../server
   npm install
   ```

## Running the Application
To run the application, you can use the provided shell script:
```
cd scripts
./start.sh
```
This will start both the client and server applications.

## License
This project is licensed under the MIT License. See the LICENSE file for more details.

## Acknowledgments
- Thanks to the open-source community for providing the tools and libraries used in this project.