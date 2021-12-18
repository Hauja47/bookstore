
let photo = document.getElementById('photo');
photo.onchange = function (event) {
    if(event.target.files.length > 0){
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.querySelector('.img-wrapper img');
        preview.src = src;
      }
}
