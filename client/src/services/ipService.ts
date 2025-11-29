import axios from 'axios';

const API_URL = 'http://localhost:5000/api/ip'; // Adjust the URL based on your server configuration

export const fetchUserIP = async () => {
    try {
        const response = await axios.get(API_URL);
        return response.data.ip; // Assuming the response contains an 'ip' field
    } catch (error) {
        console.error('Error fetching IP address:', error);
        throw error;
    }
};