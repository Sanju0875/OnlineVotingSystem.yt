// Generate random data for the cards
function generateRandomData() {
    const totalVoters = Math.floor(Math.random() * 2000) + 1000;
    const totalCandidates = Math.floor(Math.random() * 20) + 5;
    const totalVotes = Math.floor(Math.random() * 1500) + 500;

    document.getElementById("totalVoters").textContent = totalVoters;
    document.getElementById("totalCandidates").textContent = totalCandidates;
    document.getElementById("totalVotes").textContent = totalVotes;
}

// Call the function to generate initial data
generateRandomData();

// Periodically update the data every 5 seconds (for demonstration purposes)
setInterval(generateRandomData, 5000);
