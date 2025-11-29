import { Router } from 'express';
import { getIPAddress } from '../controllers/ipController';

const router = Router();

router.get('/ip', getIPAddress);

export default router;