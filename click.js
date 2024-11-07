let countdownStarted = false;

function startCountdown() {
    

    electionDate = new Date(electionDate).getTime() + (countdownDuration * 60 * 60 * 1000);
    updateCountdown();
    interval = setInterval(updateCountdown, 1000);
    countdownElement.classList.add("running");
    document.getElementById("start-button").disabled = true;
    document.getElementById("stop-button").disabled = false;

    // Set the variable to indicate that the countdown has started
    countdownStarted = true;
}

// Add an event listener to the "click me" button to check if the countdown has started
const clickMeButton = document.querySelector('[name="vote-btn"] a');
clickMeButton.addEventListener("click", function (event) {
    if (!countdownStarted) {
        event.preventDefault();
        alert("Voting is not yet open. Please wait for the election to start.");
    }
});
