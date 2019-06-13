//Load Mongoose library for data modeling
//pass in the string 'mongoose' as an argument to the require method
//save this as a constant called mongoose
const mongoose = ?('?');

//Load Mongoose schema for models
//save the Schema property of the mongoose object as a constant named Schema
const Schema = ?.?;

//Create a new Schema for the Availability
const AvailabilitySchema = new Schema({
	//this AvailabilitySchema has the following properties with corresponding data types: 
    name: String,
    description: String, 
    seats: Number,
    price: Number,
    //the isActive property is of type Boolean and has a default value of true
    isActive: {type: Boolean, default: true}
});

//Set up the Availability model and export it to the main application
//pass in 2 arguments to the model method of mongoose:
	//the name of this model as a string
	//the AvailabilitySchema object
module.exports = ?.?('?', ?);