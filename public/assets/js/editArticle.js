
class Article{
    title;
    description;
    category;
    image;
    constructor(title,description,category,image){
    this.title = title;
    this.description = description;
    this.category = category;
    this.image = image;
    }
}/**@type {HTMLFormElement} createArticleForm*/
const createArticleForm = document.getElementById('create-article-form')
if ( createArticleForm === undefined){
}else{/**@type {HTMLInputElement} titleInput*/
const titleInput = createArticleForm.querySelector('#tiitleInput')
/**@type {HTMLInputElement} articleIdInput*/
const articleId= createArticleForm.querySelector('#article_id')
/**@type {HTMLTextAreaElement} descriptionInput*/
const descriptionInput = createArticleForm.querySelector('#descriptionInput')
/**@type {HTMLSelectElement} categoryInput*/
const categoryInput = createArticleForm.querySelector('#categoryInput')
/**@type {HTMLInputElement} imageInput*/
const imageInput = createArticleForm.querySelector('#imageInput')
/**@type {HTMLImageElement} imagePrewiew*/
const imagePrewiew = createArticleForm.querySelector('#imagePrewiew')
imageInput.onchange = (event)=>{
    const file = imageInput.files[0];
    if(typeof file === 'undefined'){
        imagePrewiew.src= ''
        imagePrewiew.hidden = true
} else{
     imagePrewiew.src= URL.createObjectURL(file)
    imagePrewiew.hidden = false
}
}
function CleanForm(){
        titleInput.value = '';
        descriptionInput.value = '';
        categoryInput.value = null ;
        imageInput.value = null;
        imagePrewiew.src= ''
        imagePrewiew.hidden = true
        const alert = document.getElementById('alert');
        alert.hidden = true;


}

createArticleForm.onsubmit = (event)=>{

   event.preventDefault();


   const article = new Article(titleInput.value,descriptionInput.value,categoryInput.value,imageInput.files[0])
   var formData = new FormData();
   formData.append('title', article.title);
   formData.append('description', article.description);
   formData.append('category', article.category);
   formData.append('image', article.image);
    axios.post('/article/' + articleId.value, formData)
      .then(function (response) {
        var toastLiveExample = document.getElementById('liveToast')
        var toast = new bootstrap.Toast(toastLiveExample)
        toast.show()
        CleanForm();

      })
      .catch(function (error) {
        const alert = document.getElementById('alert');
        const listError = document.getElementById('listErorr');
        listError.innerHTML= "";
        alert.hidden = false;
        Object.entries(error.response.data.errors).forEach(element => {
            listError.innerHTML = listError.innerHTML + `<li>${element[1]}</li>`
        });


      });

}}
