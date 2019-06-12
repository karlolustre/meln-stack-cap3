//load mongoose library for data modelling
// import mongoose
const mongoose = require('mongoose');

// load mongoose schema for models
const Schema = mongoose.Schema;

//create a new Schema for Devs
const DevSchema = new Schema({
	// name : String,
	name : {
		type : String,
		required : [true, 'Name field is required']
	},
	// portfolio : String,
	portfolio : {
		type : String,
		required : [true, 'Porfolio field is required']
	},
	// hired : Boolean,
	hired : {
		type : Boolean,
		default : false
	},
	// batch : Number
	batch : {
		type : Number,
		required : false
	}
})

//setup the Dev Model and export it to the main app
module.exports = mongoose.model('Dev', DevSchema);