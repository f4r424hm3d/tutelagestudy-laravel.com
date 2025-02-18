<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Currency Converter</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <h2>Currency Converter</h2>

  <form id="currencyForm">
    <label>From Currency:</label>
    <select id="from" name="from" required>
      <option value="">Loading...</option>
    </select>

    <label>To Currency:</label>
    <select id="to" name="to" required>
      <option value="">Loading...</option>
    </select>

    <label>Amount:</label>
    <input type="number" id="amount" name="amount" step="0.01" required>

    <button type="submit">Convert</button>
  </form>

  <h3>Converted Amount: <span id="convertedAmount"></span></h3>

  <script>
    $(document).ready(function() {
      // Fetch Google-supported currencies dynamically
      $.ajax({
        url: "/currencies",
        type: "GET",
        success: function(response) {
          let options = '<option value="">Select Currency</option>';
          response.forEach(currency => {
            options += `<option value="${currency.code}">${currency.name} (${currency.code})</option>`;
          });

          $("#from, #to").html(options);
        },
        error: function() {
          alert("Failed to load currency list.");
        }
      });

      // Handle conversion form submission
      $("#currencyForm").submit(function(event) {
        event.preventDefault();

        $.ajax({
          url: "/convert-currency",
          type: "GET",
          data: $(this).serialize(),
          success: function(response) {
            if (response.success) {
              $("#convertedAmount").text(response.converted_amount + " " + $("#to").val().toUpperCase());
            } else {
              alert(response.message);
            }
          },
          error: function() {
            alert("Conversion failed. Please check your input.");
          }
        });
      });
    });
  </script>
</body>

</html>
