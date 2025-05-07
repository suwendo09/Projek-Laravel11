document.addEventListener("DOMContentLoaded", function () {
    const counters = document.querySelectorAll('[id^="jumlah-"]');
    const speed = 50;

    counters.forEach((counter) => {
        const updateCount = () => {
            const target = +counter.getAttribute("data-count");
            let count = +counter.innerText;
            const inc = Math.ceil(target / speed);

            if (count < target) {
                counter.innerText = count + inc > target ? target : count + inc;
                setTimeout(updateCount, 20);
            } else {
                counter.innerText = target;
            }
        };
        updateCount();
    });
});
