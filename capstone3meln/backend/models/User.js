// load mongoose library for data modelling
// import mongoose
const mongoose = require('mongoose');

//load mongoose schema for models
const Schema = mongoose.Schema;

//create a new Schema for Devs
const UserSchema = new Schema ({
	email: String,
	password: String,
	admin: {
		type: Boolean,
		default: false
	}
})

//setup the Dev model and export it to the main app
module.exports = mongoose.model('User', UserSchema);
