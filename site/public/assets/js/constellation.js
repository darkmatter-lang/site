// Constellations MP

function fitToContainer(canvas) {
	// Make it visually fill the positioned parent
	canvas.style.width ='100%';
	canvas.style.height='100%';
	// ...then set the internal size to match
	canvas.width  = canvas.offsetWidth;
	canvas.height = canvas.offsetHeight;
}


/**
 * color = rgb as int 0-16777215
 * alpha = starting alpha value 0-255
 * radius = glow radius
 */
function drawStar(ctx, x, y, color, alpha, radius) {
	var imageData = ctx.getImageData(0, 0, ctx.canvas.clientWidth, ctx.canvas.clientHeight);
	var pixels = imageData.data;
	var currentX = x;
	var currentY = y;
	
	// FIXME: this is kinda slow
	for (var dx = x - radius; dx < x+radius+1; dx++) {
		for (var dy = y - radius; dy < y+radius+1; dy++) {
			currentX = dx;
			currentY = dy;

			var distanceFromCenter = Math.abs(currentX - x) + Math.abs(currentY - y);
			var currentAlpha = alpha / (distanceFromCenter + 1);

			if (distanceFromCenter > radius / 4) {
				currentAlpha -= 20;
			}

			currentAlpha = (currentAlpha < 0) ? 0 : currentAlpha;

			var offset = (currentY * imageData.width + currentX) * 4;
			var r = (color & 0xFF0000) >> 16;
			var g = (color & 0x00FF00) >> 8;
			var b = (color & 0x0000FF);

			pixels[offset] = r;
			pixels[offset + 1] = g;
			pixels[offset + 2] = b;
			pixels[offset + 3] = currentAlpha;
		}
	}
	
	ctx.putImageData(imageData, 0, 0);
}

function draw(canvas, ctx) {
	// Clear the canvas
	fitToContainer(canvas);
	ctx.clearRect(0, 0, canvas.width, canvas.height);
	ctx.imageSmoothingEnabled = false;
	ctx.globalAlpha = 1.0;

	var id = ctx.getImageData(0, 0, canvas.width, canvas.height);
	var pixels = id.data;

	// EXAMPLE
	for (var i=0; i<8; i++) {
		var x = Math.floor(Math.random() * canvas.width);
		var y = Math.floor(Math.random() * canvas.height);
		var r = Math.floor(Math.random() * 256);
		var g = Math.floor(Math.random() * 256);
		var b = Math.floor(Math.random() * 256);
		var a = Math.floor(Math.random() * 256);
		var radius = 1 + Math.floor(Math.random() * 9);

		// OVERRIDE
		r = g = b = 255;
		a = 255;
		radius = 10;

		color = (
			((r << 16) & 0xFF0000) |
			((g << 8) & 0xFF00) |
			(b & 0xFF)
		);

		drawStar(ctx, x, y, color, a, radius);
	}

}

document.addEventListener("DOMContentLoaded", function(event) {
	var canvas = document.getElementById("constellation");
	var ctx = canvas.getContext("2d");


	draw(canvas, ctx);

	// Redraw/resize canvas every n secs
	// FIXME: SLOW!!
	/*
	setInterval(() => {
		draw(canvas, ctx);
	}, 5_000);
	*/
});
