document.addEventListener("DOMContentLoaded", function () {
    fetch("/data/exchangeRates.json")
        .then(response => response.json())
        .then(data => {
            console.log("Loaded exchange rates:", data); // Debug

            const exchangeRates = data.exchangeRates; // 👈 Pristupamo pravom nizu
            
            if (!Array.isArray(exchangeRates)) {
                throw new Error("exchangeRates is not an array");
            }

            const tableBody = document.querySelector("#exchange-rate-table tbody");
            const fromCurrencySelect = document.getElementById("from-currency");
            const toCurrencySelect = document.getElementById("to-currency");

            exchangeRates.forEach(rate => {
                const row = document.createElement("tr");

                const currencyCell = document.createElement("td");
                currencyCell.textContent = rate.currency;
                row.appendChild(currencyCell);

                const buyRateCell = document.createElement("td");
                buyRateCell.textContent = rate.buyRate.toFixed(2);
                row.appendChild(buyRateCell);

                const sellRateCell = document.createElement("td");
                sellRateCell.textContent = rate.sellRate.toFixed(2);
                row.appendChild(sellRateCell);

                tableBody.appendChild(row);

                const optionFrom = document.createElement("option");
                optionFrom.value = rate.currency;
                optionFrom.textContent = rate.currency;
                fromCurrencySelect.appendChild(optionFrom);

                const optionTo = document.createElement("option");
                optionTo.value = rate.currency;
                optionTo.textContent = rate.currency;
                toCurrencySelect.appendChild(optionTo);
            });

            // Event listener za konverziju
            document.getElementById("currency-converter-form").addEventListener("submit", function (e) {
                e.preventDefault();

                const amount = parseFloat(document.getElementById("amount").value);
                const fromCurrency = document.getElementById("from-currency").value;
                const toCurrency = document.getElementById("to-currency").value;

                if (isNaN(amount) || amount <= 0) {
                    alert("Please enter a valid amount.");
                    return;
                }

                const fromRate = exchangeRates.find(rate => rate.currency === fromCurrency);
                const toRate = exchangeRates.find(rate => rate.currency === toCurrency);

                if (!fromRate || !toRate) {
                    alert("No currencies found.");
                    return;
                }

                // Konverzija
                const convertedAmount = (amount * fromRate.sellRate) / toRate.buyRate;
                document.getElementById("conversion-result").textContent =
                    `${amount} ${fromCurrency} je ${convertedAmount.toFixed(2)} ${toCurrency}`;
            });
        })
        .catch(error => console.error("Error loading exchange rates:", error));
});
