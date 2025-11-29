import axios from 'axios';

export const getIPAddress = async (): Promise<string> => {
    try {
        const response = await axios.get('https://api.ipify.org?format=json');
        return response.data.ip;
    } catch (error) {
        throw new Error('Unable to fetch IP address');
    }
};