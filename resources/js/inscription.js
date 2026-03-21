let profil = document.getElementById('profil')
let img_profil = document.querySelector('.img_profil')

profil.addEventListener("change", (e) => {
    let file = e.target.files[0]

    if (file) {
        let reader = new FileReader()

        reader.onload = function (event) {
            img_profil.src = event.target.result
        }

        reader.readAsDataURL(file)
    }
})