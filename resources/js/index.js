let buttons = document.querySelectorAll(".options_btn")
let add_task = document.getElementById("add_task")
let changed = document.querySelectorAll(".changed")
let liste_classe = new Map()

changed.forEach(element =>{
    liste_classe.set(`${element.classList[element.classList.length-1]}`,`${element.classList[0]}`); 
    element.classList.remove(element.classList[0])
                console.log(element.classList)
})


buttons.forEach(element => {
    element.addEventListener("click", ()=>{
        element.classList.toggle("button_clicked")
        changed.forEach(div => {
            div.className = "disabled_div" + " " + div.className;
        
            if (`${div.classList[div.classList.length-1]}` == `div_${element.id}`) {
                div.classList.remove(div.classList[0])
                div.className = liste_classe.get(`div_${element.id}`) + " " + div.className;
                console.log(div.classList)

            }
        })
    })
})

//ajouter une tâche & faire apparaitre le foemulaire de création de tâche
add_task.addEventListener("click", ()=>{
    changed.forEach(div => {
        div.className = "disabled_div" + " " + div.className;
        if (`${div.classList[div.classList.length-1]}` == `div_${add_task.id}`) {
            div.className = liste_classe.get(`div_${add_task.id}`) + " " + div.className;

            //sortir du formulaire au click du btn cancel
            let btn_cancel = document.querySelector(".btn_cancel");
            console.profileEnd(btn_cancel)
            btn_cancel.addEventListener("click",()=>{
                div.classList.remove(liste_classe.get(`div_${add_task.id}`))
            })
        }
    })
})