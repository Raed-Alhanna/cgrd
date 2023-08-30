function populateForm(articleId, title, description) {
  //console.log(description);

  // Populate form fields with the article details
  document.getElementById('article-id').value = articleId;
  document.getElementById('title').value = title;
  document.getElementById('description').value = description;
  document.getElementById('form-label').innerHTML = 'Edit News';
  document.getElementById('form-submit').value = 'Update Article';
  document.getElementById('form-cancel').style.display = 'inline';

 
  document.querySelector('.form-container').scrollIntoView();
  document.getElementById('form-submit').name = 'update-article';
  document.getElementById('form-submit').innerHTML = "Edit";
}

// Return to Create mode
function returnToCreateMode() {
  document.getElementById('article-id').value = '';
  document.getElementById('title').value = '';
  document.getElementById('description').value = '';
  document.getElementById('form-label').innerHTML = 'Create News';
  document.getElementById('form-submit').value = 'Save Article';
  document.getElementById('form-cancel').style.display = 'none';

  document.getElementById('form-submit').name = 'create-article';
  document.getElementById('form-submit').innerHTML = "Save";
}
/*function deleteArticle(){
  document.getElementById('delete-form').submit();
}*/