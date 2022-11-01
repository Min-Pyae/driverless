const startingMinute = 10;
let time = startingMinute * 60;

const countdown = document.getElementById('timer');
const warningText = document.getElementById('login-warning');

const timer = setInterval(updateTime, 1000);
function updateTime() {
    
    const minutes = Math.floor(time / 60);
    let seconds = time % 60;
    seconds = seconds < 10 ? '0' + seconds : seconds;
    countdown.innerHTML = `${minutes}: ${seconds}`;
    time--;
    if (countdown.innerHTML == '0: 00') {
        clearInterval(timer);
        document.getElementById('login-btn').disabled = false;
        countdown.style.display = "none";
        warningText.classList.add("d-none");
    }
}
