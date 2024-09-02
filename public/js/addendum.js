/* SHOW PASSWORD TOGGLE */

function showPassword() {
    var x = document.getElementById("pw-field");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

/* FACILITY RESERVATION DURATION FEE */

// Base fee
const baseFee = 1000;
const feePerHour = 100; // Incremental fee per hour
const feePerDay = 500; // Incremental fee per day

// Function to calculate the fee
function calculateFee() {
    const startDate = document.getElementById('start-date').value;
    const endDate = document.getElementById('end-date').value;
    const startTime = document.getElementById('start-time').value;
    const endTime = document.getElementById('end-time').value;
    const formFeeElement = document.getElementById('form-fee');

    // Ensure all fields are filled before calculating
    if (startDate && endDate && startTime && endTime) {
        const startDateTime = new Date(`${startDate}T${startTime}`);
        const endDateTime = new Date(`${endDate}T${endTime}`);

        // Calculate the difference in time
        const timeDifference = endDateTime - startDateTime;

        if (timeDifference > 0) {
            const hoursDifference = timeDifference / (1000 * 60 * 60);
            const daysDifference = Math.floor(hoursDifference / 24);

            // Calculate total fee
            const totalFee = baseFee + (daysDifference * feePerDay) + (hoursDifference * feePerHour);

            // Update the fee in the form
            formFeeElement.innerHTML = `Fee: <span class="font-weight-bold text-success">₱${totalFee.toFixed(2)}</span>`;
        } else {
            // If the end date/time is before the start date/time, reset fee display
            formFeeElement.innerHTML = '';
        }
    } else {
        // If not all fields are filled, clear the fee display
        formFeeElement.innerHTML = '';
    }
}

    // Attach event listeners to input fields
    document.getElementById('start-date').addEventListener('input', calculateFee);
    document.getElementById('end-date').addEventListener('input', calculateFee);
    document.getElementById('start-time').addEventListener('input', calculateFee);
    document.getElementById('end-time').addEventListener('input', calculateFee);

/* PAYMENT COLLECTOR W/ CORRESPONDING QR CODE */

document.getElementById('collector-select').addEventListener('change', function() {
    const selectedCollector = this.value;
    const qrCodeContainer = document.getElementById('qr-code-container');

    // Clear any existing QR code
    qrCodeContainer.innerHTML = '';

    let qrCodeSrc = '';

    // Determine the correct QR code image based on the selected collector
    switch(selectedCollector) {
        case 'John Doe':
            qrCodeSrc = 'img/gcash-qr-1.png';
            break;
        case 'Jane Doe':
            qrCodeSrc = 'img/gcash-qr-2.png';
            break;
        case 'Michael Smith':
            qrCodeSrc = 'img/gcash-qr-3.png';
            break;
        case 'Mary Smith':
            qrCodeSrc = 'img/gcash-qr-4.png';
            break;
        default:
            qrCodeSrc = ''; // Optional: No QR code if no valid selection
    }

    // Create a new img element if a valid QR code is found
    if (qrCodeSrc) {
        const qrCodeImage = document.createElement('img');
        qrCodeImage.src = qrCodeSrc;
        qrCodeImage.className = 'img-fluid mt-3 mb-4'; // Apply your desired classes
        qrCodeImage.alt = 'GCash QR Code';

        // Append the image to the container
        qrCodeContainer.appendChild(qrCodeImage);
    }
});

/* MODE OF PAYMENT */

function togglePaymentOptions() {
    const onsiteCheckbox = document.getElementById('onsite');
    const gcashCheckbox = document.getElementById('gcash');
    const appointmentDate = document.getElementById('appointment-date');
    const appointmentTime = document.getElementById('appointment-time');
    const collectorSelect = document.getElementById('collector-select');
    const qrCodeContainer = document.getElementById('qr-code-container');
    const uploadDesc = document.getElementById('upload-desc');
    const uploadInputDiv = document.getElementById('upload-input-div');

    if (onsiteCheckbox.checked) {
        // On-site payment selected
        appointmentDate.disabled = false;
        appointmentTime.disabled = false;
        collectorSelect.disabled = true;
        qrCodeContainer.innerHTML = ''; // Clear QR code
        uploadDesc.style.display = 'none'; // Hide the description
        uploadInputDiv.style.display = 'none'; // Hide the upload input
    } else if (gcashCheckbox.checked) {
        // GCash payment selected
        appointmentDate.disabled = true;
        appointmentTime.disabled = true;
        collectorSelect.disabled = false;
        uploadDesc.style.display = 'block'; // Show the description
        uploadInputDiv.style.display = 'block'; // Show the upload input
    } else {
        // Neither payment option selected
        appointmentDate.disabled = true;
        appointmentTime.disabled = true;
        collectorSelect.disabled = true;
        qrCodeContainer.innerHTML = ''; // Clear QR code
        uploadDesc.style.display = 'none'; // Hide the description
        uploadInputDiv.style.display = 'none'; // Hide the upload input
    }
}

// Initialize form with all fields disabled
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('appointment-date').disabled = true;
    document.getElementById('appointment-time').disabled = true;
    document.getElementById('collector-select').disabled = true;

    // Hide the QR code description and upload input initially
    const uploadDesc = document.getElementById('upload-desc');
    const uploadInputDiv = document.getElementById('upload-input-div');
    
    uploadDesc.style.display = 'none';
    uploadInputDiv.style.display = 'none';
});
