<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Roommate Preference Survey</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

  <form action="{{ route('roommate.preferences.save') }}" method="POST" class="w-full max-w-lg bg-white shadow-xl p-8 rounded-2xl">
      @csrf
      <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
        🏠 What type are you ?
      </h2>

      <!-- Gender Preference -->
      <label class="block text-gray-700 font-medium mb-2">
        What gender do you prefer as a roommate?
      </label>
      <select name="gender_preference" class="w-full p-3 border rounded-lg mb-4 focus:ring-2 focus:ring-blue-500">
          <option value="any">No Preference</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
      </select>

      <!-- Lifestyle -->
      <!-- Night Owl -->
      <input type="hidden" name="night_owl" value="0">
      <label class="flex items-center gap-2">
          <input type="checkbox" name="night_owl" value="1" class="h-4 w-4 text-blue-600">
          <span>Are you a Night Owl?</span>
      </label>

      <!-- Pets -->
      <input type="hidden" name="pets" value="0">
      <label class="flex items-center gap-2">
          <input type="checkbox" name="pets" value="1" class="h-4 w-4 text-blue-600">
          <span>Do you have pets?</span>
      </label>

      <!-- Smoking -->
      <input type="hidden" name="smoking" value="0">
      <label class="flex items-center gap-2">
          <input type="checkbox" name="smoking" value="1" class="h-4 w-4 text-blue-600">
          <span>Do you smoke?</span>
      </label>

      <!-- Age -->
      <label class="block text-gray-700 font-medium mb-2">Preferred Roommate Age</label>
      <div class="flex space-x-3 mb-4">
          <input type="number" name="min_age" placeholder="Min Age"
                 class="w-1/2 p-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
          <input type="number" name="max_age" placeholder="Max Age"
                 class="w-1/2 p-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
      </div>

      <!-- Budget -->
      <label class="block text-gray-700 font-medium mb-2">Budget Range (₱)</label>
      <div class="flex space-x-3 mb-4">
          <input type="number" name="budget_min" placeholder="Min"
                 class="w-1/2 p-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
          <input type="number" name="budget_max" placeholder="Max"
                 class="w-1/2 p-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
      </div>

      <!-- Location -->
      <label class="block text-gray-700 font-medium mb-2">Preferred Location</label>
      <input type="text" name="location" placeholder="Ex: IT Park, Lahug"
             class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 mb-6">

      <button type="submit"
              class="w-full bg-blue-600 hover:bg-blue-700 transition duration-200 text-white py-3 rounded-lg font-semibold">
          💾 Save My Preferences
      </button>
  </form>

</body>
</html>
