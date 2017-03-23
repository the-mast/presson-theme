(function(doc){
	var commentsBtn = doc.getElementById('comments-btn');
	var commentsSection = doc.getElementById('comments');
	var showCommentsText;

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

})(document);
