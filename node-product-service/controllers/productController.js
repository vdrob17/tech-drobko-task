const productService = require('../services/productService');

exports.getAllProducts = async (req, res) => {
    res.json(productService.getAll());
};

exports.getProductById = async (req, res) => {
    const product = productService.getById(req.params.id);
    if (!product) return res.status(404).json({ error: 'Product not found' });
    res.json(product);
};