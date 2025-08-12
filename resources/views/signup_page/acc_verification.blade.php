@vite('resources/css/app.css')

<div class="max-h-screen max-w-screen flex">
  <div class="w-1/2">
    <x-landing_page />
  </div>

  <div class="w-1/2 flex items-center justify-center">
    <div class="w-100 h-screen py-2">
      <!-- Your existing header -->
      <div class="flex justify-end">
      
        <a href="/">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-10">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
          </svg>
        </a>
      </div>

      <h1 class="text-4xl font-medium w-100 text-center p-4">Account <br>verification</h1>

      <!-- Verification Layout -->
      <div class="w-full max-w-md mx-auto px-4">
        <div class="flex items-center justify-between mb-10 relative">
  <div class="absolute left-0 right-0 top-1/2 transform -translate-y-1/2 h-1 bg-blue-500"></div>

  <!-- Step 1 -->
  <div class="z-10 flex flex-col items-center">
    <div id="step1" class="w-8 h-8 bg-blue-500 text-white flex items-center justify-center rounded-full">1</div>
    <span id="step1Status" class="text-xs text-blue-500 mt-1 h-4"></span>
  </div>

  <!-- Step 2 -->
  <div class="z-10 flex flex-col items-center">
    <div id="step2" class="w-8 h-8 bg-blue-500 text-white flex items-center justify-center rounded-full">2</div>
    <span id="step2Status" class="text-xs text-blue-500 mt-1 h-4"></span>
  </div>

  <!-- Step 3 -->
  <div class="z-10 flex flex-col items-center">
    <div id="step3" class="w-8 h-8 bg-blue-500 text-white flex items-center justify-center rounded-full">3</div>
    <span id="step3Status" class="text-xs text-blue-500 mt-1 h-4"></span>
  </div>
</div>

        <!-- Verification Cards -->
        <div class="space-y-4">
        <div id="emailCard" class="bg-white shadow-md rounded-lg p-6">
            <p class="text-gray-700 mb-3">Verify your email address...</p>
            <button id="verifyEmailBtn" class="w-full bg-blue-600 text-white py-3 rounded hover:bg-blue-700 transition">Verify</button>
        </div>

        <div id="phoneCard" class="bg-white shadow-md rounded-lg p-6">
            <p class="text-gray-700 mb-3">Verify your mobile number...</p>
            <button id="verifyPhoneBtn" class="w-full bg-blue-600 text-white py-3 rounded hover:bg-blue-700 transition">Verify</button>
        </div>
        </div>

        <!-- Proceed Button -->
        <div class="mt-6 py-6">
        <button id="proceedBtn" class="w-full bg-gray-400 text-white py-3 rounded cursor-not-allowed" disabled>Proceed</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const verifyEmailBtn = document.getElementById('verifyEmailBtn');
    const verifyPhoneBtn = document.getElementById('verifyPhoneBtn');
    const emailCard = document.getElementById('emailCard');
    const phoneCard = document.getElementById('phoneCard');
    const step1 = document.getElementById('step1');
    const step2 = document.getElementById('step2');
    const step3 = document.getElementById('step3');
    const proceedBtn = document.getElementById('proceedBtn');

    let emailVerified = false;
    let phoneVerified = false;

    // Dynamically show "In progress" under the appropriate step
    function updateStepProgress() {
      // Remove all "In progress" labels
      [step1, step2, step3].forEach(step => {
        const progressText = step.parentElement.querySelector('span');
        if (progressText) progressText.remove();
      });

      // Add "In progress" to the next incomplete step
      if (!emailVerified) {
        const span = document.createElement('span');
        span.className = "text-xs text-blue-500 mt-1";
        span.innerText = "In progress";
        step1.parentElement.appendChild(span);
      } else if (!phoneVerified) {
        const span = document.createElement('span');
        span.className = "text-xs text-blue-500 mt-1";
        span.innerText = "In progress";
        step2.parentElement.appendChild(span);
      } else {
        const span = document.createElement('span');
        span.className = "text-xs text-blue-500 mt-1";
        span.innerText = "In progress";
        step3.parentElement.appendChild(span);
      }
    }

    function checkBothVerified() {
      if (emailVerified && phoneVerified) {
        proceedBtn.disabled = false;
        proceedBtn.classList.remove('bg-gray-400', 'cursor-not-allowed');
        proceedBtn.classList.add('bg-blue-600', 'hover:bg-blue-700');
      }
      updateStepProgress();
    }

    verifyEmailBtn.addEventListener('click', function () {
      emailVerified = true;

      verifyEmailBtn.disabled = true;
      verifyEmailBtn.classList.remove('bg-blue-600', 'hover:bg-blue-700');
      verifyEmailBtn.classList.add('bg-gray-400', 'cursor-not-allowed');

      step1.innerHTML = '✔';
      step1.classList.add('bg-gray-600');

      emailCard.querySelector('p').classList.add('text-gray-400');

      checkBothVerified();
    });

    verifyPhoneBtn.addEventListener('click', function () {
      phoneVerified = true;

      verifyPhoneBtn.disabled = true;
      verifyPhoneBtn.classList.remove('bg-blue-600', 'hover:bg-blue-700');
      verifyPhoneBtn.classList.add('bg-gray-400', 'cursor-not-allowed');

      step2.innerHTML = '✔';
      step2.classList.add('bg-gray-600');

      phoneCard.querySelector('p').classList.add('text-gray-400');

      checkBothVerified();

      proceedBtn.addEventListener('click', function () {
        window.location.href = "/login";
      });
    });

    // Initial render
    updateStepProgress();
  });
</script>