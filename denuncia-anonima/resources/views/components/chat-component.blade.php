<!-- Chat Modal -->
<div id="chatModal" class="chat-modal-container hidden fixed top-0 right-0 w-full h-full bg-gray-900 bg-opacity-50 z-50">
    <div
        class="chat-box fixed right-0 bottom-0 w-96 h-96 bg-white shadow-lg p-4 rounded-tl-lg transition-transform duration-300 transform translate-x-full">
        <div class="chat-header flex justify-between items-center mb-4">
            <h3 class="text-xl font-semibold">Chat</h3>
            <button class="close-chat-button text-red-500 hover:text-red-600 font-bold text-xl">&times;</button>
        </div>
        <div class="chat-body h-64 overflow-y-auto bg-gray-100 p-2 mb-4">
            <!-- Chat messages will be dynamically loaded here -->
            <p class="text-sm text-gray-500">No messages yet.</p>
        </div>
        <div class="chat-footer flex items-center">
            <input type="text" class="chat-input flex-grow p-2 border border-gray-300 rounded-lg"
                placeholder="Type a message...">
            <button class="send-message-button bg-blue-500 text-white p-2 rounded-lg ml-2">Send</button>
        </div>
    </div>
</div>

<!-- Floating Button -->
<button id="openChatButton"
    class="fixed bottom-5 right-5 bg-blue-500 text-white p-4 rounded-full shadow-lg hover:bg-blue-600">
    Chat
</button>

<!-- Styles -->
<style>
    .chat-box {
        max-width: 100%;
        max-height: 100%;
    }

    .chat-modal-container.active .chat-box {
        transform: translateX(0);
    }
</style>

<!-- JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const chatModal = document.getElementById('chatModal');
        const openChatButton = document.getElementById('openChatButton');
        const closeChatButton = document.querySelector('.close-chat-button');

        // Open chat modal
        openChatButton.addEventListener('click', function() {
            chatModal.classList.remove('hidden');
            setTimeout(() => chatModal.classList.add('active'), 100); // Trigger the animation
        });

        // Close chat modal
        closeChatButton.addEventListener('click', function() {
            chatModal.classList.remove('active');
            setTimeout(() => chatModal.classList.add('hidden'),
            300); // Delay hiding the modal to allow for animation
        });
    });
</script>
