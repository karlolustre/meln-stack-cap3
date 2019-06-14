//inlcude the express framework
const express = require('express');

// instantiate an express app
const app = express();

//use passport for local auth
const passport = require('passport')
//include jwt for handling JSON web tokens
const jwt = require('jsonwebtoken')


//include cors package to allow cross-origin requests
const cors = require('cors')

//allow cross-origin requests
app.use(cors())

//add body parsing to access the data in our request
const bodyParser = require('body-parser');

// include mongoose for handling mutiple db queries/connection
const mongoose = require('mongoose');

// establish a connection to our database
const databaseUrl = "mongodb+srv://karlolustre:karlolustre@cluster0-6xkfx.mongodb.net/b30_meln?retryWrites=true&w=majority";

mongoose.connect('mongodb+srv://karlolustre:karlolustre@cluster0-6xkfx.mongodb.net/b30_meln?retryWrites=true&w=majority',  {useNewUrlParser: true});

mongoose.connection.once('open', () => {
	console.log("Remote connection established");
})

// configure express/middleware to use the body parser package in retieving request bodies
app.use(bodyParser.json());

//tuitt dev routes
const dev = require('./routes/api.js');
app.use('/devs', passport.authenticate('jwt', {session: false}), dev);

const song = require('./routes/api_songs.js');
app.use('/songs', song);

const index = require('./routes/index.js');
app.use('/', index);

const auth = require('./routes/auth.js');
app.use('/auth', auth);


app.use((err, req, res, next) => {
	res.status(422).send({error : err.message})
})


const port = 3000;



app.listen(port, () => {
	console.log(`Server is running at port ${port}`);
})

