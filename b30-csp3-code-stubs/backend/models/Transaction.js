//Load Mongoose library for data modeling
//pass in the string 'mongoose' as an argument to the require method
//save this as a constant called mongoose
const mongoose = ?('?');

//Load Mongoose schema for models
//save the Schema property of the mongoose object as a constant named Schema
const Schema = ?.?;

// Create a new Schema for the Transaction
const TransactionSchema = new Schema({ 
	//this AvailabilitySchema has the following properties with corresponding data types:
    ownerEmail: String, 
    availabilityId: String,
    quantity: Number,
    amount: Number,
    //the status property is of type String and has a default value of "booked"
    status: {type: String, default: "booked"},
    date: String
});

//Set up the Transaction model and export it to the main application
//pass in 2 arguments to the model method of mongoose:
	//the name of this model as a string
	//the TransactionSchema object
module.exports = ?.?('?', ?);