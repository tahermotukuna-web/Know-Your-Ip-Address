import React from 'react';
import { useIP } from '../hooks/useIP';

const IPDisplay: React.FC = () => {
    const { ip, loading, error } = useIP();

    if (loading) {
        return <div>Loading...</div>;
    }

    if (error) {
        return <div>Error fetching IP address: {error.message}</div>;
    }

    return (
        <div>
            <h2>Your IP Address</h2>
            <p>{ip}</p>
        </div>
    );
};

export default IPDisplay;