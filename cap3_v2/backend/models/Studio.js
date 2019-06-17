const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const StudioSchema = new Schema({

		name: {
			type: String,
			required: true
		},

		description: {
			type: String,
		},

		price: {
			type: Number,
			required: true
		},
		seats: Number,
		isActive: {
			type: Boolean, default: true
		}
})

module.exports = mongoose.model('Studio', StudioSchema);