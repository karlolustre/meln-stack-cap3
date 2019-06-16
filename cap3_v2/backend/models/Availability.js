const mongoose = require('mongoose');

const Schema = mongoose.Schema;

// Create a new Schema for the Availability
const AvailabilitySchema = new Schema({ 
    name: String,
    description: String, 
    seats: Number,
    price: Number,
    isActive: {type: Boolean, default: true}
});

module.exports = mongoose.model('Availability', AvailabilitySchema);