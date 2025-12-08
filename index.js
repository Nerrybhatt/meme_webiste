// <!-- <script>
//         // State management
//         let currentPostId = null;
//         let postStates = {};

//         // Initialize post states
//         for (let i = 1; i <= 6; i++) {
//             postStates[i] = {
//                 liked: false,
//                 disliked: false,
//                 saved: false,
//                 comments: []
//             };
//         }

//         // Mobile menu toggle
//         function toggleMobileMenu() {
//             const navLinks = document.getElementById('navLinks');
//             navLinks.classList.toggle('active');
//         }

//         // Search functionality
//         function handleSearch(event) {
//             if (event.key === 'Enter') {
//                 performSearch();
//             }
//         }

//         function performSearch() {
//             const query = document.getElementById('searchInput').value.trim();
//             if (query) {
//                 showNotification(`Searching for: "${query}"`);
//                 // Here you would implement actual search logic
//             }
//         }

//         // Filter content
//         function filterContent(type) {
//             showNotification(`Filtering by: ${type}`);
//             // Here you would implement filtering logic
//         }

//         function filterByCategory(category) {
//             showNotification(`Showing ${category} memes`);
//             // Scroll to posts
//             document.getElementById('postsContainer').scrollIntoView({ behavior: 'smooth' });
//         }

//         function searchByTag(tag) {
//             document.getElementById('searchInput').value = tag;
//             showNotification(`Searching for tag: #${tag}`);
//             performSearch();
//         }

//         // Post interactions
//         function toggleLike(postId) {
//             const state = postStates[postId];
//             const likeBtn = document.getElementById(`like-${postId}`);
//             const dislikeBtn = document.getElementById(`dislike-${postId}`);

//             if (state.disliked) {
//                 state.disliked = false;
//                 dislikeBtn.classList.remove('active');
//             }

//             state.liked = !state.liked;
//             likeBtn.classList.toggle('active', state.liked);

//             showNotification(state.liked ? 'Liked!' : 'Like removed');
//         }

//         function toggleDislike(postId) {
//             const state = postStates[postId];
//             const likeBtn = document.getElementById(`like-${postId}`);
//             const dislikeBtn = document.getElementById(`dislike-${postId}`);

//             if (state.liked) {
//                 state.liked = false;
//                 likeBtn.classList.remove('active');
//             }

//             state.disliked = !state.disliked;
//             dislikeBtn.classList.toggle('active', state.disliked);

//             showNotification(state.disliked ? 'Disliked!' : 'Dislike removed');
//         }

//         function toggleSave(postId) {
//             const state = postStates[postId];
//             const saveBtn = document.getElementById(`save-${postId}`);

//             state.saved = !state.saved;
//             saveBtn.classList.toggle('active', state.saved);

//             if (state.saved) {
//                 saveBtn.innerHTML = '<span>❤️</span> Saved';
//             } else {
//                 saveBtn.innerHTML = '<span>💾</span> Save';
//             }

//             showNotification(state.saved ? 'Meme saved!' : 'Meme unsaved');
//         } -->