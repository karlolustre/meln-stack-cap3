//include express framework
const express = require('express');

// include the Router used in the express framework
const router = express.Router();

// require the dev model
const DevModel = require('../models/Dev');


//CREATE DEV
router.post('/create', (req, res, next) => {
	// console.log(req.body);
	// res.send({type : 'POST'})
	
	DevModel.create(req.body)
	.then(dev => {
		res.send(dev)
	}).catch(next)

	// res.send({
	// 	type : "POST",
	// 	name : req.body.name,
	// 	portfolio : req.body.portfolio,
	// 	hired : req.body.hired,
	// 	batch : req.body.batch
	// })
})

//RETRIEVE A DEV
router.get('/', (req, res) => {
	DevModel.find({}, (err, devs) => {
		// console.log(devs)
		if (!err) {
			return res.json({
				'data' : {
					'devs' : devs
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
	console.log(req.body)
	res.send({type : 'DELETE'})

	DevModel.deleteOne({_id : req.body.id })
	.then(dev => {
		res.send(dev)
	}).catch(next)
})

//RETRIEVE SINGLE DEV
router.get('/:id', (req, res) => {
	// console.log(req.params.id)
	DevModel.findOne({'_id': req.params.id})
	.then(dev => {
		// console.log(dev)
		if(dev) {
			return res.json({
				'data' : {
					'dev' : dev
				}
			})
		}
	})
})

//UPDATE ALL DEVS
router.put('/:id', (req, res, next) => {
	// res.send({type : 'PUT'})
	// console.log(req.body)
	DevModel.update({_id : req.params.id}, req.body)
	.then( () => {
		DevModel.findOne({_id : req.params.id})
		.then(dev => {
			res.send(dev)
		})
	}).catch(next)
})


module.exports = router;


