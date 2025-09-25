@php
  // Conversations passed from controller
  $conversations = $conversations ?? collect();

  // Format conversations for JSON
  $convJs = [];
  foreach ($conversations as $c) {
      $users = [];
      foreach ($c->users as $u) {
          $users[] = [
              'id' => $u->id,
              'firstname' => $u->firstname ?? ($u->name ?? ''),
              'lastname' => $u->lastname ?? '',
              'profile_pic' => $u->profile_pic ?? null,
          ];
      }

      $messages = [];
      foreach ($c->messages as $m) {
          $messages[] = [
              'id' => $m->id,
              'user_id' => $m->sender_id,  // ✅ use sender_id
              'message' => $m->message,    // ✅ use message column
              'created_at' => $m->created_at?->toDateTimeString(),
              'user' => [
                  'id' => $m->sender?->id ?? $m->sender_id, // assuming relationship sender()
                  'firstname' => $m->sender?->firstname ?? '',
                  'lastname' => $m->sender?->lastname ?? '',
                  'profile_pic' => $m->sender?->profile_pic ?? null,
              ],
          ];
      }

      $convJs[] = [
          'id' => $c->id,
          'users' => $users,
          'messages' => $messages,
          'last_message_time' => $c->messages->first()?->created_at?->diffForHumans(),
      ];
  }

  $conversationsJson = json_encode($convJs);
  $currentUserId = auth()->id();
@endphp

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Messages</title>
  @vite('resources/css/app.css')
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100">
  <x-navbar />

  <main class="flex h-[calc(100vh-64px)] mt-20">

    <!-- Sidebar -->
    <div class="w-1/4 bg-white border-r overflow-y-auto flex flex-col" x-data="sidebar()">
      <div class="p-4 font-bold text-lg border-b">Chats</div>

      <!-- Search -->
      <div class="p-3 relative">
        <input x-model="search" @input.debounce.300="searchUsers"
               type="text" placeholder="Search contacts..."
               class="px-3 py-2 w-full border rounded-full text-sm focus:outline-none focus:ring focus:border-blue-400" />

        <!-- Results -->
        <div class="absolute bg-white border rounded shadow w-full mt-1 z-10" x-show="results.length">
          <template x-for="u in results" :key="u.id">
            <div class="px-3 py-2 flex items-center space-x-2 hover:bg-gray-100 cursor-pointer"
                 @click="startConversation(u)">
              <img :src="u.profile_pic ? '/images/' + u.profile_pic : '/images/default.jpg'"
                   class="w-8 h-8 rounded-full object-cover">
              <span class="text-sm font-medium" x-text="u.firstname + ' ' + u.lastname"></span>
            </div>
          </template>
        </div>
      </div>

      <!-- Conversations -->
      <div class="flex-1 overflow-y-auto">
        <template x-if="!conversations.length">
          <div class="p-4 text-center text-gray-400">No conversations yet</div>
        </template>

        <template x-for="c in filteredConversations()" :key="c.id">
          <div class="flex items-center px-3 py-2 hover:bg-gray-100 cursor-pointer"
               :class="activeConversationId === c.id ? 'bg-blue-50' : ''"
               @click="selectConversation(c)">
            <img :src="c.users.find(u => u.id !== currentUserId)?.profile_pic ? '/images/' + c.users.find(u => u.id !== currentUserId)?.profile_pic : '/images/default.jpg'"
                 class="w-10 h-10 rounded-full object-cover">
            <div class="ml-3 flex-1">
              <div class="text-sm font-semibold truncate" x-text="conversationTitle(c)"></div>
              <div class="text-xs text-gray-500 truncate" x-text="lastMessageText(c)"></div>
            </div>
            <div class="text-xs text-gray-400" x-text="c.last_message_time"></div>
          </div>
        </template>
      </div>
    </div>

    <!-- Chatbox -->
    <div class="flex-1 flex flex-col bg-gray-50" x-data="chatApp()">

      <!-- Header -->
      <div class="flex items-center px-4 py-2 border-b bg-white shadow-sm" x-show="activeConversation">
        <img :src="activeUserPic" class="w-10 h-10 rounded-full object-cover">
        <div class="ml-3">
          <div class="font-semibold text-sm" x-text="activeTitle"></div>
          <div class="text-xs text-gray-500">Active now</div>
        </div>
      </div>

      <!-- Messages -->
      <div class="flex-1 p-4 overflow-y-auto space-y-3" id="messages-container">
        <template x-if="!activeConversation">
          <div class="text-center text-gray-500 mt-10">Select a conversation to start chatting</div>
        </template>

        <template x-for="m in messages" :key="m.id">
          <div class="flex items-end" :class="m.user_id === currentUserId ? 'justify-end' : 'justify-start'">
            <div class="flex items-end space-x-2 max-w-[70%]">
              <img x-show="m.user_id !== currentUserId"
                   :src="m.user?.profile_pic ? '/images/' + m.user.profile_pic : '/images/default.jpg'"
                   class="w-7 h-7 rounded-full object-cover">
              <div>
                <div class="inline-block px-4 py-2 rounded-2xl shadow"
                     :class="m.user_id === currentUserId ? 'bg-blue-500 text-white rounded-br-none' : 'bg-white text-gray-800 border rounded-bl-none'">
                  <div x-text="m.message"></div>

                  <template x-if="m.attachment">
                    <div class="mt-2">
                      <a :href="m.attachment" target="_blank" class="text-sm text-blue-700 underline">📎 Attachment</a>
                    </div>
                  </template>
                </div>
                <div class="text-xs text-gray-400 mt-1" x-text="formatDate(m.created_at)"></div>
              </div>
            </div>
          </div>
        </template>
      </div>

      <!-- Quick replies -->
      <div class="flex space-x-2 px-4 pb-2" x-show="activeConversation">
        <button @click="sendQuick('Hi, I want to inquire about your listing.')"
                class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-1 rounded-full text-xs">I want to inquire</button>
        <button @click="sendQuick('I want to book a schedule.')"
                class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-3 py-1 rounded-full text-xs">I want to book</button>
      </div>

      <!-- Input -->
      <form @submit.prevent="sendMessage" class="flex items-center px-4 py-3 border-t bg-white space-x-2"
            x-show="activeConversation">
        <label class="cursor-pointer text-gray-500 hover:text-blue-500">
          📷 <input type="file" id="attachment" @change="handleFile" class="hidden"/>
        </label>
        <input x-model="text" type="text" placeholder="Write a message..."
               class="flex-1 px-4 py-2 border rounded-full text-sm focus:outline-none focus:ring focus:border-blue-400" />
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-full">➤</button>
      </form>
    </div>

    <!-- Right Panel -->
    <div class="w-1/4 bg-white border-l overflow-y-auto">
      <div class="flex justify-end p-3 border-b">
        <a href="/dashboard/socials">
          <button class="text-white bg-blue-500 hover:bg-blue-600 px-3 py-1 rounded text-sm">Back</button>
        </a>
      </div>
      <div class="flex flex-col items-center mt-6" x-show="activeConversation">
        <img :src="activeUserPic" class="rounded-full w-16 h-16 object-cover shadow">
        <div class="mt-2 font-semibold text-base" x-text="activeTitle"></div>
        <div class="text-sm text-gray-500" x-text="activeRole"></div>
      </div>
    </div>
  </main>

<script>
  const initialConversations = {!! $conversationsJson !!};
  const currentUserId = {!! json_encode($currentUserId) !!};

  function sidebar() {
    return {
      search: '', results: [],
      conversations: initialConversations || [],
      currentUserId, activeConversationId: null,

      async searchUsers() {
        if (this.search.length < 2) { this.results = []; return; }
        try {
          const res = await fetch(`/users/search?q=${encodeURIComponent(this.search)}`);
          this.results = await res.json();
        } catch (e) { console.error(e); }
      },

      startConversation(user) {
        this.results = []; this.search = '';
        let conv = this.conversations.find(c => c.users.some(u => u.id === user.id));
        if (!conv) {
          conv = { id: 'new-' + user.id, users: [{ id: this.currentUserId, firstname: 'You', lastname: '' }, user], messages: [], last_message_time: null };
          this.conversations.unshift(conv);
        }
        this.activeConversationId = conv.id;
        window.dispatchEvent(new CustomEvent('open-conversation', { detail: { conversation: conv } }));
      },

      filteredConversations() {
        if (!this.search) return this.conversations;
        return this.conversations.filter(c =>
          c.users.some(u => ((u.firstname + ' ' + u.lastname) || '').toLowerCase().includes(this.search.toLowerCase()))
        );
      },

      conversationTitle(c) {
        const other = c.users.find(u => u.id !== this.currentUserId);
        return other ? other.firstname + ' ' + other.lastname : 'Group';
      },

      lastMessageText(c) {
        return (c.messages?.length)
          ? (c.messages[c.messages.length - 1].message || 'Attachment')
          : 'No messages yet';
      },

      selectConversation(c) {
        this.activeConversationId = c.id;
        window.dispatchEvent(new CustomEvent('open-conversation', { detail: { conversation: c } }));
      }
    }
  }

  function chatApp() {
  return {
    activeConversation: null,
    activeTitle: '',
    activeUserPic: '/images/default.jpg',
    activeRole: '',
    messages: [],
    text: '',

    init() {
      window.addEventListener('open-conversation', async e => {
        const conv = e.detail.conversation;
        this.activeConversation = conv;

        const other = conv.users.find(u => u.id !== currentUserId);
        if (other) {
          this.activeTitle = `${other.firstname} ${other.lastname}`;
          this.activeUserPic = other.profile_pic
            ? `/images/${other.profile_pic}`
            : '/images/default.jpg';

          // 🔥 Fetch the real messages from backend
          try {
            const res = await fetch(`/messages/conversation/${other.id}`);
            this.messages = await res.json();
          } catch (err) {
            console.error("Failed to load conversation", err);
            this.messages = [];
          }
        }

        this.scrollToBottom();
      });
    },


    formatDate(dt) {
      return dt ? new Date(dt).toLocaleString() : '';
    },

    sendQuick(msg) {
      this.text = msg;
      this.sendMessage();
    },

    async sendMessage() {
        if (!this.text) return;

        const otherUser = this.activeConversation.users.find(
          u => u.id !== currentUserId
        );

        // Optimistic UI update
        const newMsg = {
          id: Date.now(),
          user_id: currentUserId,
          message: this.text,   // ✅ correct
          created_at: new Date().toISOString(),
          user: { id: currentUserId }
        };
        this.messages.push(newMsg);
        this.text = '';
        this.scrollToBottom();

        try {
          const formData = new FormData();
          formData.append('receiver_id', otherUser.id);
          formData.append('message', newMsg.content);

          await fetch('/messages/create', {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: formData
          });

          // 🔥 Refresh from DB so receiver will see correct messages
          const res = await fetch(`/messages/conversation/${otherUser.id}`);
          this.messages = await res.json();
          this.scrollToBottom();

        } catch (e) {
          console.error('Failed to send', e);
        }
      },


    scrollToBottom() {
      this.$nextTick(() => {
        const el = document.getElementById('messages-container');
        if (el) el.scrollTop = el.scrollHeight;
      });
    }
  };
}

</script>
</body>
</html>
