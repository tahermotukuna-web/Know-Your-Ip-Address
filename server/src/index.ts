import express from 'express';
import { json } from 'body-parser';
import ipRoutes from './routes/ip';

const app = express();
const PORT = process.env.PORT || 5000;

app.use(json());
app.use('/api/ip', ipRoutes);

app.listen(PORT, () => {
    console.log(`Server is running on http://localhost:${PORT}`);
});