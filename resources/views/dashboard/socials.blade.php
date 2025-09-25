@php
  $posts = $posts ?? collect();
@endphp
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Socials</title>
  @vite('resources/css/app.css')
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 font-sans" x-data="{ open: false, show: false, img: '' }">
  <x-navbar></x-navbar>

  <div class="flex justify-center mt-20">
    <div class="w-full max-w-2xl">

      <!-- Header Buttons -->
      <div class="flex justify-center gap-4 mb-6">
        <button @click="open = true"
          class="px-4 py-2 border border-blue-500 text-blue-500 rounded hover:bg-blue-50 transition">
          Create Post
        </button>
        <button class="px-4 py-2 border border-blue-500 text-blue-500 rounded hover:bg-blue-50 transition">
          Create Discussion
        </button>
        <a href="/dashboard/social">
          <button class="px-4 py-2 border border-blue-500 text-blue-500 rounded hover:bg-blue-50 transition">
          Messages
          </button>
        </a>
      </div>

      <!-- Post Modal -->
      <div x-show="open" x-transition
           class="fixed inset-0 flex items-center justify-center z-50 bg-black/30">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-lg relative">

          <!-- Header -->
          <div class="flex justify-between items-center border-b px-4 py-3">
            <h2 class="text-lg font-semibold">Create post</h2>
            <button @click="open = false" class="text-gray-500 hover:text-black">✕</button>
          </div>

          <!-- User Info -->
          <div class="flex items-center px-4 py-3">
            <img src="{{ Auth::user()->profile_pic 
                          ? asset('storage/' . Auth::user()->profile_pic) 
                          : 'https://via.placeholder.com/40' }}"
                 class="w-10 h-10 rounded-full mr-3">
            <div>
              <p class="font-semibold text-sm">
                {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
              </p>
              <select class="text-xs border rounded px-1 py-0.5 text-gray-600">
                <option>Public</option>
                <option>Friends</option>
                <option>Only me</option>
              </select>
            </div>
          </div>

          <!-- Post Form -->
          <form action="{{ route('socials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="px-4">
              <textarea name="content" rows="4"
                class="w-full p-2 text-sm border-0 focus:ring-0 resize-none"
                placeholder="What's on your mind, {{ Auth::user()->firstname }}?"></textarea>
            </div>

            <!-- Media Upload -->
            <div class="px-4 py-3">
              <label class="flex flex-col items-center justify-center border-2 border-dashed border-gray-300 rounded-lg p-4 cursor-pointer hover:bg-gray-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M3 5h18M3 12h18M3 19h18" />
                </svg>
                <span class="text-sm text-gray-600">Add photos/videos</span>
                <input type="file" name="images[]" multiple class="hidden">
              </label>
            </div>

            <!-- Actions -->
            <div class="px-4 py-3 border-t">
              <button type="submit"
                class="w-full bg-blue-500 text-white font-semibold py-2 rounded-lg hover:bg-blue-600">
                Post
              </button>
            </div>
          </form>

        </div>
      </div>

      <!-- Dynamic Posts -->
      @forelse($posts as $post)
        <div class="bg-white border rounded-lg shadow-md mt-8">

          <!-- User Info -->
          <div class="flex items-center p-4">
            <img src="{{ $post->user->profile_pic 
                        ? asset('images/' . $post->user->profile_pic) 
                        : 'https://via.placeholder.com/40' }}" 
                 class="w-10 h-10 rounded-full mr-3">
            <div>
              <p class="font-semibold text-sm">
                {{ $post->user->firstname }} {{ $post->user->lastname }}
              </p>
              <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
            </div>
          </div>

          <!-- Content -->
          <div class="px-4 pb-2">
            <p class="text-sm mb-2">{{ $post->content }}</p>
            @if($post->hashtags)
              <div class="text-blue-500 text-sm space-x-2 mb-2">
                @foreach(explode(',', $post->hashtags) as $tag)
                  <span>#{{ trim($tag) }}</span>
                @endforeach
              </div>
            @endif
          </div>

          <!-- Images -->
          @if($post->images->count() > 0)
            <div class="grid {{ $post->images->count() == 1 ? 'grid-cols-1' : 'grid-cols-2' }} gap-1">
              @foreach ($post->images as $img)
                <img src="{{ asset($img->image_path) }}" 
                     class="w-full h-72 object-cover cursor-pointer"
                     @click="show = true; img = '{{ asset($img->image_path) }}'">
              @endforeach
            </div>
          @endif

          <!-- Actions -->
          <div class="flex justify-between items-center px-4 py-2 border-t text-gray-600 text-sm">
            <button class="flex items-center gap-1 hover:text-blue-500">👍 Like</button>
            <button class="flex items-center gap-1 hover:text-blue-500">💬 Comment</button>
            <button class="flex items-center gap-1 hover:text-blue-500">↗️ Share</button>
          </div>
        </div>
      @empty
        <p class="text-center text-gray-500 mt-6">No posts yet. Be the first to post!</p>
      @endforelse

    </div>
  </div>

  <!-- Fullscreen Image Viewer -->
  <div x-show="show" class="fixed inset-0 bg-black/80 flex items-center justify-center z-50">
    <img :src="img" class="max-h-[90vh] max-w-[90vw] rounded-lg shadow-lg">
    <button @click="show = false" class="absolute top-5 right-5 text-white text-3xl">✕</button>
  </div>
</body>
</html>
