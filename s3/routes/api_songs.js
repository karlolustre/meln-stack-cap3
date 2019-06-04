//include express framework
const express = require('express');

// include the Router used in the express framework
const router = express.Router();

// require the dev model
const SongModel = require('../models/Song');

router.get('/', (req, res) => {
	res.send({type : 'GET'});
})

router.post('/new', (req, res, next) => {
	console.log(req.body);
	// res.send({type : 'POST'})
	
	SongModel.create(req.body)
	.then(song => {
		res.send(song)
	}).catch(next)

	res.send ({
		type : "POST",
		title : req.body.title,
		artist : req.body.artist,
		length : req.body.length
	})
})

router.delete('/:id', (req, res) => {
	res.send({type : 'DELETE'})
})

router.put('/:id', (req, res) => {
	res.send({type : 'PUT'})
})


module.exports = router;


