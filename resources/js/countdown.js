function getNextWeekDate() {
    const now = new Date();
    const dayOfWeek = now.getDay();
    const daysUntilNextWeek = 7 - dayOfWeek;
    const nextWeek = new Date(now);

    nextWeek.setDate(now.getDate() + daysUntilNextWeek);
    nextWeek.setHours(0, 0, 0, 0);

    return nextWeek.getTime();
}

let countDownDate = getNextWeekDate();

const x = setInterval(function() {
    const now = new Date().getTime();
    const distance = countDownDate - now;

    let days = Math.floor(distance / (1000 * 60 * 60 * 24));
    let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Додаємо "0" перед числом, якщо воно менше 10
    days = days < 10 ? '0' + days : days;
    hours = hours < 10 ? '0' + hours : hours;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;

    document.getElementById("day").innerHTML = days;

    document.getElementById("hour").innerHTML = hours;

    document.getElementById("minute").innerHTML = minutes;

    document.getElementById("second").innerHTML = seconds;

    if (distance < 0) {
        countDownDate = getNextWeekDate();
    }
}, 1000);
