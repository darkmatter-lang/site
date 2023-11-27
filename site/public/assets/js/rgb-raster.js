const BW_MODE = false;

function fitToContainer(canvas) {
	// Make it visually fill the positioned parent
	canvas.style.width ='100%';
	canvas.style.height='100%';
	// ...then set the internal size to match
	canvas.width  = canvas.offsetWidth;
	canvas.height = canvas.offsetHeight;
}

function regen(canvas, ctx) {
	fitToContainer(canvas);
	ctx.clearRect(0, 0, canvas.width, canvas.height);
	ctx.imageSmoothingEnabled = false;
	var id = ctx.getImageData(0, 0, canvas.width, canvas.height);
	var pixels = id.data;
	
	for (var w = 0; w < canvas.width; w++) {
		for (var h = 0; h < canvas.height; h++) {
			var x = w;
			var y = h;
			var r = Math.floor(Math.random() * 256);
			var g = Math.floor(Math.random() * 256);
			var b = Math.floor(Math.random() * 256);
			var off = (y * id.width + x) * 4;

			if (BW_MODE) {
				g = r;
				b = r;
			}

			pixels[off] = r;
			pixels[off + 1] = g;
			pixels[off + 2] = b;
			pixels[off + 3] = 3;
		}
	}
	ctx.putImageData(id, 0, 0);
}

document.addEventListener("DOMContentLoaded", function(event) {
	var canvas = document.getElementById("rgb-raster");
	var ctx = canvas.getContext("2d");
	
	setInterval(() => {
		regen(canvas, ctx);
	}, 3_000);
	
	regen(canvas, ctx);
});
