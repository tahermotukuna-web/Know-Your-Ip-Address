import { Request, Response } from 'express';
import { getIPAddress } from '../services/ipLookup';

class IPController {
    public async getIP(req: Request, res: Response): Promise<void> {
        try {
            const ipAddress = await getIPAddress();
            res.status(200).json({ ip: ipAddress });
        } catch (error) {
            res.status(500).json({ error: 'Failed to retrieve IP address' });
        }
    }
}

export default new IPController();