// load mongoose library for data modelling
// import mongoose
const mongoose = require('mongoose');

//load mongoose schema for models
const Schema = mongoose.Schema;

//create a new Schema for Devs
const SongSchema = new Schema ({
	title: {
		type : String,
		required : [true, 'title field is required']
	},

	artist: {
		type: String,
		required: [true, 'artist field is required']
	},

	length: {
		type: Number,
		required: false
	}
})

//setup the Dev model and export it to the main app
module.exports = mongoose.model('Song', SongSchema);
