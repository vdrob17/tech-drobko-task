const express = require('express');
const app = express();
const routes = require('./routes/productRoutes');

app.use(express.json());
app.use('/', routes);

app.listen(3000, () => console.log('Product Service running on port 3000'));