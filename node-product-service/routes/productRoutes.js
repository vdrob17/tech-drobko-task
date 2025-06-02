const express = require('express');
const router = express.Router();
const controller = require('../controllers/productController');

router.get('/products', controller.getAllProducts);
router.get('/products/:id', controller.getProductById);

module.exports = router;