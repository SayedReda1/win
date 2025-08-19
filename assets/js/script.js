const targetDate = new Date("Aug 19, 2025 12:48:00+3:00").getTime();

const updateCounter = (targetDate) => {
    const counter = document.querySelector("#counter");

    const now = new Date().getTime();
    const dist = targetDate - now;

    if (dist < 0) {
        clearInterval(this);
        counter.classList.add("text-danger");
        counter.textContent = "TIME IS UP!";
        return;
    }

    const days = Math.floor(dist / (1000 * 60 * 60 * 24));
    const hours = Math.floor(dist % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
    const mins = Math.floor(dist % (1000 * 60 * 60) / (1000 * 60));
    const seconds = Math.floor(dist % (1000 * 60) / (1000));

    counter.textContent = `${days}d ${hours}h ${mins}m ${seconds}s`
}

updateCounter(targetDate); // first time
setInterval(updateCounter, 1000, targetDate);