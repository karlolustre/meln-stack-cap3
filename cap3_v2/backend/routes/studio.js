const express = require('express');
const router = express.Router();
const { check, validationResult } = require('express-validator/check');


const StudioModel = require('../models/Studio');

//Create Studio
router.post('/create', (req, res,) => {
	// console.log(req.body)
	StudioModel.create(req.body)
	.then(studio => {
		console.log('Item created successfully')
		res.send(studio)
	})
})

//RETRIEVE Studio
router.get('/', (req, res) => {
	StudioModel.find({}, (err, studio) => {
		if (!err) {
			return res.json({
				'data' : {
					'studio' : studio
				}
			})
		} else {
			console.log(err)
		}
	})
})

// RETRIEVE SINGLE Studio
router.get('/:id', (req, res) => {
	// console.log(req.params.id)
	StudioModel.findOne({ _id : req.params.id})
	.then(studio =>{
		// console.log(studio)
		if(studio) {
			return res.json({
				'data' : {
					'studio' : studio
				}
			})
		}
	})
})

//UPDATE Studio
router.put('/edit/:id', (req, res, next) => {
	// console.log(req.body)
	StudioModel.updateOne({_id : req.params.id}, req.body)
	.then( () => {
		StudioModel.findOne({_id : req.params.id})
		.then(studio => {
			res.send(studio)
		})
	}).catch(next)
})

//DELETE Studio
router.delete('/delete', (req, res, next) => {
	// console.log(req.body)
	// res.send({type : 'DELETE'})

	StudioModel.deleteOne({_id : req.body.id })
	.then(studio => {
		res.send(studio)
	}).catch(next)
})


module.exports = router;