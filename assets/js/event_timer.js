function getTimeRemaining(endtime) {
    const total = Date.parse(endtime) - Date.parse(new Date());
    const seconds = Math.floor((total / 1000) % 60);
    const minutes = Math.floor((total / 1000 / 60) % 60);
    const hours = Math.floor((total / (1000 * 60 * 60)) % 24);
    const days = Math.floor(total / (1000 * 60 * 60 * 24));
    
    return {
        total,
        days,
        hours,
        minutes,
        seconds
    };
}
  
function initializeClock(id, endtime) {
    const timer = document.getElementById(id);
    const days = timer.querySelector('.days');
    const hours = timer.querySelector('.hours');
    const minutes = timer.querySelector('.minutes');
    const seconds = timer.querySelector('.seconds');
  
    function updateClock() {
        const t = getTimeRemaining(endtime);
    
        days.innerHTML = t.days;
        hours.innerHTML = ('0' + t.hours).slice(-2);
        minutes.innerHTML = ('0' + t.minutes).slice(-2);
        seconds.innerHTML = ('0' + t.seconds).slice(-2);
    
        if (t.total <= 0) {
            clearInterval(timeinterval);
        }
    }
  
    updateClock();
    const timeinterval = setInterval(updateClock, 1000);
  }
  
const deadline = new Date(Date.parse('2021-11-30'));
initializeClock('event-timer', deadline);