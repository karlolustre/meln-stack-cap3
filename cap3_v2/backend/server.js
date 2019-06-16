//inlcude the express framework
const express = require('express');

// instantiate an express app
const app = express();

const passport = require('passport')

const jwt = require('jsonwebtoken')

require('./passport')

//include cors package to allow cross-origin requests
const cors = require('cors')

//allow cross-origin requests
app.use(cors())

//add body parsing to access the data in our request
const bodyParser = require('body-parser');

// include mongoose for handling mutiple db queries/connection
const mongoose = require('mongoose');

// establish a connection to our database
const databaseUrl = "mongodb+srv://karlolustre:karlolustre@cluster0-6xkfx.mongodb.net/cap3?retryWrites=true&w=majority";

mongoose.connect('mongodb+srv://karlolustre:karlolustre@cluster0-6xkfx.mongodb.net/cap3?retryWrites=true&w=majority',  {useNewUrlParser: true});

mongoose.connection.once('open', () => {
	console.log("Remote connection established");
})

// configure express/middleware to use the body parser package in retieving request bodies
app.use(bodyParser.json());

// dev routes
const studio = require('./routes/studio');
app.use('/studio', studio);

const index = require('./routes/index');
app.use('/', index);

const auth = require('./routes/auth');
app.use('/auth', auth)

const availability = require('./routes/availability');
app.use('/availability', availability)

app.use((err, req, res, next) => {
	res.status(422).send({error : err.message})
})


const port = 3000;



app.listen(port, () => {
	console.log(`Server is running at port ${port}`);
})

