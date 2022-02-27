

function post(id,action){
console.log(action)


    axios({
        method: 'post',
        url: '/film/'+ id +'/like',
        data: {
          polo: action
        }
      })
      .then(function (response) {
          if(response.data.valid===0){
            var toastLiveExample = document.getElementById('liveToast')
            var toast = new bootstrap.Toast(toastLiveExample)
            toast.show()
          }
        getLike(id)
      })
      .catch(function (error) {

      });
}
function getLike(id){
    axios.get('/film/'+ id +'/like')
      .then(function (response) {
        document.querySelector('#like').textContent = response.data.like;
        document.querySelector('#dislike').textContent = response.data.dislike;
      })
      .catch(function (error) {

      });

}

function like(id){
    const action = 1;
    post(id,action)

}
function dislike(id){
    const action = 0;
    post(id,action)

}
