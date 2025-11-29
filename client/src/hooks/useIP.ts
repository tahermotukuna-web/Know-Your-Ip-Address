import { useEffect, useState } from 'react';
import { fetchIPAddress } from '../services/ipService';

const useIP = () => {
    const [ipAddress, setIpAddress] = useState<string | null>(null);
    const [loading, setLoading] = useState<boolean>(true);
    const [error, setError] = useState<string | null>(null);

    useEffect(() => {
        const getIP = async () => {
            try {
                const ip = await fetchIPAddress();
                setIpAddress(ip);
            } catch (err) {
                setError('Failed to fetch IP address');
            } finally {
                setLoading(false);
            }
        };

        getIP();
    }, []);

    return { ipAddress, loading, error };
};

export default useIP;