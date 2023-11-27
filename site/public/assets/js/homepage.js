
const words = [
	"A programming language from another universe.",
	"Independently crafted, community owned.",
	"Open-Source to all, forever.",
	"As seen on 𝕏!",
	"Lightyears better than C# and C++.",
	"Fast, Efficient, Reliable, Simple, Clean.",
	"Actually cross-platform.",
	"Built by devs, for devs.",
	"Embrace Entropy.",
	"Darker than #000000.",
	"Focused on doing, not wishing.",
	"Don't let your dreams be memes.",
	"Never gonna give you up, never gonna let you down.",
	"// Insert your achievements here!"
];

let i = 0;
let timer;

function typingEffect() {
	let word = words[i].split("");
	var loopTyping = function() {
		if (word.length > 0) {
			document.getElementById('phrase').innerHTML += word.shift();
		} else {
			setTimeout(deletingEffect, 2500);
			return false;
		};
		timer = setTimeout(loopTyping, 30);
	};
	loopTyping();
}

function deletingEffect() {
	let word = words[i].split("");
	var loopDeleting = function() {
		if (word.length > 0) {
			word.pop();
			document.getElementById('phrase').innerHTML = word.join("");
		} else {
			if (words.length > (i + 1)) {
				i++;
			} else {
				i = 0;
			};
			typingEffect();
			return false;
		};
		timer = setTimeout(loopDeleting, 30);
	};
	loopDeleting();
}

document.addEventListener("DOMContentLoaded", function(event) {
	// Start the title typing effect
	$("#phrase").text("");
	typingEffect();
});

