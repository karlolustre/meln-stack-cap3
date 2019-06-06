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

// router.delete('/:id', (req, res) => {
// 	res.send({type : 'DELETE'})
// })



router.put('/:id', (req, res, next) => {
	// res.send({type : 'PUT'})
	SongModel.update({_id : req.params.id}, req.body)
	.then( () => {
		SongModel.findOne({_id : req.params.id})
		.then(dev => {
			res.send(dev)
		})
	}).catch(next)
})

//RETRIEVE A DEV
router.get('/all', (req, res) => {
	SongModel.find({}, (err, songs) => {
		console.log(songs)
		if (!err) {
			return res.json({
				'collection' : {
					'songs' : songs
				}
			})
		} else {
			console.log(err)
		}
	})
})

module.exports = router;


