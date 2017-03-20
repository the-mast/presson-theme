(function(doc){
	var commentsBtn = doc.getElementById('comments-btn');
	var commentsSection = doc.getElementById('comments');

	commentsBtn.onclick = function(){
		if (commentsSection.classList.contains('hidden')){
			commentsSection.classList.remove('hidden');
			commentsBtn.textContent = 'Hide Comments';
		}
		else {
			commentsSection.classList.add('hidden');
			commentsBtn.textContent = 'Show Comments';
		}
	};

})(document);
