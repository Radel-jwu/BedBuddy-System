@vite('resources/css/app.css')

<div class="max-h-screen max-w-screen flex">
  <div class="w-1/2">
      <x-landing_page />
  </div>

  <div class="w-1/2 flex items-center justify-center">
    <div class="w-100 h-screen py-2">
      <div class="flex justify-end">
          <a href="/">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
              </svg>
          </a>
      </div>

      <h1 class="text-4xl font-medium w-100 text-center p-4">Are you a?</h1>

      <!-- Seeker -->
      <div id="seeker" class="cursor-pointer w-100 text-center mx-auto my-2 p-4 shadow-lg rounded-lg text-blue-600 border border-gray-600 hover:bg-blue-600 hover:text-white transition">
        <img src="{{ asset('images/seeker.png') }}" alt="Room Image" class="w-35 mx-auto my-3">
        <span class="text-2xl font-medium">Seeker</span>
      </div>

      <!-- Provider -->
      <div id="provider" class="cursor-pointer w-100 mx-auto my-2 p-4 text-center rounded-lg border text-blue-600 border-gray-600 hover:bg-blue-600 hover:text-white transition">
        <img src="{{ asset('images/provider.png') }}" alt="Room Image" class="w-35 mx-auto my-3">
        <span class="text-2xl font-medium">Provider</span>
      </div>

      <!-- Proceed button -->
      <div class="w-100 mx-auto my-2 text-center">
        <button id="proceedBtn" class="w-100 text-xl bg-gray-400 rounded-lg px-3 py-4 font-bold text-white">PROCEED</button>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript for interaction -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const seeker = document.getElementById('seeker');
    const provider = document.getElementById('provider');
    const proceedBtn = document.getElementById('proceedBtn');

    function activateSelection(selected, other) {
      // Highlight the selected box
      selected.classList.add('bg-blue-600', 'text-white');
      selected.classList.remove('text-blue-600');

      // Remove highlight from the other box
      other.classList.remove('bg-blue-600', 'text-white');
      other.classList.add('text-blue-600');

      // Activate the Proceed button
      proceedBtn.classList.remove('bg-gray-400');
      proceedBtn.classList.add('bg-blue-600', 'hover:bg-blue-700');
    }

    seeker.addEventListener('click', function () {
      activateSelection(seeker, provider);
    });

    provider.addEventListener('click', function () {
      activateSelection(provider, seeker);
    });

    proceedBtn.addEventListener('click', function() {
      //localStorage.setItem("selectRole",)
      window.location.href = "/signup";
    });
  });
</script>
