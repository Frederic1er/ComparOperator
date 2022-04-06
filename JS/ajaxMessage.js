let commentBtns = document.querySelectorAll('.btn-comment');
let commentMsg = document.querySelector('.modal-body');
let submitMsg = document.querySelector('.btn-form-review');

commentBtns.forEach((btn)=>{
    btn.addEventListener('click', function (e) {
        // console.log(e.target.getAttribute('data-idTour'))
        let idTO = e.target.getAttribute('data-idTour')

        let formData = new FormData()
        formData.append('idTO', idTO)
        fetch('getReview.php',{
            method:'post',
            body:formData
        }).then((response)=>{
            return response.text()
        }).then((data)=>{
            // console.log(data)
            commentMsg.innerHTML = data
        })
    })
})


submitMsg.addEventListener('click',function (e){
    e.preventDefault()
    
    let inputMessage = document.querySelector('#input-message')
    let inputAuthor = document.querySelector('#input-author')
    let inputNote = document.querySelector('#input-note')

    let idTO = document.querySelector('.box-review').getAttribute('id')

    let formData = new FormData()
    formData.append('idTO', idTO)
    formData.append('message', inputMessage.value)
    formData.append('author', inputAuthor.value)
    formData.append('note', inputNote.value)



    fetch('addReview.php',{
        method:'post',
        body:formData
    }).then((response)=>{
        return response.text()
    }).then((data)=>{

        commentMsg.innerHTML=data
        inputAuthor.value = ''
        inputMessage.value = ''
        inputNote.value = ''
    })

})