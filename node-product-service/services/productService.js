const products = require('../data/products');

const getAll = () => products;

const getById = (id) => products.find(p => p.id === id);

module.exports = { getAll, getById };