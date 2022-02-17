const populArrticleTemmplate = document.querySelector('[popular-article-template]');
const listOfArticle = document.querySelector('[most-popular-list]');
axios.get('/articles/most-poupular').then(({data}) => {
    data.forEach( (articleItem) => {
            const article = populArrticleTemmplate.content.cloneNode(true).children[0];
            article.querySelector('.image_background').style.backgroundImage = `url(/storage/${articleItem.image})`;
            article.querySelector('.card-title').textContent = articleItem.title;
            article.querySelector('[description]').textContent = articleItem.excerpt;
            article.querySelector('[more]').href = `/blog/article/${articleItem.id}`
            if (articleItem.view_count===0){
                article.querySelector('[data-wiew-counter]').style.display = "none";
            }else{
                article.querySelector('[data-wiew-counter]').innerHTML =
                                `${articleItem.view_count}
                                <span class="visually-hidden">unread messages</span>
                            `;
            }


            listOfArticle.append(article)
    });
})
