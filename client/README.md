# Know Your IP Address

## Overview
"Know Your IP Address" is a web application that allows users to easily view their public IP address. The application is built using React for the client-side and Node.js with Express for the server-side. 

## Client-Side
The client-side of the application is structured as follows:

- **Entry Point**: The application starts from `src/index.tsx`, which renders the main `App` component.
- **Main Component**: The `App.tsx` file sets up routing and includes the `Header` and `Home` components.
- **IP Display**: The `IPDisplay.tsx` component is responsible for fetching and displaying the user's IP address.
- **Header**: The `Header.tsx` component provides navigation and the title for the application.
- **Custom Hook**: The `useIP.ts` hook manages the fetching of the user's IP address and loading state.
- **API Service**: The `ipService.ts` file contains functions to make API calls to retrieve the user's IP address.
- **Home Page**: The `Home.tsx` component serves as the main page, utilizing the `IPDisplay` component to show the IP address.

## Server-Side
The server-side of the application is structured as follows:

- **Entry Point**: The server starts from `src/index.ts`, initializing the Express server.
- **App Configuration**: The `app.ts` file configures middleware and routes.
- **IP Routes**: The `ip.ts` file defines the endpoint for fetching the user's IP address.
- **IP Controller**: The `ipController.ts` file handles requests related to IP address retrieval.
- **IP Lookup Service**: The `ipLookup.ts` file contains functions for looking up the user's IP address.

## Getting Started
To get started with the application, follow these steps:

1. Clone the repository.
2. Navigate to the `client` directory and run `npm install` to install client-side dependencies.
3. Navigate to the `server` directory and run `npm install` to install server-side dependencies.
4. Start the server by running `npm start` in the `server` directory.
5. Start the client by running `npm start` in the `client` directory.

## Technologies Used
- React
- TypeScript
- Node.js
- Express

## License
This project is licensed under the MIT License.