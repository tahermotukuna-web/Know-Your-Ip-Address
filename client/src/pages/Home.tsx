import React from 'react';
import IPDisplay from '../components/IPDisplay';

const Home: React.FC = () => {
    return (
        <div>
            <h1>Welcome to Know Your IP Address</h1>
            <IPDisplay />
        </div>
    );
};

export default Home;