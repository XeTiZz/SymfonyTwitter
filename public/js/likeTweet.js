// Sélectionner tous les liens "like"
const likeLinks = document.querySelectorAll('.like-link');

likeLinks.forEach(link => {
  link.addEventListener('click', function(event) {
    event.preventDefault();

    const postId = link.dataset.postId;
    const action = link.dataset.action;

    const url = likePostUrl.replace(/__id__/, encodeURIComponent(postId)) + '?action=' + encodeURIComponent(action);

    window.location.href = url;
  });
});

// Sélectionner tous les liens "unlike"
const unlikeLinks = document.querySelectorAll('.unlike-link');

unlikeLinks.forEach(link => {
  link.addEventListener('click', function(event) {
    event.preventDefault();

    const postId = link.dataset.postId;
    const action = link.dataset.action;

    const url = unlikePostUrl.replace(/__id__/, encodeURIComponent(postId)) + '?action=' + encodeURIComponent(action);

    window.location.href = url;
  });
});
