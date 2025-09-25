<div class="bg-white rounded-lg p-6 shadow-sm max-w-2xl mx-auto">
  <!-- Comments Container -->
  <div class="space-y-6">

    <!-- Comment Item -->
    <div class="space-y-4">
      <!-- Primary Comment -->
      <div x-data="{ show: false }" class="flex items-start space-x-4">
        <img src="{{ asset('images/avatar1.jpg') }}" alt="Avatar" class="w-10 h-10 rounded-full object-cover">

        <div>
          <div class="flex items-center gap-2">
            <p class="font-semibold">Maria Clara Lopez</p>
            <span class="text-sm text-gray-500">• 1 day ago</span>
          </div>
          <p class="text-sm text-gray-700 mt-1 leading-relaxed">
            Leaving this review with a heavy heart! My two years...
            <button @click="show = true" class="text-blue-600 hover:underline text-sm ml-1">See more</button>
          </p>

          <!-- Modal -->
          <div x-show="show"
               x-transition
               class="fixed inset-0 z-50 flex items-center justify-center backdrop-blur-sm bg-black/10">
            <div @click.away="show = false"
                 class="bg-white rounded-lg p-6 max-w-md w-full shadow-lg relative">
              <button @click="show = false"
                      class="absolute top-2 right-3 text-gray-500 hover:text-gray-700 text-xl">&times;</button>
              <h3 class="text-lg font-semibold mb-2">Full Review by Maria Clara Lopez</h3>
              <p class="text-sm text-gray-700 leading-relaxed">
                Leaving this review with a heavy heart! My two years at this apartment were truly wonderful. The unit was always immaculately clean upon move-in, and the landlady, Aling Nena, was incredibly kind and responsive to any concerns. It's a very peaceful building, perfect for someone who values a quiet home after a long day. Highly recommend for its cleanliness, calm environment, and the warm, accommodating service. It truly felt like a home.
              </p>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
