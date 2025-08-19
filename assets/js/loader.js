let ctx = document.getElementById('circularLoader').getContext('2d');
let al = 0;
let start = 4.72;
let cw = ctx.canvas.width;
let ch = ctx.canvas.height;
let diff;
let loaderInterval = null;
const modal = new bootstrap.Modal("#winnerModal");
const loader = document.querySelector(".loader-container");

function progressSim() {
	diff = ((al / 100) * Math.PI * 2 * 10).toFixed(2);
	ctx.clearRect(0, 0, cw, ch);
	ctx.lineWidth = 17;
	ctx.fillStyle = '#4285f4';
	ctx.strokeStyle = "#4285f4";
	ctx.textAlign = "center";
	ctx.font = "28px monospace";
	ctx.fillText(al + '%', cw * .52, ch * .5 + 5, cw + 12);
	ctx.beginPath();
	ctx.arc(100, 100, 75, start, diff / 10 + start, false);
	ctx.stroke();
	if (al >= 100) {
		clearTimeout(loaderInterval);
		modal.show();
		loader.style.display = "none";
		return;
	}
	al++;
}

function startProgress() {
	loader.style.display = "block";
	loaderInterval = setInterval(progressSim, 20);
}
