//include express framework
const express = require('express');

// include the Router used in the express framework
const router = express.Router();

// require the dev model
const SongModel = require('../models/Song');


router.post('/new', (req, res, next) => {
	// console.log(req.body);
	// res.send({type : 'POST'})
	
	SongModel.create(req.body)
	.then(song => {
		res.send(song)
	}).catch(next)

	// res.send ({
	// 	type : "POST",
	// 	title : req.body.title,
	// 	artist : req.body.artist,
	// 	length : req.body.length
	// })
})

// router.delete('/:id', (req, res) => {
// 	res.send({type : 'DELETE'})
// })

//retrieve single song
// router get('/:id', (req, res, next) => {
// 	SongModel.findOne({'_id' : req.params.id})
// 	.then(song=> {
// 		return song.json()
// 	})
	
// })



//update a Song
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

//RETRIEVE ALL DEV
router.get('/all', (req, res) => {
	SongModel.find({}, (err, songs) => {
		// console.log(songs)
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

// DELETE DEV
// localhost:3000/devs/:id
router.delete('/delete', (req, res, next) => {
	// console.log(req.body)
	res.send({type : 'DELETE'})

	SongModel.deleteOne({_id : req.body.id })
	.then(song => {
		res.send(song)
	}).catch(next)
})

module.exports = router;


