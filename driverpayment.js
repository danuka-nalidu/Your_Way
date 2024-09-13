// Retrieve elements from the DOM
const paymentTable = document.getElementById('payment-table');
const totalEarnings = document.getElementById('total-earnings-amount');
const driverIdSpan = document.getElementById('driver-id');
const paymentMethodInput = document.getElementById('payment-method');
const bankAccountInput = document.getElementById('bank-account');
const accountHolderInput = document.getElementById('account-holder');

// Initialize total earnings
let totalEarningsAmount = 0.00;

// Function to update the total earnings
function updateTotalEarnings() {
  totalEarnings.textContent = '$' + totalEarningsAmount.toFixed(2);
}

// Event listener for updating payment information
document.getElementById('payment-info').addEventListener('input', function() {
  const paymentMethod = paymentMethodInput.value;
  const bankAccount = bankAccountInput.value;
  const accountHolder = accountHolderInput.value;

  // Update payment information
  document.getElementById('payment-method').textContent = paymentMethod;
  document.getElementById('bank-account').textContent = bankAccount;
  document.getElementById('account-holder').textContent = accountHolder;
});
