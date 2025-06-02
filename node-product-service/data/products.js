const { v4: uuidv4 } = require('uuid');

module.exports = [
    { id: uuidv4(), name: 'Laptop', price: 999 },
    { id: uuidv4(), name: 'Phone', price: 499 },
    { id: uuidv4(), name: 'Tablet', price: 299 }
];