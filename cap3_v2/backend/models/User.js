const mongoose = require('mongoose')

const Schema = mongoose.Schema

const UserSchema = new Schema({
	email: {
		type: String,
		required : true,
		// unique : true
	},
	password: {
		type: String,
		required: true
	},
	date: {
		type: Date,
		default: Date.now
	},
	admin: {
		type: Boolean,
		default: false
	}
});

module.exports = mongoose.model('user', UserSchema)

