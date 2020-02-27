var postId = 0;
var postBodyElement = null;

$('.post').find('.interaction').find('.edit-post').on('click', function(event) {
    event.preventDefault();

    var postBody = event.target.parentNode.parentNode.childNodes[1].textContent;
    postid = event.target.parentNode.parentNode.dataset['postid'];

    postBodyElement = event.target.parentNode.parentNode.childNodes[1];
    $('#modal-post-body').val(postBody);

    var postedBy = event.target.parentNode.parentNode.childNodes[3].textContent;
    $('#postedBy').val(postedBy);

    $('#edit-modal').modal();
});

$('#modal-save').on('click', function() {
    $.ajax({
            method: 'POST',
            url: url,
            data: { body: $('#modal-post-body').val(), postId: postid, _token: token }
        })
        .done(function(msg) {
            $(postBodyElement).text(msg['new_body']);
            $('#edit-modal').modal('hide');
        });
});

$('.like').on('click', function(event) {
    event.preventDefault();
    postId = event.target.parentNode.parentNode.dataset['postid'];
    var isLike = event.target.previousElementSibling == null;
    $.ajax({
            method: 'POST',
            url: urlLike,
            data: { isLike: isLike, postId: postId, _token: token }
        })
        .done(function() {
            event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You don\'t like this post' : 'Dislike';
            if (isLike) {
                event.target.nextElementSibling.innerText = 'Dislike';
            } else {
                event.target.previousElementSibling.innerText = 'Like';
            }
        });
});