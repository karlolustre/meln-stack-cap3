//load mongoose library for data modelling
// import mongoose
const mongoose = require('mongoose');

// load mongoose schema for models
const Schema = mongoose.Schema;

//create a new Schema for Devs
const UserSchema = new Schema({
	// name : String,
	name : {
		type : String,
		required : true
	},
	// portfolio : String,
	email : {
		type : String,
		required : true,
		unique : true
	},
	password : {
		type : String,
		required : true,
	},
	// batch : Number
	date : {
		type : Date,
		default: Date.now
	}
})

//setup the Dev Model and export it to the main app
module.exports = mongoose.model('User', UserSchema);