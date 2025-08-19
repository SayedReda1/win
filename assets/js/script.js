const targetDate = new Date("Aug 19, 2025 19:08:00+3:00").getTime();
const winnerBtn = document.querySelector("#winner-btn");
const counter = document.querySelector("#time-counter");
let timeInterval = null;

const updateCounter = (targetDate) => {

    const now = new Date().getTime();
    const dist = targetDate - now;

    if (dist <= 0) {
        clearTimeout(timeInterval);
        counter.classList.add("text-danger");
        counter.textContent = "TIME IS UP!";
        winnerBtn.classList.remove("d-none");
        return;
    }

    const days = Math.floor(dist / (1000 * 60 * 60 * 24));
    const hours = Math.floor(dist % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
    const mins = Math.floor(dist % (1000 * 60 * 60) / (1000 * 60));
    const seconds = Math.floor(dist % (1000 * 60) / (1000));

    counter.textContent = `${days}d ${hours}h ${mins}m ${seconds}s`
}

updateCounter(targetDate); // first time
timeInterval = setInterval(updateCounter, 1000, targetDate);

// Showing Winner
winnerBtn.addEventListener('click', () => {
    startProgress();
    fetch("/win/api/winner.php")
        .then(winner => winner.json())
        .then(
            winner => document.querySelector("#winner-name").textContent = winner.firstname + " " + winner.lastname
        );
})