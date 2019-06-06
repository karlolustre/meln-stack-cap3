//include express framework
const express = require('express');

// include the Router used in the express framework
const router = express.Router();

// require the dev model
const DevModel = require('../models/Dev');


//CREATE DEV
router.post('/create', (req, res) => {
	console.log(req.body);
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
		console.log(devs)
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


//DELETE DEV
//localhost:3000/devs/:id
// router.delete('/:id', (req, res, next) => {
// 	// res.send({type : 'DELETE'})

// 	DevModel.deleteOne({_id : req.params.id })
// 	.then(dev => {
// 		res.send(dev)
// 	}).catch(next)
// })


//UPDATE DEV
router.put('/:id', (req, res, next) => {
	// res.send({type : 'PUT'})
	DevModel.update({_id : req.params.id}, req.body)
	.then( () => {
		DevModel.findOne({_id : req.params.id})
		.then(dev => {
			res.send(dev)
		})
	}).catch(next)
})


module.exports = router;


