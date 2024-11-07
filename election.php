<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Election Page</title>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
            margin-top: 100px;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        h2 {
            font-size: 20px;
        }

        #countdown {
            font-size: 24px;
            font-weight: bold;
            margin-top: 20px;
            padding: 10px;
            background-color: #f0f0f0;
        }

        #countdown.running {
            animation: countdown-animation 1s infinite;
        }

        @keyframes countdown-animation {
            0% {
                opacity: 1;
            }
            50% {
                opacity: 0.7;
            }
            100% {
                opacity: 1;
            }
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            margin: 10px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
        }

        button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
        }

        input[type="datetime-local"] {
            font-size: 16px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Election Date and Time</h1>
        <div id="countdown">Election starts now: 0h 0m 0s</div>
        <button id="start-button"></>Start Countdown</button>
        <button id="stop-button" disabled>Stop Countdown</button>
        <div>
            <label for="admin-election-date">Set Election Date and Time:</label>
            <input type="datetime-local" id="admin-election-date" required>
            <label for="countdown-duration">Set Countdown Duration (in hours):</label>
            <input type="number" id="countdown-duration" required>
            <button id="set-election-button">Set Election</button>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const countdownElement = document.getElementById("countdown");
            let interval;
            let electionDate;
            let countdownDuration = 0;

            function updateCountdown() {
                const now = new Date().getTime();
                const timeRemaining = electionDate - now;

                if (timeRemaining <= 0) {
                    clearInterval(interval);
                    countdownElement.innerHTML = "Election has started!";
                } else {
                    const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);
 
                    countdownElement.innerHTML = `Election starts now: ${hours}h ${minutes}m ${seconds}s`;
                }
            }

            function startCountdown() {
                if (!electionDate) {
                    alert("Please set the election date and time first.");
                    return;
                }

                if (countdownDuration <= 0) {
                    alert("Please set the countdown duration.");
                    return;
                }

                electionDate = new Date(electionDate).getTime() + (countdownDuration * 60 * 60 * 1000); // Add countdown duration
                updateCountdown();
                interval = setInterval(updateCountdown, 1000);
                countdownElement.classList.add("running");
                document.getElementById("start-button").disabled = true;
                document.getElementById("stop-button").disabled = false;
            }

            function stopCountdown() {
                clearInterval(interval);
                countdownElement.innerHTML = "Election countdown stopped.";
                document.getElementById("start-button").disabled = false;
                document.getElementById("stop-button").disabled = true;
            }

            const startButton = document.getElementById("start-button");
            startButton.addEventListener("click", startCountdown);

            const stopButton = document.getElementById("stop-button");
            stopButton.addEventListener("click", stopCountdown);

            const setElectionButton = document.getElementById("set-election-button");
            setElectionButton.addEventListener("click", function () {
                const adminElectionDate = document.getElementById("admin-election-date").value;
                const durationInput = document.getElementById("countdown-duration").value;
                if (!adminElectionDate || durationInput <= 0) {
                    alert("Please enter a valid election date and a positive countdown duration.");
                    return;
                }
                electionDate = new Date(adminElectionDate).getTime();
                countdownDuration = parseFloat(durationInput);
                countdownElement.innerHTML = `Election starts now: 0h 0m 0s`;
                clearInterval(interval);
                document.getElementById("start-button").disabled = false;
                document.getElementById("stop-button").disabled = true;
            });
        });
    </script>
</body>
</html>
