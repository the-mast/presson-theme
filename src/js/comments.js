(function(doc){
	var commentsBtn = doc.getElementById('comment-btn');
	var commentsSection = doc.getElementById('comments');
	var showCommentsText;

	if (commentsBtn != null) {
		commentsBtn.onclick = function(){
			if (commentsSection.classList.contains('hidden')){
				commentsSection.classList.remove('hidden');

				showCommentsText = commentsBtn.textContent;
				commentsBtn.textContent = 'Hide Comments';
			}
			else {
				commentsSection.classList.add('hidden');
				commentsBtn.textContent = showCommentsText;
			}
		};
	};

})(document);
