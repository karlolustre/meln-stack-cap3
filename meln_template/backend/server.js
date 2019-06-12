// include the express framework
const express = require('express');

// instantiate an express app
const app = express();

//include cors package to allow cross-origin requests
const cors = require('cors')

//allow cross-origin requests
app.use(cors())

// add body parsing to access the data in our request
const bodyParser = require('body-parser');

//include mongoose for handling multiple db queries/connections
const mongoose = require('mongoose');

//establish a connection to our database
const databaseUrl = '';

//establish a connection to the remote db using the connect method of mongoose
mongoose.connect(databaseUrl, {useNewUrlParser : true});

mongoose.connection.once('open', () => {
	console.log('Remote database established');
})


// configure express/middleware to use the body parser
//package in retrieving request bodies
app.use(bodyParser.json());

// tuitt dev routes
const dev = require('./routes/api.js');
app.use('/devs', dev);

app.use( (err, req, res, next) => {
	res.status(422).send({error : err.message })
})

const port = 3000;

app.listen(port, () => {
	console.log(`Connected to ${port}`)
})